const mqtt = require("mqtt");
const {
  connection,
  insertToLogs,
  insertToAlerts,
  updateLastData,
} = require("./connection.js");

// URL broker MQTT
const brokerUrl = "mqtt://broker.emqx.io";

// Buat koneksi MQTT
const client = mqtt.connect(brokerUrl);

// Tangani saat koneksi berhasil
client.on("connect", () => {
  console.log("Connected to MQTT broker");
});

// Tangani saat koneksi terputus
client.on("close", () => {
  console.log("Disconnected from MQTT broker");
});

// Tangani saat menerima pesan dari topik
client.on("message", (topic, message) => {
  try {
    const { sensorValue, Status } = JSON.parse(message.toString());

    // Misalnya, memasukkan data ke dalam tabel logs
    insertToLogs(sensorValue, topic.replace("vibrate", ""));

    // Jika sensorValue bernilai true, masukkan juga ke dalam tabel alerts
    if (sensorValue === true) {
      insertToAlerts(topic.replace("vibrate", ""), 0);
    }
  } catch (error) {
    console.error("Error parsing message:", error);
  }
});

// Berlangganan ke semua topik vibrate1 hingga vibrate15
for (let i = 1; i <= 15; i++) {
  const topic = `vibrate${i}`;
  client.subscribe(topic, (err) => {
    if (err) {
      console.error(`Error subscribing to topic ${topic}: ${err}`);
    } else {
      console.log(`Subscribed to topic ${topic}`);
    }
  });
}

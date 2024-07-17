const mysql = require("mysql2");

// Buat koneksi ke database MySQL
const connection = mysql.createConnection({
  host: "localhost", // Ganti sesuai host MySQL Anda
  user: "root", // Ganti dengan username MySQL Anda
  password: "", // Ganti dengan password MySQL Anda
  database: "vibrate_monitoring", // Ganti dengan nama database Anda
});

// Fungsi untuk memasukkan data ke tabel logs
async function insertToLogs(sensorValue, device) {
  try {
    const query =
      "INSERT INTO logs (value, device, created_at) VALUES (?, ?, NOW())";
    await connection.promise().execute(query, [sensorValue, device]);
    console.log("Data inserted into logs table successfully");
  } catch (error) {
    console.error("Error inserting data into logs table:", error);
  }
}

// Fungsi untuk memasukkan data ke tabel alerts
async function insertToAlerts(device, active) {
  try {
    const query =
      "INSERT INTO alerts (device, active, created_at) VALUES (?, ?, NOW())";
    await connection.promise().execute(query, [device, active]);
    console.log("Data inserted into alerts table successfully");
  } catch (error) {
    console.error("Error inserting data into alerts table:", error);
  }
}

async function updateLastData(device) {
  try {
    const query =
      "UPDATE alerts SET updated_at = NOW() WHERE device = ? AND updated_at IS NULL";
    await connection.promise().execute(query, [device]);
    console.log("Data alert updated successfully");
  } catch (err) {
    console.error("Error updating last data:", err);
    throw err;
  }
}

// Export fungsi dan koneksi database
module.exports = {
  connection,
  insertToLogs,
  updateLastData,
  insertToAlerts,
};

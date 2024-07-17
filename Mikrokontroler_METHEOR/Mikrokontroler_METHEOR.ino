#include <WiFi.h>          // Include the WiFi library for ESP32
#include <PubSubClient.h>
#include <ArduinoJson.h>   // Include ArduinoJson library

StaticJsonDocument<200> doc; // Create a JSON document
#define MSG_BUFFER_SIZE  (50)

const char* ssid = "xixixi"; //ganti wifi anda
const char* password = "10101010";//ganti wifi anda
const char* mqtt_server = "broker.emqx.io";
const char* topic = "vibrate1";

#define Sensor 4  // Define the pin number for the sensor
WiFiClient espClient;
PubSubClient client(espClient);
unsigned long lastMsg = 0;
char msg[MSG_BUFFER_SIZE];
int value = 0;

void setup_wifi() {
  delay(10);
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);

  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  randomSeed(micros());

  Serial.println("");
  Serial.println("WiFi connected");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
}

void setup() {
  pinMode(LED_BUILTIN, OUTPUT);     // Initialize the BUILTIN_LED pin as an output
  Serial.begin(9600);
  pinMode(Sensor, INPUT);
  setup_wifi();
  
  client.setServer(mqtt_server, 1883);
  client.setCallback(callback);
}

void callback(char* topic, byte* payload, unsigned int length) {
  Serial.print("Message arrived [");
  Serial.print(topic);
  Serial.print("] ");
  for (int i = 0; i < length; i++) {
    Serial.print((char)payload[i]);
  }
  Serial.println();
  // Switch on the LED if a '1' was received as the first character
  if ((char)payload[0] == '1') {
    digitalWrite(LED_BUILTIN, LOW);   
  } else {
    digitalWrite(LED_BUILTIN, HIGH);  // Turn the LED off by making the voltage HIGH
  }
}

void reconnect() {
  // Loop until we're reconnected
  while (!client.connected()) {
    Serial.print("Attempting MQTT connection...");
    // Create a random client ID
    String clientId = "ESP32Client-";
    clientId += String(random(0xffff), HEX);
    // Attempt to connect
    if (client.connect(clientId.c_str())) {
      Serial.println("connected");
      // Once connected, publish an announcement...
      client.publish(topic, "hello world");
      client.subscribe(topic);
    } else {
      Serial.print("failed, rc=");
      Serial.print(client.state());
      Serial.println(" try again in 5 seconds");
      // Wait 5 seconds before retrying
      delay(5000);
    }
  }
}

String data = "";
bool sensorValue;

void loop() {
  if (!client.connected()) { // Check if the MQTT client is connected
    reconnect(); // If not connected, try to reconnect
  } else {
    StaticJsonDocument<200> doc; // Create a JSON object
    delay(500);
    sensorValue = digitalRead(Sensor);
    if (sensorValue == 1) {
      doc["sensorValue"] = sensorValue; 
      doc["Status"] = "Vibration detected"; 
    } else {
      doc["sensorValue"] = sensorValue;
      doc["Status"] = "Safe"; 
    }
    char buffer[200]; // Create a character buffer
    serializeJson(doc, buffer); // Serialize JSON to the character buffer
    client.publish(topic, buffer); // Send the MQTT message
  }

  if (!client.connected()) { // Check MQTT connection
    reconnect(); // Try to reconnect if not connected
  }
  client.loop(); // Run the MQTT client loop
  delay(100); // Short delay to avoid excessive MQTT publishing
}

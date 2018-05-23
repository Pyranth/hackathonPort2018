
#include <ESP8266WiFi.h>

#define pinOkidac 4

WiFiClient client;
WiFiServer server(80);

const char* ssid = "Hackathon in the Port";
const char* password = "";

void setup() {
  Serial.begin(115200);
  pinMode(pinOkidac,OUTPUT);
  digitalWrite(pinOkidac,HIGH);
  connectWiFi();
  server.begin();
}

void loop() {
  
  client = server.available();
  if(client.connected()){
    digitalWrite(pinOkidac,LOW);
    delay(1000);
    digitalWrite(pinOkidac,HIGH);
    }

}

void connectWiFi()
{
  Serial.println("Connecting to WIFI");
  WiFi.begin(ssid, password);
  while ((!(WiFi.status() == WL_CONNECTED)))
  {
    delay(300);
    Serial.print("..");
  }
  Serial.println("");
  Serial.println("WiFi connected");
  Serial.println("NodeMCU Local IP is : ");
  Serial.print((WiFi.localIP()));
}

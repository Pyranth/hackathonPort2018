#include <ESP8266WiFi.h>

#define pinOkidac 4 // pin d2
#define pinDiodaZelena 0 //pin d3
#define pinDiodaCrvena 2 //pin d4
WiFiClient client;
WiFiServer server(80);
const char* ssid = "Hackathon in the Port";
const char* password = "";
//const char* ssid = "Sea Point Apartments";
//const char* password = "biljana123";

char data;

void setup() {
  Serial.begin(115200);
  pinMode(pinOkidac,OUTPUT);
  pinMode(pinDiodaZelena,OUTPUT);
  pinMode(pinDiodaCrvena,OUTPUT);
  digitalWrite(pinOkidac,HIGH);
  digitalWrite(pinDiodaZelena,LOW);
  digitalWrite(pinDiodaCrvena,LOW);
  connectWiFi();
  server.begin();
}

void loop() {

  client = server.available();

  while(client.connected()){
    if (client.available()>0) { 
      
      data=client.read();
      Serial.println(data);
      if(data=='Z'){
        digitalWrite(pinDiodaZelena,HIGH);
      }
      if(data=='z'){
        digitalWrite(pinDiodaZelena,LOW);
      }
      if(data=='C'){
        digitalWrite(pinDiodaCrvena,HIGH);
      }
      if(data=='c'){
        digitalWrite(pinDiodaCrvena,LOW);
      }
      if(data=='b'){
        digitalWrite(pinDiodaZelena,HIGH);
        digitalWrite(pinOkidac,LOW);
        delay(500);
        digitalWrite(pinOkidac,HIGH );
      }
    }
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
  Serial.println((WiFi.localIP()));
}

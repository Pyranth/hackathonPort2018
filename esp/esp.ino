#include <ESP8266WiFi.h>

#define pinOkidac 4 // pin d2
#define pinDiodaZelena 0 //pin d3
<<<<<<< HEAD
#define pinDiodaCrvena 2 //pin d4
=======
#define pinDiodaCrvena 14 //pin d4
>>>>>>> 81da5c7ed4c8bc7e3102c40f8af4b7143c2a6db1
WiFiClient client;
WiFiServer server(80);
const char* ssid = "Hackathon in the Port";
const char* password = "";
//const char* ssid = "Sea Point Apartments";
//const char* password = "biljana123";
<<<<<<< HEAD

=======
>>>>>>> 81da5c7ed4c8bc7e3102c40f8af4b7143c2a6db1
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
<<<<<<< HEAD

=======
        //Serial.println((WiFi.localIP()));
        
>>>>>>> 81da5c7ed4c8bc7e3102c40f8af4b7143c2a6db1
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

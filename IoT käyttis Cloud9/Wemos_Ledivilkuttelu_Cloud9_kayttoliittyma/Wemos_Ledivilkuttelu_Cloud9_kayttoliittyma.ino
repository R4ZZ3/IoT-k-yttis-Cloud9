#include <Arduino.h>
#include <ESP8266WiFi.h>
#include <ESP8266WiFiMulti.h>
#include <ESP8266HTTPClient.h>

ESP8266WiFiMulti WiFiMulti;
// Initialize
int led1 = D1; //Boardin D3
int led2 = D2; //Boardin D4
int led3 = D3; //Boardin D8
int led4 = D4; //Boardin D9

const char* ssid = "NETGEAR61";
const char* password = "R4zz3li@NetGear92!";
const char* ssid1 = "rt";
const char* password1 = "R4ZZ392!";


void setup()
{
  pinMode(led1, OUTPUT); 
  pinMode(led2, OUTPUT); 
  pinMode(led3, OUTPUT);   
  pinMode(led4, OUTPUT);   
  Serial.begin(115200);         // Used to check value 
  Serial.setDebugOutput(true);
  Serial.println();
  Serial.println();
  Serial.println();

  for(uint8_t t = 4; t > 0; t--) {
      Serial.printf("[SETUP] WAIT %d...\n", t);
      Serial.flush();
      delay(1000);
  }
  //WiFi.begin(ssid, password);
  WiFiMulti.addAP(ssid,password);
  WiFiMulti.addAP(ssid1,password1);
  
  Serial.println("Connecting Wifi...");
  if(WiFiMulti.run() == WL_CONNECTED) {
    Serial.println("");
    Serial.println("WiFi connected");
    Serial.println("IP address: ");
    Serial.println(WiFi.localIP());
    }

}


// Main program
void loop()
{
    if((WiFiMulti.run() == WL_CONNECTED)) {

        HTTPClient http;

        Serial.print("[HTTP] begin...\n");
        // configure traged server and url
        http.begin("http://wemos-ui-server-r4zz3.c9users.io/kayttoliittyma/led1.txt"); //HTTP

        Serial.print("[HTTP] GET...\n");
        // start connection and send HTTP header
        int httpCode = http.GET();

        // httpCode will be negative on error
        if(httpCode > 0) {
            // HTTP header has been send and Server response header has been handled
            Serial.printf("[HTTP] GET... code: %d\n", httpCode);

            // file found at server
            if(httpCode == HTTP_CODE_OK) {
                String result = http.getString();
                Serial.print("Led 1: " + result.substring(0,1) + "\t");
                Serial.print("Led 2: " + result.substring(1,2) + "\t");
                Serial.print("Led 3: " + result.substring(2,3) + "\t");
                Serial.print("Led 4: " + result.substring(3,4) + "\n"); 
                switch (result.substring(0,1).toInt()) {
                    case 1:digitalWrite(led1, HIGH);
                      break;
                    default:digitalWrite(led1, LOW);
                      break;
                }
                switch (result.substring(1,2).toInt()) {
                    case 1:digitalWrite(led2, HIGH);
                      break;
                    default:digitalWrite(led2, LOW);
                      break;
                }
                switch (result.substring(2,3).toInt()) {
                    case 1:digitalWrite(led3, HIGH);
                      break;
                    default:digitalWrite(led3, LOW);
                      break;
                }
                switch (result.substring(3,4).toInt()) {
                    case 1:digitalWrite(led4, HIGH);
                      break;
                    default:digitalWrite(led4, LOW);
                      break;
                }                
            }
        } else {
            Serial.printf("[HTTP] GET... failed, error: %s\n", http.errorToString(httpCode).c_str());
        }

        http.end();
    }
      delay(1000);
  
}

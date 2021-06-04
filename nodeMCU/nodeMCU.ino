extern "C" {
  #include "user_interface.h"
  #include "wpa2_enterprise.h"
}

#include <Arduino.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <ESP8266WebServer.h>
#include <ArduinoJson.h>
#include <TridentTD_LineNotify.h>
#include <ESPDateTime.h>
//-------------------------------------------------------- WiFi config --------------------------------------------------------
// SSID to connect to
static const char* ssid = "SSID";
// Username for authentification
static const char* username = "Username";
// Password for authentification
static const char* password = "password";


//-------------------------------------------------------- Line config --------------------------------------------------------


//-------------------------------------------------------- Web/Server address to read/write from --------------------------------------------------------
const char *host = "IP address";   //https://circuits4you.com website or IP address of server

void setup() { //--------------------------------------------------------  setup --------------------------------------------------------
//-------------------------------------------------------- connect WiFi --------------------------------------------------------
  Serial.begin(115200);
  Serial.println("");
  Serial.println("");
  Serial.println("");
  Serial.print("Try connect to ");
  Serial.println(ssid);

  // WiFi.begin(ssid, password);

  wifi_station_disconnect();
   struct station_config wifi_config;
      memset(&wifi_config, 0, sizeof(wifi_config));
      strcpy((char*)wifi_config.ssid, ssid);
      wifi_station_set_config(&wifi_config);
      wifi_station_clear_cert_key();
      wifi_station_clear_enterprise_ca_cert();
      wifi_station_set_wpa2_enterprise_auth(1);
      wifi_station_set_enterprise_identity((uint8*)username, strlen(username));
      wifi_station_set_enterprise_username((uint8*)username, strlen(username));
      wifi_station_set_enterprise_password((uint8*)password, strlen(password));
      wifi_station_connect();

  Serial.print("Status: ");
  Serial.println(wifi_station_get_connect_status());

  // Wait for connection AND IP address from DHCP
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");
  Serial.print("IP address : ");
  Serial.println(WiFi.localIP());
  
//  setupDateTime(); //DateTime

  HTTPClient http;    //Declare object of class HTTPClient
  
  http.begin(host);              //Specify request destination
  http.addHeader("Content-Type", "application/json");    //Specify content-type header

  
  http.POST("{\"test\":\"1\"}");
  
 
  http.end();  //Close connection
  
  delay(10000);  //Post Data at every 10 seconds

} //-------------------------------------------------------- End setup --------------------------------------------------------

void loop() { //-------------------------------------------------------- loop --------------------------------------------------------
  // delay(10000);  //Post Data at every 10 seconds
} //-------------------------------------------------------- End loop --------------------------------------------------------

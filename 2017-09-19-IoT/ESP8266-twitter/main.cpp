#include <Arduino.h>

#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <cred.h>

int ledPin = 2; // Built in led
int inputPin = 5;

void setup() {
  pinMode(ledPin, OUTPUT);
  pinMode(inputPin, INPUT);
  digitalWrite(ledPin, LOW);

  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
  }
}

int counter = 0;
int lastStatus = LOW;

void loop() {
  delay(100);
  int status = digitalRead(inputPin);
  if (lastStatus != status) {
    digitalWrite(ledPin, status);
    lastStatus = status;

    if (status == HIGH){
      counter++;
    }
    if (counter > 10) {
      counter=0;
      HTTPClient http;
      http.begin("http://maker.ifttt.com/trigger/---your-trigger-name----/with/key/----your-key----");
      int httpCode = http.GET();
      http.end();   //Close connection

      digitalWrite(ledPin, HIGH);
      delay(1000);
      digitalWrite(ledPin, LOW);
      delay(1000);
    }
  }
}

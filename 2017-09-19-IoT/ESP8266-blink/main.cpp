#include <Arduino.h>

#define PIN 2

void setup() {
    pinMode ( PIN, OUTPUT );
}

void loop() {
    digitalWrite ( PIN, HIGH );
    delay(300);
    digitalWrite ( PIN, LOW );
    delay(300);
}

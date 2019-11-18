#include <Ultrasonic.h> //incluindo biblioteca do ultrasom.

#define TRIGGER_PIN  13 //portas do ultrasom, triger e echo.
#define ECHO_PIN     12


//int sensor1 = 8; não usado temporariamente.
//int leituraS1 = 0;

Ultrasonic ultrasonic(TRIGGER_PIN, ECHO_PIN);
void setup() {
  //estou colocando 9600 no serial begin.
  Serial.begin(9600);
  //definindo pinos de sensores de distancia analogicos.
  //pinMode(sensor1, INPUT);
  //nao estou usando pois não tenho este sensor, vou usar o sensor ultrasonico.

}

void loop() {
  //loop principal do código.
  float leituraS1; //var que vai guardar a leitura do sensor ultrasom em CM
  long microsec = ultrasonic.timing();
  leituraS1 = ultrasonic.convert(microsec, Ultrasonic::CM);
  //leituraS1 = analogRead(sensor1); poderia ser outro sensor.
  if (leituraS1 < 20) {
    Serial.write("n");
  }else{
    Serial.write("s");
  }
  delay(500);
  //Serial.write(leituraS1); //gravando na porta Serial valor do sensor S1.

}

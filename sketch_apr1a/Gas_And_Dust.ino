#include <Adafruit_GFX.h>
#include <Adafruit_SSD1306.h>
#include <WiFi.h>
#include <HTTPClient.h>

#define BUZZER_PIN 23

// dust sensor parameters
//orange-orange pin gnd
//yellow-red pin p2.5
//white -brown pin vcc
int pin = 14;
unsigned long duration;
unsigned long starttime;
unsigned long sampletime_ms = 1000;
unsigned long lowpulseoccupancy = 0;
float ratio = 0;
float concentration = 0;

//gas sensor parameters
int Gas_analog =4;    

// HTTPClient http;

//pump 
#define pump 27


void setup() {
   Serial.begin(9600);
  starttime = millis();
   while (!Serial);  
  delay(100);
  pinMode(BUZZER_PIN, OUTPUT);
  pinMode(pump, OUTPUT);
 
}

void loop() {
 checkDust();
 double dust = checkDust();
 delay(1000);
 checkGas();
 double gas = checkGas();
 Serial.print("myGas" );
 Serial.println(gas);
 delay(1000);
 sendToDatabase(gas,dust);

}

// function to measure dust in  the mine
double checkDust(){
  duration = pulseIn(pin, LOW);
  lowpulseoccupancy = lowpulseoccupancy+duration;

  if ((millis()-starttime) > sampletime_ms)
  {
    ratio = lowpulseoccupancy/(sampletime_ms*10.0);  // Integer percentage 0=>100
    concentration = 1.1*pow(ratio,3)-3.8*pow(ratio,2)+520*ratio+0.62; // using spec sheet curve
    lowpulseoccupancy = 0;
   
  Serial.print("Dust Level:"+String(concentration)); 
 if (concentration < 1000) {
  Serial.println("Clean"); 
  }
if (concentration > 1000 && concentration < 4000) {
  Serial.println("Good"); 
 }
if (concentration > 40000 && concentration < 10000) {
  Serial.println("Acceptable");
 }
if (concentration > 10000 && concentration < 20000) {
  Serial.println("Heavy");
  delay(500);
  digitalWrite(pump, HIGH);
  Serial.println("Pump on");
  delay(4000);
  digitalWrite(pump, LOW);
  Serial.println("Pump off");
  delay(500);
}
if (concentration > 20000 ) {
  Serial.println('Hazard'); 
  delay(500);
  digitalWrite(pump, HIGH);
  Serial.println("Pump on");
  delay(4000);
  digitalWrite(pump, LOW);
  Serial.println("Pump off");
  delay(500);
} 
    starttime = millis();
  }
  return concentration;
}

// function to measure gas in the mine
double checkGas (){
   double gassensorAnalog = analogRead(Gas_analog);
   delay(2000);
   Serial.print("Gas Level: ");
  Serial.print(gassensorAnalog);
  Serial.print("\t");
  
  
  if (gassensorAnalog > 610) {
    Serial.println("Gas Detected");
    digitalWrite(BUZZER_PIN, HIGH);
    delay(1000);
    digitalWrite(BUZZER_PIN, LOW);
    while(gassensorAnalog > 610){
      digitalWrite(BUZZER_PIN,HIGH);
    }
  
  }
  else {
    digitalWrite(BUZZER_PIN, LOW);
    Serial.println("No Gas");
  }
  delay(100);
  return gassensorAnalog;
}
void wifiConnect() {
  const char WIFI_SSID[] = "Redes";
  const char WIFI_PASSWORD[] = "";
  
  WiFi.mode(WIFI_STA);
  delay(500);
  WiFi.begin(WIFI_SSID, WIFI_PASSWORD);
  Serial.println("Connecting");
  Serial.println(WiFi.waitForConnectResult());
  while (WiFi.waitForConnectResult() != WL_CONNECTED){
    delay(500);
    Serial.println(WiFi.waitForConnectResult());
    WiFi.disconnect();
    WiFi.begin(WIFI_SSID, WIFI_PASSWORD);
    Serial.print(".");
  }
  Serial.println("Connected!");
}

void sendToDatabase(float gas, float dust){
 wifiConnect();
  WiFiClientSecure *client = new WiFiClientSecure;
    client->setInsecure(); //don't use SSL certificate
    HTTPClient https;
  String httpRequestData = "gas=" + String(gas) + "&dust=" + String(dust);

  
  https.begin("https://172.20.10.4/projects/sensor_data.php");
  https.addHeader("Content-Type", "application/x-www-form-urlencoded");

  int httpResponseCode = https.POST(httpRequestData);

  Serial.println(httpRequestData);

  if(httpResponseCode > 0){
    Serial.print("HTTP Response code: ");
    Serial.println(httpResponseCode);
    String response = https.getString();  //Get the response to the request
    Serial.println(response);    

  }else{
     Serial.print("Error code: ");
    Serial.println(httpResponseCode);
  }
  Serial.println("------------------Closing Connection---------------------------");
  https.end();
  Serial.println("Please wait for 5 seconds for the next connection");
  delay(5000);

}

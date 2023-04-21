#include <Adafruit_GFX.h>
#include <Adafruit_SSD1306.h>
#include <Adafruit_Fingerprint.h>

//finger print sensor parameters
#define mySerial Serial2
Adafruit_Fingerprint finger = Adafruit_Fingerprint(&mySerial);
uint8_t id;

// dust sensor parameters
int pin = 14;
unsigned long duration;
unsigned long starttime;
unsigned long sampletime_ms = 1000;
unsigned long lowpulseoccupancy = 0;
float ratio = 0;
float concentration = 0;

//gas sensor parameters
int Gas_analog = 4;

// alcohol sensor parameters
int Alcohol_analog = 34;

void setup() {

  Serial.begin(115200);
  Serial.println("\n\nAdafruit Fingerprint sensor enrollment");
  
  pinMode(14, INPUT);

  delay(2000);
  starttime = millis();  //get the current time;
  
  while(!Serial){
  delay(1000);
  Serial.println("\n\nAdafruit Fingerprint sensor enrollment");

  }

    // set the data rate for the sensor serial port
  finger.begin(57600);

  Serial.println(F("Reading sensor parameters"));
   delay(1000);
  finger.getParameters();
  Serial.print(F("Status: 0x")); Serial.println(finger.status_reg, HEX);
   delay(1000);
  Serial.print(F("Sys ID: 0x")); Serial.println(finger.system_id, HEX);
   delay(1000);
  Serial.print(F("Capacity: ")); Serial.println(finger.capacity);
   delay(1000);
  Serial.print(F("Security level: ")); Serial.println(finger.security_level);
   delay(1000);
  Serial.print(F("Device address: ")); Serial.println(finger.device_addr, HEX);
   delay(1000);
  Serial.print(F("Packet len: ")); Serial.println(finger.packet_len);
   delay(1000);
  Serial.print(F("Baud rate: ")); Serial.println(finger.baud_rate);  
   delay(1000);


  delay(1000);
  Serial.print(finger.templateCount);
  Serial.println("  Prints have been found");
  delay(1000);
  
  if (finger.templateCount != 0) {
    delay(1000);
    Serial.println("");
    Serial.println("Sensor doesn't contain any fingerprint data. Please  'enroll' now!");
    delay(1000);
    uint8_t enrolled = -1;
    while(enrolled != 0x00){
      delay(1000);
      Serial.println("Trying To Enroll");
      delay(1000);
      enrolled = getFingerprintEnroll();
    }
       
  } else {
    delay(1000);
    Serial.println("Waiting for valid finger...");
    delay(1000);
    Serial.print("Sensor contains ");
    delay(1000);    
    Serial.print(finger.templateCount);
    Serial.println(" templates");
    delay(1000);
    uint8_t matched; 
    matched = getFingerprintID();
    Serial.println(matched);
    Serial.print(" Is the value of matched");
    delay(1000);    
    if(matched != 0x00) {
        delay(1000);
        Serial.println("No Match");
        delay(1000);
        while(matched != 0x00){
          delay(1000);
          Serial.println("Trying To Enroll");
          delay(1000);
          matched = getFingerprintEnroll();
        }
    }
  }
}

uint8_t readnumber(void) {
  uint8_t num = 0;

  while (num == 0) {
    while (!Serial.available())
      ;
    num = Serial.parseInt();
  }
  return num;
}

void loop() {
  // getFingerprintID();
  delay(1000);
  Serial.print(finger.templateCount);
  Serial.println("  Prints have been found");
  delay(1000);
  delay(2000);
  Serial.println("In Loop");
  int finger_id = getFingerprintID();
  Serial.print("Finger ID = ");
  Serial.println(finger_id);
  // checkDust();
  // delay(1000);
  // checkGas();
  // delay(1000);
  // checkAlcohol();
  // delay(1000);
}

// function to measure dust in  the mine
double checkDust() {
  duration = pulseIn(pin, LOW);
  lowpulseoccupancy = lowpulseoccupancy + duration;

  if ((millis() - starttime) > sampletime_ms) {
    ratio = lowpulseoccupancy / (sampletime_ms * 10.0);                              // Integer percentage 0=>100
    concentration = 1.1 * pow(ratio, 3) - 3.8 * pow(ratio, 2) + 520 * ratio + 0.62;  // using spec sheet curve
    lowpulseoccupancy = 0;

    Serial.print("Dust Level:" + String(concentration));
    if (concentration < 1000) {
      Serial.println("Clean");
    }
    if (concentration > 1000 && concentration < 10000) {
      Serial.println("Good");
    }
    if (concentration > 10000 && concentration < 20000) {
      Serial.println("Acceptable");
    }
    if (concentration > 20000 && concentration < 50000) {
      Serial.println("Heavy");
    }
    if (concentration > 50000) {
      Serial.println('Hazard');
    }
    starttime = millis();
  }
  return concentration;
}

// function to measure gas in the mine
double checkGas() {

  int gassensorAnalog = analogRead(Gas_analog);
  Serial.print("Gas Level: ");
  Serial.print(gassensorAnalog);
  Serial.print("\t");


  if (gassensorAnalog > 1000) {
    Serial.println("Gas");
    delay(1000);

  } else {
    Serial.println("No Gas");
  }
  delay(100);
  return gassensorAnalog;
}

// function to check if worker is drunk or not when loging in
double checkAlcohol() {

  int alcoholsensorAnalog = analogRead(Alcohol_analog);
  Serial.print("Alcohol Lvel: ");
  Serial.println(alcoholsensorAnalog);

  if (alcoholsensorAnalog < 4095) {
    Serial.println("No Alcohol detected");
    delay(1000);
  } else {
    Serial.println("Alcohol detected");
  }
  delay(100);
  return alcoholsensorAnalog;
}

// function to register a new user using the fingerprint sensor
uint8_t getFingerprintEnroll() {
  int p = -1;
  Serial.print("Waiting for valid finger to enroll as #");
  Serial.println(id);
  while (p != FINGERPRINT_OK) {
    p = finger.getImage();
    switch (p) {
      case FINGERPRINT_OK:
        Serial.println("Image taken");
        break;
      case FINGERPRINT_NOFINGER:
        Serial.println(".");
        break;
      case FINGERPRINT_PACKETRECIEVEERR:
        Serial.println("Communication error");
        break;
      case FINGERPRINT_IMAGEFAIL:
        Serial.println("Imaging error");
        break;
      default:
        Serial.println("Unknown error");
        break;
    }
  }

  // OK success!

  p = finger.image2Tz(1);
  switch (p) {
    case FINGERPRINT_OK:
      Serial.println("Image converted");
      break;
    case FINGERPRINT_IMAGEMESS:
      Serial.println("Image too messy");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Communication error");
      return p;
    case FINGERPRINT_FEATUREFAIL:
      Serial.println("Could not find fingerprint features");
      return p;
    case FINGERPRINT_INVALIDIMAGE:
      Serial.println("Could not find fingerprint features");
      return p;
    default:
      Serial.println("Unknown error");
      return p;
  }

  Serial.println("Remove finger");
  delay(2000);
  p = 0;
  while (p != FINGERPRINT_NOFINGER) {
    p = finger.getImage();
  }
  Serial.print("ID ");
  Serial.println(id);
  p = -1;
  Serial.println("Place same finger again");
  while (p != FINGERPRINT_OK) {
    p = finger.getImage();
    switch (p) {
      case FINGERPRINT_OK:
        Serial.println("Image taken");
        break;
      case FINGERPRINT_NOFINGER:
        Serial.print(".");
        break;
      case FINGERPRINT_PACKETRECIEVEERR:
        Serial.println("Communication error");
        break;
      case FINGERPRINT_IMAGEFAIL:
        Serial.println("Imaging error");
        break;
      default:
        Serial.println("Unknown error");
        break;
    }
  }

  // OK success!

  p = finger.image2Tz(2);
  switch (p) {
    case FINGERPRINT_OK:
      Serial.println("Image converted");
      break;
    case FINGERPRINT_IMAGEMESS:
      Serial.println("Image too messy");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Communication error");
      return p;
    case FINGERPRINT_FEATUREFAIL:
      Serial.println("Could not find fingerprint features");
      return p;
    case FINGERPRINT_INVALIDIMAGE:
      Serial.println("Could not find fingerprint features");
      return p;
    default:
      Serial.println("Unknown error");
      return p;
  }

  // OK converted!
  Serial.print("Creating model for # ");
  Serial.println(id);

  p = finger.createModel();
  if (p == FINGERPRINT_OK) {
    Serial.println("Prints matched!");
  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {
    Serial.println("Communication error");
    return p;
  } else if (p == FINGERPRINT_ENROLLMISMATCH) {
    Serial.println("Fingerprints did not match");
    return p;
  } else {
    Serial.println("Unknown error");
    return p;
  }

  Serial.print("ID ");
  Serial.println(id);
  p = finger.storeModel(id);
  if (p == FINGERPRINT_OK) {
    Serial.println("Stored!");
  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {
    Serial.println("Communication error");
    return p;
  } else if (p == FINGERPRINT_BADLOCATION) {
    Serial.println("Could not store in that location");
    return p;
  } else if (p == FINGERPRINT_FLASHERR) {
    Serial.println("Error writing to flash");
    return p;
  } else {
    Serial.println("Unknown error");
    return p;
  }

  return p;
}

// function to login registered worker
uint8_t getFingerprintID() {
  uint8_t p = finger.getImage();
  switch (p) {
    case FINGERPRINT_OK:
      Serial.println("Image taken");
      break;
    case FINGERPRINT_NOFINGER:
      Serial.println("No finger detected");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Communication error");
      return p;
    case FINGERPRINT_IMAGEFAIL:
      Serial.println("Imaging error");
      return p;
    default:
      Serial.println("Unknown error");
      return p;
  }

  // OK success!

  p = finger.image2Tz();

  switch (p) {
    case FINGERPRINT_OK:
      Serial.println("Image converted");
      break;
    case FINGERPRINT_IMAGEMESS:
      Serial.println("Image too messy");
      return p;
    case FINGERPRINT_PACKETRECIEVEERR:
      Serial.println("Communication error");
      return p;
    case FINGERPRINT_FEATUREFAIL:
      Serial.println("Could not find fingerprint features");
      return p;
    case FINGERPRINT_INVALIDIMAGE:
      Serial.println("Could not find fingerprint features");
      return p;
    default:
      Serial.println("Unknown error");
      return p;
  }

  // OK converted!
  p = finger.fingerSearch();
  if (p == FINGERPRINT_OK) {
    Serial.println("Found a print match!");
  } else if (p == FINGERPRINT_PACKETRECIEVEERR) {
    Serial.println("Communication error");
    return p;
  } else if (p == FINGERPRINT_NOTFOUND) {
    Serial.println("Did not find a match");
    return p;
  } else {
    Serial.println("Unknown error");
    return p;
  }

  // found a match!
  Serial.print("Found ID #");
  Serial.print(finger.fingerID);
  Serial.print(" with confidence of ");
  Serial.println(finger.confidence);

  return p;
  return finger.fingerID;
}

// returns -1 if failed, otherwise returns ID #
int getFingerprintIDez() {
  uint8_t p = finger.getImage();
  if (p != FINGERPRINT_OK) return -1;

  p = finger.image2Tz();
  if (p != FINGERPRINT_OK) return -1;

  p = finger.fingerFastSearch();
  if (p != FINGERPRINT_OK) return -1;

  // found a match!
  Serial.print("Found ID #");
  Serial.print(finger.fingerID);
  Serial.print(" with confidence of ");
  Serial.println(finger.confidence);
  return finger.fingerID;
}

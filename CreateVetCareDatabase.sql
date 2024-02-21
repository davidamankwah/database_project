SET default_storage_engine=InnoDB;

Drop database if exists VetCareDB;
Show databases;
create database VetCareDB CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

Use VetCareDB;
Show tables;

Drop table if exists PetOwner;

create table PetOwner (
  petOwner_id tinyint unsigned NOT NULL auto_increment,  
  first_Name varchar(50) NOT NULL, 
  last_Name varchar(50) NOT NULL,
  address varchar(50) NOT NULL,
  pet varchar(50) NOT NULL,
  ownerImage LONGBLOB DEFAULT NULL,        
  Picture_Path varchar(20) DEFAULT NULL,   
 
  PRIMARY KEY (petOwner_id)
  )Engine=InnoDB;
  
Insert into PetOwner values (1, 'David', 'Sarfo','Galway','Dog',load_file('c:/owner/images.jpg'),'/images.jpg'),
(2, 'Sam', 'Saq','Derry','Dog',load_file('c:/owner/images2.jpg'),'/images2.jpg'),
(3, 'Harry', 'Kane','Galway','Cat',load_file('c:/owner/images3.jpg'),'/images3.jpg'),
(4, 'Tanya', 'Scott','Louth','Snake',load_file('c:/owner/images4.jpg'),'/images4.jpg');  
  
Drop table if exists animal;
Show databases;
Use VetCareDB;

create table animal(
  animal_id tinyint unsigned NOT NULL auto_increment,
  name varchar(50) NOT NULL, 
  petOwner_id tinyint unsigned NOT NULL,
  breed varchar(50) NOT NULL, 
  gender ENUM('M','F','Unkown'), 


  PRIMARY KEY (animal_id),
  CONSTRAINT fk_animal_owners
  FOREIGN KEY (petOwner_id) REFERENCES PetOwner(petOwner_id)
  ON DELETE CASCADE
  ON UPDATE CASCADE
)Engine=InnoDB; 

INSERT INTO animal (animal_id, name,petOwner_id, breed,gender) values(1, 'Jay', 1,'Bulldog','Unkown'),
(2, 'Glen', 2,'Poodle','M'),
(3, 'Jim', 3,'Birman','M'),
(4, 'Lady', 4,'Boidae','F');

Drop table if exists appointment;
Show databases;
Use VetCareDB;

create table appointment(
  appointment_id tinyint unsigned NOT NULL auto_increment,
  appointment_Date date NOT NULL,
  animal_id tinyint unsigned NOT NULL,
  location varchar(50) NOT NULL, 
  diagnosis varchar(50) NOT NULL,
  medication varchar(50) NOT NULL,  
  
  primary key (appointment_id),
  CONSTRAINT fk_appointment_animal
  FOREIGN KEY (animal_id) REFERENCES animal(animal_id)
  ON DELETE CASCADE
  ON UPDATE CASCADE
)Engine=InnoDB;

INSERT INTO appointment (appointment_id, appointment_Date, location, diagnosis, animal_id,medication) values(1,'2023-04-1','Renmore','Diarrhea',1,'GoActive'),
(2,'2023-04-11','Londonderry','Dehydration',2,'Water'),
(3,'2023-04-19','Ballybane','Fever',3,'Rest'),
(4,'2023-04-27','Drogheda','Vomitting',2,'antiemetics');

Drop table if exists staff;
Show databases;
Use VetCareDB;

create table staff(
  staff_id tinyint unsigned NOT NULL auto_increment,
  first_Name varchar(50) NOT NULL, 
  last_Name varchar(50) NOT NULL, 
  address varchar(50) NOT NULL, 
  salary double NOT NULL,
  appointment_id tinyint unsigned NOT NULL,
  
  primary key (staff_id),
  CONSTRAINT fk_staff_appointment
  FOREIGN KEY (appointment_id) REFERENCES appointment(appointment_id)
  ON DELETE CASCADE
  ON UPDATE CASCADE
)Engine=InnoDB;

INSERT INTO staff (staff_id, first_Name, last_Name, address, salary, appointment_id) VALUES(1,'Sean','Owen','Galway',110.10,1),
(2,'Will','Tilbur','Dery',100.70,2),
(3,'Tony','Willis','Galway',155.10,3),
(4,'Louis','Saha','Louth',122.20,4);


Drop table if exists medication;
Show databases;
Use VetCareDB;

create table medication(
  medication_id tinyint unsigned NOT NULL auto_increment,
  Name varchar(50) NOT NULL,  
  price double NOT NULL,
  staff_id tinyint unsigned NOT NULL,
  animal_id tinyint unsigned NOT NULL,
  
  primary key (medication_id),
  CONSTRAINT fk_medication_staff
  FOREIGN KEY (staff_id) REFERENCES staff(staff_id)
  ON DELETE CASCADE
  ON UPDATE CASCADE,
  CONSTRAINT fk_medication_animal
  FOREIGN KEY (animal_id) REFERENCES animal(animal_id)
  ON DELETE CASCADE
  ON UPDATE CASCADE
)Engine=InnoDB;

INSERT INTO medication (medication_id, Name, price, staff_id, animal_id) VALUES(1,'GoActive',19.10,1,1),
(2,'Antifungals',10.10,2,2),
(3,'Antibiotics',20.10,3,3),
(4,'Vaccines',18.10,4,4);


Drop table if exists food;
Show databases;
Use VetCareDB;

create table food(
  food_id tinyint unsigned NOT NULL auto_increment,
  Name varchar(50) NOT NULL, 
  supplier varchar(50) NOT NULL, 
  food_size Int NOT NULL, 
  price double NOT NULL,
  quantity_Stock Int NOT NULL,
  animal_id tinyint unsigned NOT NULL,
  
  primary key (food_id),
  CONSTRAINT fk_food_animal
  FOREIGN KEY (animal_id) REFERENCES animal(animal_id)
  ON DELETE CASCADE
  ON UPDATE CASCADE
)Engine=InnoDB;


INSERT INTO food (food_id, Name, supplier, food_size, price, quantity_Stock, animal_id) VALUES(1,'Raw food','Petco',12,20.22,50,1),
(2,'Grain food','Chewy',19,30.32,70,2),
(3,'Wet food','Amazon',5,10.50,20,3),
(4,'Dry food','Amazon',6,7.55,15,4);

Drop table if exists billing;
Show databases;
Use VetCareDB;

create table billing(
  billing_id tinyint unsigned NOT NULL auto_increment,
  pay_Method ENUM('Cash','Mastercard','Visa','Paypal'), 
  total double NOT NULL,
  food_id tinyint unsigned NOT NULL,
  medication_id tinyint unsigned NOT NULL,
  
  primary key (billing_id),
  CONSTRAINT fk_billing_food
  FOREIGN KEY (food_id) REFERENCES food(food_id)
  ON DELETE CASCADE
  ON UPDATE CASCADE,
  CONSTRAINT fk_billing_medication
  FOREIGN KEY (medication_id) REFERENCES medication(medication_id)
  ON DELETE CASCADE
  ON UPDATE CASCADE
)Engine=InnoDB;

INSERT INTO billing (billing_id, pay_Method, total, food_id, medication_id) VALUES(1,'Cash',39.32,1,1),
(2,'Paypal',40.42,2,2),
(3,'MasterCard',30.60,3,3),
(4,'Visa',25.65,4,4);


show warnings;

drop table postalcode cascade constraints;
drop table shelter cascade constraints;
drop table ward cascade constraints;
drop table worker cascade constraints;
drop table Veterinarian cascade constraints;
drop table Volunteer cascade constraints;
drop table animal cascade constraints;
drop table IntakeForm cascade constraints;
drop table Food cascade constraints;
drop table eat cascade constraints;
drop table owner cascade constraints;
drop table AdoptionApplication cascade constraints;


CREATE TABLE PostalCode(
    PostalCode          CHAR(6) PRIMARY KEY,
    City                CHAR(14),
    Province            CHAR(14));

CREATE TABLE Shelter(
    StreetNumber        INTEGER,
    StreetName          CHAR(12),
    PostalCode          CHAR(6),
    Budget              INTEGER,
    Capacity            INTEGER,
    PRIMARY KEY(StreetNumber, StreetName, PostalCode),
    FOREIGN KEY(PostalCode) REFERENCES PostalCode(PostalCode)
        ON DELETE CASCADE);
        --ON UPDATE CASCADE
--); --https://web.archive.org/web/20061026093018/https://asktom.oracle.com/~tkyte/update_cascade/index.html

CREATE TABLE Ward(
    StreetNumber        INTEGER,
    StreetName          CHAR(12),
    PostalCode          CHAR(6),
    WardNumber          INTEGER,
    PRIMARY KEY(StreetNumber, StreetName, PostalCode, WardNumber),
    FOREIGN KEY(StreetNumber, StreetName, PostalCode) REFERENCES Shelter(StreetNumber, StreetName, PostalCode)
        ON DELETE CASCADE);
        --ON UPDATE CASCADE
--);

-- on delete no action must change to either cascade or default
    --temporarily we'll cascade
CREATE TABLE Worker(
    ID                  CHAR(8) PRIMARY KEY,
    WorkerName          CHAR(20),
    PhoneNumber         INTEGER,
    Email               CHAR(32),
    WardNumber          INTEGER NOT NULL,
    --SID                 CHAR(8) NOT NULL
    WardPC              CHAR(6),
    WardStreetNumber    INTEGER,
    WardStreetName      CHAR(12),
    FOREIGN KEY(WardNumber, WardPC, WardStreetNumber, WardStreetName) REFERENCES Ward(WardNumber, PostalCode, StreetNumber, StreetName)
        ON DELETE CASCADE);
        --ON UPDATE CASCADE
--);

CREATE TABLE Veterinarian(
    ID                  CHAR(8) PRIMARY KEY,
    Salary              INTEGER,
    FOREIGN KEY(ID) REFERENCES Worker(ID)
        ON DELETE CASCADE);
--);

CREATE TABLE Volunteer(
    ID                  CHAR(8) PRIMARY KEY,
    VolunteerHours      INTEGER,
    FOREIGN KEY(ID) REFERENCES Worker(ID)
        ON DELETE CASCADE);
--);

--changed Weight To Number with 3 digits, 1 to the right of the decimal point
-- on delete no action must change to either cascade or default
    --temporarily we'll cascade
CREATE TABLE Animal(
    ID                  CHAR(8),
    Species             CHAR(20),
    BirthDate           DATE,
    Breed               CHAR(20),
    Weight              NUMBER(3,1),
    WardNumber          INTEGER NOT NULL,
    StreetNumber        INTEGER NOT NULL,
    StreetName          CHAR(12) NOT NULL,
    PostalCode          CHAR(6) NOT NULL,
    PRIMARY KEY(ID, Species),
    FOREIGN KEY(WardNumber, PostalCode, StreetNumber, StreetName) REFERENCES Ward(WardNumber, PostalCode, StreetNumber, StreetName)
        ON DELETE CASCADE);
        --ON UPDATE CASCADE
--);
/*
CREATE TABLE IntakeForm(
    IntakeID            CHAR(8) PRIMARY KEY,
    IntakeDate          DATE);
*/

CREATE TABLE IntakeForm(
    IntakeID            CHAR(8) PRIMARY KEY,
    IntakeDate          DATE,
    AID                 CHAR(8) NOT NULL,
    Species             CHAR(20) NOT NULL,
    FOREIGN KEY(AID, Species) REFERENCES Animal(ID, Species)
        ON DELETE CASCADE);
        --ON UPDATE CASCADE
--);
--*/

CREATE TABLE Food(
    Type                CHAR(10),
    Brand               CHAR(32),
    PricePerKG          INTEGER,
    PRIMARY KEY(Type, Brand));

--on delete cascade for both animal and food, makes sense
CREATE TABLE Eat(
    AID                 CHAR(8),
    Species             CHAR(20),
    FoodType            CHAR(10),
    FoodBrand           CHAR(32),
    Amount              INTEGER,
    PRIMARY KEY(AID, Species, FoodType, FoodBrand),
    FOREIGN KEY(AID, Species) REFERENCES Animal(ID, Species)
        ON DELETE CASCADE,
    FOREIGN KEY(FoodType, FoodBrand) REFERENCES Food(Type, Brand)
        ON DELETE CASCADE);

CREATE TABLE Owner(
    OwnerName           CHAR(32),
    StreetNumber        INTEGER,
    StreetName          CHAR(12),
    PostalCode          CHAR(6),
    PhoneNumber         INTEGER,
    PRIMARY KEY(OwnerName, StreetNumber, StreetName, PostalCode),
    FOREIGN KEY(PostalCode) REFERENCES PostalCode(PostalCode)
        ON DELETE CASCADE); 
    --must incl. on delete and on update

--Removed UNIQUE identifier from SPECIES
CREATE TABLE AdoptionApplication(
    OwnerName           CHAR(32),
    StreetNumber        INTEGER,
    StreetName          CHAR(12),
    PostalCode          CHAR(6),
    AdoptionDate        DATE,
    AID                 CHAR(8) UNIQUE NOT NULL,
    Species             CHAR(20) NOT NULL,
    PRIMARY KEY(OwnerName, StreetNumber, StreetName, PostalCode, AdoptionDate),
    FOREIGN KEY(AID, Species) REFERENCES Animal(ID, Species)
        ON DELETE CASCADE,
    FOREIGN KEY(OwnerName, StreetNumber, StreetName, PostalCode) REFERENCES Owner(OwnerName, StreetNumber, StreetName, PostalCode)
        ON DELETE CASCADE);
        --ON UPDATE CASCADE
--);


INSERT INTO PostalCode VALUES ('V5D4T2','Vancouver','BC');
INSERT INTO PostalCode VALUES ('V6H8Y7','Surrey','BC');
INSERT INTO PostalCode VALUES ('V1L5UJ','Richmond','BC');
INSERT INTO PostalCode VALUES ('V9R3P2','Vancouver','BC');
INSERT INTO PostalCode VALUES ('V6S1L8','Burnaby','BC');
INSERT INTO PostalCode VALUES ('V6S1L5','Vancouver','BC');
INSERT INTO PostalCode VALUES ('V2R9Y7','Richmond','BC');
INSERT INTO PostalCode VALUES ('V7H2R9','Vancouver','BC');
INSERT INTO PostalCode VALUES ('V8LH94','Vancouver','BC');
INSERT INTO PostalCode VALUES ('V9Z1B6','Surrey','BC');
insert into postalcode values ('V6T2G9','Vancouver','BC');

insert into shelter values (555,'West 9th Ave','V5D4T2',40000000,500);
insert into shelter values (3263,'Maple Ave','V6H8Y7',6000000,50);
insert into shelter values (1482,'McDonald Ave','V1L5UJ',22000000,200);
insert into shelter values (365,'Yew St','V9R3P2',12000000,75);
insert into shelter values (3472,'Ray Court','V6S1L8',67000000,1000);

insert into ward values (555,'West 9th Ave','V5D4T2',4);
insert into ward values (3263,'Maple Ave','V6H8Y7',3);
insert into ward values (1482,'McDonald Ave','V1L5UJ',5);
insert into ward values (365,'Yew St','V9R3P2',6);
insert into ward values (3472,'Ray Court','V6S1L8',1);

insert into worker values ('12345678','John Doe',6045555555,'john.doe@gmail.com',4,'V5D4T2',555,'West 9th Ave');
insert into worker values ('23456789','Jane Deo',6049875555,'jane.deo@gmail.com',3,'V6H8Y7',3263,'Maple Ave');
insert into worker values ('86632359','Laura Pio',6041232346,'Laura.Pio@gmail.com',4,'V5D4T2',555,'West 9th Ave');
insert into worker values ('84750218','Aminatou Olayinka',6041635677,'Aminatou.Olayinka@gmail.com',5,'V1L5UJ',1482,'McDonald Ave');
insert into worker values ('91642469','Anuj Tipene',6047930934,'Anuj.Tipene@gmail.com',6,'V9R3P2',365,'Yew St');
insert into worker values ('16296422','Liliana Ninel',6042369023,'Liliana.Ninel@gmail.com',5,'V1L5UJ',1482,'McDonald Ave');
insert into worker values ('31979870','Katsuhito Stanislav',6049825546,'Katsuhito.Stanislav@gmail.com',6,'V9R3P2',365,'Yew St');
insert into worker values ('57940862','Wendi Khan',6040908231,'Wendi.Khan@gmail.com',6,'V9R3P2',365,'Yew St');
insert into worker values ('15759770','Yamilet Eline',6048562102,'Yamilet.Eline@gmail.com',1,'V6S1L8',3472,'Ray Court');
insert into worker values ('49439812','Murtaz Phyllida',6044509612,'Murtaz.Phyllida@gmail.com',1,'V6S1L8',3472,'Ray Court');
insert into worker values ('91754684','Manca Sumati',6048349061,'Manca.Sumati@gmail.com',1,'V6S1L8',3472,'Ray Court');

insert into veterinarian values ( '12345678',60000);
insert into veterinarian values ( '86632359',63000);
insert into veterinarian values ( '84750218',66000);
insert into veterinarian values ( '91642469',69000);
insert into veterinarian values ( '16296422',72000);

insert into volunteer values('23456789',600);
insert into volunteer values('31979870',100);
insert into volunteer values('57940862',50);
insert into volunteer values('15759770',500);
insert into volunteer values('49439812',350);

insert into animal values ('87047410','Dog',date '2020-10-25','Golden Retriever',35.1,4,555,'West 9th Ave','V5D4T2');
insert into animal values ('78217232','Cat',date '2013-05-21','Maine Coon',7.6,3,3263,'Maple Ave','V6H8Y7');
insert into animal values ('61558339','Dog',date '2016-01-30','Boston Terrier',10.9,4,555,'West 9th Ave','V5D4T2');
insert into animal values ('50276739','Dog',date '2021-04-23','Pug',5.2,6,365,'Yew St','V9R3P2');
insert into animal values ('13015895','Cat',date '2019-08-11','Siamese',5.6,3,3263,'Maple Ave','V6H8Y7');

insert into animal values ('00000001','Cat',date '2019-01-01','Persian',4.5,3,3263,'Maple Ave','V6H8Y7');
insert into animal values ('00000001','Dog',date '2021-02-23','Mutt',12,6,365,'Yew St','V9R3P2');
insert into animal values ('00000000','Dog',date '2001-02-23','Mutt',40,6,365,'Yew St','V9R3P2');

insert into intakeform values ('82488620',date '2021-08-12','87047410','Dog');
insert into intakeform values ('57966565',date '2021-03-24','78217232','Cat');
insert into intakeform values ('31413656',date '2021-10-11','61558339','Dog');
insert into intakeform values ('54474563',date '2021-09-30','50276739','Dog');
insert into intakeform values ('47725067',date '2021-07-05','13015895','Cat');

insert into food values ( 'Dog Food','Royal Canin',5);
insert into food values ( 'Cat Food','Purina',8);
insert into food values ( 'Dog Food','Hill''s Pet Nutrition',7);
insert into food values ( 'Cat Food','Hill''s Pet Nutrition',4);
insert into food values ( 'Cat Food','Royal Canin',6);

insert into Eat values ('87047410','Dog','Dog Food','Royal Canin',500);
insert into Eat values ('78217232','Cat','Cat Food','Purina',150);
insert into Eat values ('61558339','Dog','Dog Food','Royal Canin',400);
insert into Eat values ('50276739','Dog','Dog Food','Hill''s Pet Nutrition',450);
insert into Eat values ('13015895','Cat','Cat Food','Hill''s Pet Nutrition',200);

insert into owner values ('Haris Barbara',123,'Vine St','V6S1L5',6048323284);
insert into owner values ('Aygul Antinanco',5212,'Cedar St','V2R9Y7',6042384982);
insert into owner values ('Medusa Karol',2345,'Oak Ave','V7H2R9',6045828412);
insert into owner values ('Kanako Ana',1456,'Maple Ave','V8LH94',6042834234);
insert into owner values ('Olamide Gayathri',3465,'Yew St','V9Z1B6',6043204981);
insert into owner values ('Daniel Kennedy',6335,'Thunderbird','V6T2G9',6047006687);

insert into adoptionapplication values ('Haris Barbara',123,'Vine St','V6S1L5',date '2021-10-15','87047410','Dog');
insert into adoptionapplication values ('Aygul Antinanco',5212,'Cedar St','V2R9Y7',date '2021-09-25','78217232','Cat');
insert into adoptionapplication values ('Medusa Karol',2345,'Oak Ave','V7H2R9',date '2021-08-11','61558339','Dog');
insert into adoptionapplication values ('Kanako Ana',1456,'Maple Ave','V8LH94',date '2021-10-09','50276739','Dog');
insert into adoptionapplication values ('Olamide Gayathri',3465,'Yew St','V9Z1B6',date '2021-10-18','13015895','Cat');

COMMIT;

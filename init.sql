CREATE DATABASE IF NOT EXISTS main;

CREATE TABLE IF NOT EXISTS main.users (
	UserID INT AUTO_INCREMENT PRIMARY KEY,
    Password VARCHAR(255) NOT NULL,
    Role SMALLINT(1) NOT NULL,
    Email varchar(255) NOT NULL,
	Nom varchar(50) NOT NULL,
	Prenom varchar(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS main.opinion (
	id INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(30) NOT NULL,
    Rating SMALLINT(1) NOT NULL,
    Commentary TINYTEXT NOT NULL,
	IsAllowed BOOLEAN NOT NULL DEFAULT false
);

CREATE TABLE IF NOT EXISTS main.contact (
	ContactID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(30) NOT NULL,
    Name VARCHAR(30) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Phone VARCHAR(20) NOT NULL,
    Message TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS main.openhours (
	Day ENUM('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'),
	IsOpen BOOLEAN DEFAULT TRUE,
    MorningOpeningTime TIME NOT NULL,
    MorningClosingTime TIME NOT NULL,
    AfternoonOpeningTime TIME NOT NULL,
    AfternoonClosingTime TIME NOT NULL
);

INSERT INTO openhours (Day, IsOpen, MorningOpeningTime, MorningClosingTime, AfternoonOpeningTime, AfternoonClosingTime)
VALUES 
('Lundi', "1", '08:00', '12:00', '13:30', '18:00'),
('Mardi', "1", '08:00', '12:00', '13:30', '18:00'),
('Mercredi', "1", '08:00', '12:00', '13:30', '18:00'),
('Jeudi', "1", '08:00', '12:00', '13:30', '18:00'),
('Vendredi', "1", '08:00', '12:00', '13:30', '18:00'),
('Samedi', "1", '08:00', '12:00', '13:30', '18:00'),
('Dimanche', "0", '08:00', '12:00', '13:30', '18:00');

CREATE TABLE IF NOT EXISTS main.repair (
	FirstText TEXT NOT NULL,
    SecondText TEXT NOT NULL,
    ThirdText TEXT NOT NULL,
    FirstImage VARCHAR(255),
    SecondImage VARCHAR(255),
    ThirdImage VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS main.bodycar (
	FirstText TEXT NOT NULL,
    SecondText TEXT NOT NULL,
    ThirdText TEXT NOT NULL,
    FirstImage VARCHAR(255),
    SecondImage VARCHAR(255),
    ThirdImage VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS main.sell (
	id INT AUTO_INCREMENT PRIMARY KEY,
    name_model VARCHAR(100) NOT NULL,
    price INT NOT NULL,
    description TEXT NOT NULL,
    kilometer INT NOT NULL,
    color VARCHAR(25) NOT NULL,
    date INT(4) NOT NULL,
    horsepower INT(4) NOT NULL,
    doors INT(2) NOT NULL,
    places INT(2) NOT NULL,
    fuel VARCHAR(25) NOT NULL,
    transmission VARCHAR(25) NOT NULL
);

CREATE TABLE main.sellImages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ForeignKey INT,
    ImagePath1 VARCHAR(255),
    ImagePath2 VARCHAR(255),
    ImagePath3 VARCHAR(255),
    ImagePath4 VARCHAR(255),
    ImagePath5 VARCHAR(255),
    ImagePath6 VARCHAR(255),
    ImagePath7 VARCHAR(255),
    ImagePath8 VARCHAR(255),
    ImagePath9 VARCHAR(255),
    ImagePath10 VARCHAR(255),
    FOREIGN KEY (ForeignKey) REFERENCES sell(id)
);
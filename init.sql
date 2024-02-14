CREATE DATABASE IF NOT EXISTS main;

CREATE TABLE IF NOT EXISTS main.users (
	UserID INT AUTO_INCREMENT PRIMARY KEY,
    Login VARCHAR(20) NOT NULL UNIQUE,
    Password VARCHAR(255) NOT NULL,
    Role SMALLINT(1) NOT NULL
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

INSERT INTO openhours (Day, MorningOpeningTime, MorningClosingTime, AfternoonOpeningTime, AfternoonClosingTime)
VALUES 
('Lundi', '08:00', '12:00', '13:30', '18:00'),
('Mardi', '08:00', '12:00', '13:30', '18:00'),
('Mercredi', '08:00', '12:00', '13:30', '18:00'),
('Jeudi', '08:00', '12:00', '13:30', '18:00'),
('Vendredi', '08:00', '12:00', '13:30', '18:00'),
('Samedi', '08:00', '12:00', '13:30', '18:00'),
('Dimanche', '08:00', '12:00', '13:30', '18:00');

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
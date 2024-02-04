CREATE DATABASE IF NOT EXISTS main;

CREATE TABLE IF NOT EXISTS main.opinion (
	Name VARCHAR(20) NOT NULL,
	Rating SMALLINT(1) NOT NULL,
	Commentary TINYTEXT NOT NULL
);
CREATE DATABASE chatapp;
USE chatapp;

CREATE TABLE messages (
	id SERIAL,
    message TEXT,
    date TIMESTAMP DEFAULT now(),
    PRIMARY KEY (id)
);
CREATE DATABASE business_cards;
USE business_cards;

CREATE table users (
  id SERIAL,
  full_name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  phone VARCHAR(20),
  quote VARCHAR(255),
  password VARCHAR(255) NOT NULL,
  PRIMARY KEY (id)
);
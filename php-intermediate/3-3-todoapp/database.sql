CREATE DATABASE todoapp;
USE todoapp;

CREATE TABLE tasks (
	id SERIAL,
    name VARCHAR(25) NOT NULL,
    completed boolean DEFAULT false NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO `tasks` 
(`name`, `completed`) VALUES
('Get Milk', 0),
('Complete Homework', 0),
('Do Laundry', 1);
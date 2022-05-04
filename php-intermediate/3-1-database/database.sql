CREATE DATABASE customerdb;
USE customerdb;

CREATE TABLE customers (
  id SERIAL,
  f_name VARCHAR(30),
  l_name VARCHAR(30),
  email VARCHAR(255),
  PRIMARY KEY (id)
);

INSERT INTO `customers` 
(`f_name`,`l_name`,`email`) VALUES
('Josiah', 'Brooks', 'J.Brooks@emaildomain.com'),
('Sam', 'Dolby', 'sam225@dolby.net'),
('Ana', 'Aroujo', 'ajouro@myemail.com' ),
('Johanna','Schröder','schroder.j@address.com');

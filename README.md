# resort_system

# Run this for the user database

# Run this on phpMyAdmin SQL query to create database
CREATE TABLE hotels (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  address VARCHAR(255) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  rating INT(2) NOT NULL,
  description TEXT,
  image VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

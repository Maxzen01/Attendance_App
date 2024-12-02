CREATE DATABASE IF NOT EXISTS attendanceapp;
........
USE attendanceapp;

CREATE TABLE IF NOT EXISTS attendance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    action ENUM('login', 'logout') NOT NULL,
    time DATETIME NOT NULL,
    photo_url VARCHAR(255),
    FOREIGN KEY (username) REFERENCES users(username)
);
.............
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
INSERT INTO users (username, password) VALUES
('vinnu', 'password123'),
('pratap', 'password456');

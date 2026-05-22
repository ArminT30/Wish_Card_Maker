-- init_db.sql
-- Creates database and sample data for Wish Card Maker demo
DROP DATABASE IF EXISTS wishcard_db;
CREATE DATABASE wishcard_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE wishcard_db;

-- users table
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(150) NOT NULL,
  email VARCHAR(200) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- admins table
CREATE TABLE admins (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(80) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- themes table
CREATE TABLE themes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(150) NOT NULL
) ENGINE=InnoDB;

-- cards table
CREATE TABLE cards (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_email VARCHAR(200) NOT NULL,
  theme_id INT DEFAULT NULL,
  title VARCHAR(255),
  message_text TEXT,
  from_name VARCHAR(150),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (theme_id) REFERENCES themes(id) ON DELETE SET NULL
) ENGINE=InnoDB;

-- sample admin (password: admin123)
INSERT INTO admins (username, password) VALUES ('admin', '0192023a7bbd73250516f069df18b500');

-- sample user (test@example.com / 12345)
INSERT INTO users (name, email, password) VALUES ('Demo User','test@example.com','827ccb0eea8a706c4c34a16891f84e7b');

-- sample themes
INSERT INTO themes (name) VALUES ('Birthday Bliss'),('Congratulations!');

-- sample cards
INSERT INTO cards (user_email, theme_id, title, message_text, from_name) VALUES
('test@example.com', 1, 'Birthday Bliss', 'Wishing you a day filled with happiness and a year filled with joy!', 'Your Friend'),
('test@example.com', 2, 'Congratulations!', 'Your hard work has paid off — congratulations on your success!', 'Well Wisher');

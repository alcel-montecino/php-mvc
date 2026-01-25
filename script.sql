-- Create the database
CREATE DATABASE IF NOT EXISTS mvc_test CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

-- Use the database
USE mvc_test;

-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Example initial user (password: "1234")
INSERT INTO users (name, email, password)
VALUES ('Admin', 'admin@example.com', 
        '$2y$10$K8BDSVjEexxyPp/dHpn0QeNkoI3/NZfYjClp.QKbbOP13oQ1p/7E2');

-- Create posts table
CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Example posts
INSERT INTO posts (user_id, title, content)
VALUES 
(1, 'Welcome Post', 'This is the first post of Admin.'),
(1, 'PHP MVC Tutorial', 'Learn how to build a PHP MVC CRUD app.');

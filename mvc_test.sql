-- Create the database
CREATE DATABASE IF NOT EXISTS mvc_test CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

-- Use the database
USE mvc_test;

-- ---------------------------
-- Users table
-- ---------------------------
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Example initial users (password: "1234")
INSERT INTO users (name, email, password, role) VALUES
('Admin', 'admin@example.com', '$2y$10$K8BDSVjEexxyPp/dHpn0QeNkoI3/NZfYjClp.QKbbOP13oQ1p/7E2', 'admin'),
('John Doe', 'john@example.com', '$2y$10$K8BDSVjEexxyPp/dHpn0QeNkoI3/NZfYjClp.QKbbOP13oQ1p/7E2', 'user'),
('James', 'james@example.com', '$2y$10$K8BDSVjEexxyPp/dHpn0QeNkoI3/NZfYjClp.QKbbOP13oQ1p/7E2', 'user'),
('Anna', 'anna@example.com', '$2y$10$K8BDSVjEexxyPp/dHpn0QeNkoI3/NZfYjClp.QKbbOP13oQ1p/7E2', 'user');

-- ---------------------------
-- Posts table
-- ---------------------------
CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    status ENUM('published','draft') DEFAULT 'published',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Example posts
INSERT INTO posts (user_id, title, content, status) VALUES
(1, 'Welcome Post', 'This is the first post of Admin.', 'published'),
(1, 'PHP MVC Tutorial', 'Learn how to build a PHP MVC CRUD app.', 'published'),
(2, 'John Draft Post', 'This is a draft post by John.', 'draft');

-- ---------------------------
-- Comments table
-- ---------------------------
CREATE TABLE IF NOT EXISTS comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT NOT NULL,
    user_id INT NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Example comments
INSERT INTO comments (post_id, user_id, content) VALUES
(1, 2, 'Nice post, Alice!'),
(1, 3, 'Welcome to the platform!'),
(2, 1, 'Interesting thoughts, Bob.'),
(3, 2, 'Congrats on finishing the project!');

# PHP MVC CRUD Application

## Description
This project is a **simple yet fully functional PHP MVC framework** with **CRUD operations for users**, designed for learning or as a lightweight base for larger applications. It demonstrates a clean separation of concerns with **Models, Views, and Controllers**, integrates **MySQL database**, and includes **JavaScript interactivity** for improved user experience.

The framework is structured to be **AI IDE-friendly**, making it easy to use tools like **GitHub Copilot**, **Tabnine**, or **Codeium** for smart code suggestions.

---

## Features

- **MVC Architecture**: Clean separation of logic (Controller), data (Model), and presentation (View)
- **CRUD Operations**: Create, Read, Update, Delete users with MySQL
- **JavaScript Interactivity**: For actions like delete confirmation and dynamic updates
- **MySQL Database Integration**: Secure and easy-to-use PDO connection
- **AI IDE Friendly**: Structured code and documentation for AI-assisted development
- **Routing**: Pretty URLs handled via `.htaccess`
- **Lightweight**: No external dependencies required

---

## Tech Stack

- **Backend**: PHP 8+
- **Database**: MySQL / MariaDB
- **Frontend**: HTML, CSS, JavaScript (vanilla)
- **Development Tools**: VS Code / PhpStorm with AI plugins (GitHub Copilot)

---



## Getting Started

```bash
1. **Clone the repository**

git clone https://github.com/username/php-mvc.git
cd php-mvc

2. **Configure the database**

Create MySQL database mvc_test
Import the users table schema:
CREATE TABLE users(
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100)
);

3. **Update Database Credentials**
Either in .env (if implemented) or in core/Database.php:
private $host = 'localhost';
private $db   = 'mvc_test';
private $user = 'root';
private $pass = '';

4. **Run the app**
Point your local server root to public/ folder (XAMPP, MAMP, LocalWP, etc.)
Access in browser: http://localhost/php-mvc/public/

5. **Access CRUD pages**
List users: /
Add user: /user/add
Edit user: /user/edit/{id}
Delete user: /user/delete/{id}

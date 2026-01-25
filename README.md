# PHP MVC CRUD Application

## Description
This project is a **fully functional PHP MVC framework** with **CRUD operations for users**, designed for learning or as a lightweight base for larger applications. It demonstrates a clean separation of concerns with **Models, Views, and Controllers**, integrates **MySQL database**, and includes **JavaScript interactivity** for improved user experience.

The frontend uses **Bootstrap 5** for a responsive UI, and the project is structured to be **AI IDE-friendly**, making it easy to use tools like **GitHub Copilot**, **Tabnine**, or **Codeium** for smart code suggestions.

It also supports **AJAX modals** and **API endpoints**, making the app SPA-ready (Single Page Application) for smoother user interactions.

---

## Features

- **MVC Architecture**: Clear separation of logic (Controller), data (Model), and presentation (View)
- **CRUD Operations**: Create, Read, Update, Delete users with MySQL
- **Bootstrap 5 UI**: Responsive, modern interface
- **AJAX Interactivity**: Add, edit, delete users dynamically without page reload
- **SPA-Ready**: Single Page Application behavior for smoother UX
- **MySQL Database Integration**: Secure PDO-based connection
- **API Endpoints**: JSON APIs for users (`/api/users`, `/api/users/{id}`)
- **AI IDE Friendly**: Structured code and documentation for AI-assisted development
- **Routing**: Pretty URLs handled via `.htaccess`
- **Lightweight**: No external dependencies besides Bootstrap

---

## Tech Stack

- **Backend**: PHP 8+
- **Database**: MySQL / MariaDB
- **Frontend**: HTML, CSS, AJAX, JavaScript, Bootstrap 5
- **Development Tools**: VS Code / PhpStorm with AI plugins (GitHub Copilot, Tabnine, Codeium)

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

5. **API Endpoints**
Get all users: GET /api/users
Get single user: GET /api/users/{id}
Create user: POST /api/users/create
Update user: PUT /api/users/{id}/update
Delete user: DELETE /api/users/{id}/delete
Use Postman or JSON in the request body for POST and PUT requests.
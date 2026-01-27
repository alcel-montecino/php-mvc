# PHP MVC Framework (Docker + MySQL + Bootstrap)

A lightweight **PHP MVC framework** built for learning and rapid development.  
Includes **CRUD operations**, **MySQL**, **Bootstrap UI**, **Docker Compose**, and **ngrok** for public access.

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
- **Clean, scalable structure (auth, APIs, SPA-ready)

---

## Tech Stack

- **Backend**: PHP 8+
- **Database**: MySQL / MariaDB
- **Frontend**: HTML, CSS, AJAX, JavaScript, Bootstrap 5
- **Development Tools**: VS Code / PhpStorm with AI plugins (GitHub Copilot, Tabnine, Codeium)

---

## 🛠 Requirements

- Docker & Docker Compose
- ngrok account (free)
- Git
---

## Getting Started

1. **Clone the repository**

```bash
git clone https://github.com/username/php-mvc.git
cd php-mvc
```

2. **Configure the database**
Create MySQL database mvc_test
Import the users table schema:
CREATE TABLE users(
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100)
);
or use script.sql

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

---

## 🔧 Local Setup (Docker)

1. **Clone the project**
```bash
git clone https://github.com/your-username/php-mvc.git
cd php-mvc
```

2. **Start containers**
docker compose down
docker compose up -d --build
This starts:
PHP + Apache → http://localhost:8080
MySQL (auto-imports mvc_test.sql)

2. **Open the app**
http://localhost:8080

---

## 🔧 GitHub Setup

1. **Create GitHub repository**
Go to GitHub → New Repository
Name it php-mvc
Keep it Public

2. **Push code to GitHub**
git init
git add .
git commit -m "Initial PHP MVC setup"
git branch -M main
git remote add origin https://github.com/your-username/php-mvc.git
git push -u origin main

3. **View live (optional – Replit / ngrok)**
Import GitHub repo into Replit OR
Run locally and expose with ngrok:
ngrok http 8080

---

## 🌍 Public Access with ngrok
Use **ngrok** to expose your local PHP MVC app to the internet.

1. **Install ngrok**
**macOS**
```bash
brew install ngrok
```
Windows / Linux
Download from: https://ngrok.com/download

2. **Authenticate ngrok**
Create a free account, then run:
```bash
ngrok config add-authtoken YOUR_NGROK_TOKEN
```

3. **VStart your app**
Make sure Docker is running:
App runs on:
http://localhost:8080

4. **Expose with ngrok**
Start your app
```bash
ngrok http 8080
```
ngrok will generate a public URL:
https://xxxxxx.ngrok-free.app

---

## Notes

Fully Bootstrap 5-styled for responsive tables and forms
AJAX-powered modals improve UX and avoid full page reloads
Ready for SPA-like behavior with API integration
Easy to expand with new tables, authentication, and features

---

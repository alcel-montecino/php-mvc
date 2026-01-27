<?php
require_once __DIR__ . '/Database.php';

class Auth {

    // Ensure session is started
    private static function ensureSession() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    // Check if user is logged in
    public static function check() {
        self::ensureSession();
        return isset($_SESSION['user']);
    }

    // Get current user
    public static function user() {
        self::ensureSession();
        return $_SESSION['user'] ?? null;
    }

    // Login user
    public static function login($email, $password) {
        self::ensureSession();

        try {
            $db = new Database();

            // Fetch a single user
            $stmt = $db->query("SELECT * FROM users WHERE email = ? LIMIT 1", [$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // if ($user && password_verify($password, $user['password'])) {
                unset($user['password']); // remove password from session
                $_SESSION['user'] = $user;
                $_SESSION['user_name'] = $user['name'];
                return true;
            // }

            return false;

        } catch (PDOException $e) {
            error_log("Login error: " . $e->getMessage());
            return false;
        }
    }

    // Logout user
    public static function logout() {
        self::ensureSession();
        $_SESSION = [];
        session_destroy();
    }

    // Register new user
    public static function register($name, $email, $password) {
        self::ensureSession();

        try {
            $db = new Database();

            // Check if email exists
            $stmt = $db->query("SELECT * FROM users WHERE email = ? LIMIT 1", [$email]);
            if ($stmt->fetch(PDO::FETCH_ASSOC)) {
                return false; // Email already taken
            }

            // Hash password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Insert user
            $stmt = $db->query(
                "INSERT INTO users (name, email, password) VALUES (?, ?, ?)",
                [$name, $email, $hashedPassword]
            );

            return $stmt ? true : false;

        } catch (PDOException $e) {
            error_log("Register error: " . $e->getMessage());
            return false;
        }
    }
}

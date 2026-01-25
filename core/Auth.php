<?php
class Auth {
    public static function check(){
        session_start();
        return isset($_SESSION['user']);
    }

    public static function user(){
        return $_SESSION['user'] ?? null;
    }

    public static function login($email, $password){
        $db = new Database();
        $stmt = $db->query("SELECT * FROM users WHERE email=?", [$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if($user && password_verify($password, $user['password'])){
            session_start();
            $_SESSION['user'] = $user;
            return true;
        }
        return false;
    }

    public static function logout(){
        session_start();
        session_destroy();
    }
}

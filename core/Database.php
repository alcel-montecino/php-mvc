<?php
class Database {
    private $pdo;

    public function __construct(){
        // Detect environment
        $isDocker = file_exists('/.dockerenv');

        if ($isDocker) {
            // DOCKER (local)
            $host = 'db';        // docker-compose service name
            $db   = 'mvc_test';
            $user = 'root';
            $pass = 'root';
        } else {
            // LIVE (Replit / Hosting)
            $host = 'db4free.net';   // or remotemysql.com
            $db   = 'mvc_test';
            $user = 'LIVE_DB_USER';
            $pass = 'LIVE_DB_PASS';
        }

        $charset = 'utf8mb4';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        try {
            $this->pdo = new PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            die("DB Connection failed: " . $e->getMessage());
        }
    }
    public function prepare($sql) {
        return $this->pdo->prepare($sql);
    }

    public function query($sql, $params = []){
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}

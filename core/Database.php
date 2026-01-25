<?php
class Database {
    private $host = 'localhost', $db = 'mvc_test', $user = 'root', $pass = '';
    public $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->db;charset=utf8mb4", $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) { die("DB Error: ".$e->getMessage()); }
    }
}

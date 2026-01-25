<?php
require_once 'core/Model.php';
class User extends Model {
    public function getAll() { return $this->db->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC); }
    public function get($id) { $stmt=$this->db->prepare("SELECT * FROM users WHERE id=?"); $stmt->execute([$id]); return $stmt->fetch(PDO::FETCH_ASSOC); }
    public function add($name,$email) { $stmt=$this->db->prepare("INSERT INTO users(name,email) VALUES(?,?)"); return $stmt->execute([$name,$email]); }
    public function update($id,$name,$email){ $stmt=$this->db->prepare("UPDATE users SET name=?,email=? WHERE id=?"); return $stmt->execute([$name,$email,$id]); }
    public function delete($id){ $stmt=$this->db->prepare("DELETE FROM users WHERE id=?"); return $stmt->execute([$id]); }
}

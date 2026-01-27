<?php
class User extends Model {

    public function all() {
        $stmt = $this->db->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function add($name, $email, $password) {
        $stmt = $this->db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT)]);
    }

    public function update($id, $name, $email) {
        $stmt = $this->db->prepare("UPDATE users SET name=?, email=? WHERE id=?");
        return $stmt->execute([$name, $email, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id=?");
        return $stmt->execute([$id]);
    }
}

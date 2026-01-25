<?php
class User extends Model {
    public function all(){
        return $this->db->query("SELECT id,name,email FROM users")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get($id){
        return $this->db->query("SELECT * FROM users WHERE id=?", [$id])->fetch(PDO::FETCH_ASSOC);
    }

    public function add($name,$email,$password){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->query("INSERT INTO users (name,email,password) VALUES (?,?,?)", [$name,$email,$hash]);
        return $stmt->rowCount() > 0;
    }

    public function update($id,$name,$email){
        $stmt = $this->db->query("UPDATE users SET name=?, email=? WHERE id=?", [$name,$email,$id]);
        return $stmt->rowCount() > 0;
    }

    public function delete($id){
        $stmt = $this->db->query("DELETE FROM users WHERE id=?", [$id]);
        return $stmt->rowCount() > 0;
    }
}

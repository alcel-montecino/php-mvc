<?php
class Post extends Model {
    public function all(){
        return $this->db->query("SELECT * FROM posts")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get($id){
        return $this->db->query("SELECT * FROM posts WHERE id=?", [$id])->fetch(PDO::FETCH_ASSOC);
    }

    public function add($title,$content){
        $stmt = $this->db->query("INSERT INTO posts (title, content) VALUES (?,?)", [$title,$content]);
        return $stmt->rowCount() > 0;
    }

    public function update($id,$title,$content){
        $stmt = $this->db->query("UPDATE posts SET title=?, content=? WHERE id=?", [$title,$content,$id]);
        return $stmt->rowCount() > 0;
    }

    public function delete($id){
        $stmt = $this->db->query("DELETE FROM posts WHERE id=?", [$id]);
        return $stmt->rowCount() > 0;
    }
}

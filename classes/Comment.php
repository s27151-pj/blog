<?php
class Comment {
    private $conn;
    private $table_name = "comments";

    public $id;
    public $post_id;
    public $author_id;
    public $content;
    public $username;
    public $publish_date;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($post_id, $author_id, $content, $username) {
        $query = "INSERT INTO " . $this->table_name . " (post_id, author_id, content, username, publish_date) VALUES (:post_id, :author_id, :content, :username, datetime('now'))";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':post_id', $post_id);
        $stmt->bindParam(':author_id', $author_id);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':username', $username);
        return $stmt->execute();
    }

    public function getByPostId($post_id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE post_id = :post_id ORDER BY publish_date DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':post_id', $post_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

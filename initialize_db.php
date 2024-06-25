<?php
include 'classes/Database.php';

$db = new Database();
$conn = $db->getConnection();

$query = "
CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL UNIQUE,
    password TEXT NOT NULL,
    email TEXT NOT NULL UNIQUE,
    role TEXT DEFAULT 'user'
);

CREATE TABLE IF NOT EXISTS posts (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title TEXT NOT NULL,
    content TEXT NOT NULL,
    author_id INTEGER NOT NULL,
    publish_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (author_id) REFERENCES users (id)
);

CREATE TABLE IF NOT EXISTS comments (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    post_id INTEGER NOT NULL,
    author_id INTEGER NOT NULL,
    content TEXT NOT NULL,
    username TEXT NOT NULL,
    publish_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES posts (id),
    FOREIGN KEY (author_id) REFERENCES users (id)
);
";

try {
    $conn->exec($query);
    echo "Database and tables created successfully.<br>";

    // admin user
    $adminUsername = 'admin';
    $adminPassword = password_hash('adminpassword', PASSWORD_DEFAULT);
    $adminEmail = 'admin@example.com';

    $adminInsertQuery = "INSERT INTO users (username, password, email, role) VALUES (:username, :password, :email, 'admin')";
    $stmt = $conn->prepare($adminInsertQuery);
    $stmt->bindParam(':username', $adminUsername);
    $stmt->bindParam(':password', $adminPassword);
    $stmt->bindParam(':email', $adminEmail);
    $stmt->execute();

    echo "Admin user created successfully.<br>";

    // sample post
    $samplePostTitle = 'Star Wars: A New Hope';
    $samplePostContent = 'Star Wars: A New Hope is a 1977 American epic space opera film written and directed by George Lucas. It is the first film in the original Star Wars trilogy and the beginning of the Star Wars franchise.';
    $adminId = $conn->lastInsertId();

    $postInsertQuery = "INSERT INTO posts (title, content, author_id) VALUES (:title, :content, :author_id)";
    $stmt = $conn->prepare($postInsertQuery);
    $stmt->bindParam(':title', $samplePostTitle);
    $stmt->bindParam(':content', $samplePostContent);
    $stmt->bindParam(':author_id', $adminId);
    $stmt->execute();

    echo "Sample post created successfully.<br>";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

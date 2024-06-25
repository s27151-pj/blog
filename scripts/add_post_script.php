<?php
include '../includes/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author_id = $session->get('user_id');

    $post = new Post($conn);
    if ($post->create($title, $content, $author_id)) {
        header("Location: ../views/index.php");
    } else {
        echo "Failed to add post";
    }
}
?>

<?php
include '../includes/config.php';

if (!$session->get('user_id')) {
    header("Location: ../views/login.php");
    exit();
}

$post_id = $_POST['post_id'];
$content = $_POST['content'];
$author_id = $session->get('user_id');
$username = $session->get('username');

$comment = new Comment($conn);
if ($comment->create($post_id, $author_id, $content, $username)) {
    header("Location: ../views/view_post.php?id=" . $post_id);
    exit();
} else {
    echo "Error adding comment.";
}
?>

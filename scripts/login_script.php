<?php
include '../includes/config.php';

$username = $_POST['username'];
$password = $_POST['password'];

$user = new User($conn);
if ($user->login($username, $password)) {
    $session->set('user_id', $user->id);
    $session->set('username', $user->username); // Przechowywanie nazwy użytkownika w sesji
    header("Location: ../views/index.php");
    exit();
} else {
    $error = urlencode("Invalid username or password.");
    header("Location: ../views/login.php?error=$error");
    exit();
}
?>

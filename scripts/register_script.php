<?php
include '../includes/config.php';

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

$user = new User($conn);
try {
    if ($user->register($username, $password, $email)) {
        header("Location: ../views/login.php?success=Registration successful. You can now log in.");
        exit();
    } else {
        throw new Exception("Error: Unable to register.");
    }
} catch (Exception $e) {
    $error = urlencode($e->getMessage());
    header("Location: ../views/register.php?error=$error");
    exit();
}
?>

<?php
include '../includes/config.php';

$session->destroy();
header("Location: ../views/login.php");
exit();
?>

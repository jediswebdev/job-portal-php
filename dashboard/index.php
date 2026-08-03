<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/sign-in.php");
    exit();
}

// Retrieve session data
$userName = $_SESSION['user_name'] ?? 'User';
$userRole = $_SESSION['role'] ?? 'developer';

if ($userRole == "developer") {
    header("Location: ./dev/index.php");
    exit();
}

if ($userRole == "company") {
    header("Location: ./comp/index.php");
    exit();
}
?>
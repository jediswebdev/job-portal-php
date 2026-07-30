<?php
// 1. Initialize session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 2. Unset all session variables
$_SESSION = array();

// 3. Destroy the session cookie in the browser for maximum security
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// 4. Destroy the session completely on the server
session_destroy();

// 5. Redirect back to sign-in page with a success message indicator
header("Location: sign-in.php?logged_out=1");
exit();
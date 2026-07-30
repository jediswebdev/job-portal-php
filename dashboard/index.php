<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/sign-in.php");
    exit();
}

// 2. Safely retrieve session data
$userName = $_SESSION['user_name'] ?? 'User';
$userRole = $_SESSION['role'] ?? 'developer';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - JKyber Labs</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <nav class="bg-slate-900 text-white p-4 shadow-md">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">JKyber Labs Dashboard</h1>
            <a href="../auth/logout.php" class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-md text-sm font-semibold transition-all">
                Logout
            </a>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto p-6">
        <div class="bg-white p-8 rounded-lg shadow-sm border border-gray-200">
            <h2 class="text-2xl font-bold text-gray-800">
                Welcome back, <?php echo htmlspecialchars($userName); ?>!
            </h2>
            <p class="text-gray-600 mt-2">
                Account Type: <span class="capitalize font-semibold text-indigo-600"><?php echo htmlspecialchars($userRole); ?></span>
            </p>
        </div>
    </main>

</body>
</html>
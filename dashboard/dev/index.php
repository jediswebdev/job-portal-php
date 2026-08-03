<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../../auth/sign-in.php");
    exit();
}

// Retrieve session data
$userId = $_SESSION['user_id'] ?? "No user id";
$userName = $_SESSION['user_name'] ?? 'User';
$userRole = $_SESSION['role'] ?? 'developer';
$userProfileImg = $_SESSION['profile_img_url'] ?? "No Profile Image";
$userEmail = $_SESSION['user_email'] ?? "No email";


// Clean image path to work with 2 levels up
$cleanImgPath = ltrim($userProfileImg, '/.');

$profileImgSrc = !empty($userProfileImg) && $userProfileImg !== "No Profile Image" ? "../../" . htmlspecialchars($cleanImgPath) : "../components/favicon.jpg";
?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - JKyber Labs</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="icon" href="../components/favicon.jpg">
</head>

<body class="bg-gray-100 min-h-screen pt-20">


    <!-- Navbar -->
    <nav class="bg-indigo-700 fixed text-white w-full z-20 top-0 start-0 border-b border-indigo-600">

        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="../components/favicon.jpg" class="h-7 rounded" alt="Logo" />
                <span class="self-center text-xl text-white font-semibold whitespace-nowrap">Jkyber Dev Jobs</span>
            </a>

            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse relative">
                <button type="button" class="flex text-sm bg-indigo-400 rounded-full focus:ring-4 focus:ring-indigo-300"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-8 h-8 rounded-full object-cover" src="<?php echo $profileImgSrc; ?>" alt="user photo">
                </button>

                <!-- Dropdown menu -->
                <div class="z-50 hidden absolute right-0 top-full mt-2 bg-white text-gray-800 rounded-lg shadow-lg w-48 border border-gray-200"
                    id="user-dropdown">
                    <div class="px-4 py-3 text-sm border-b border-gray-100">
                        <span class="block font-medium text-gray-900"><?php echo htmlspecialchars($userName); ?></span>
                        <span
                            class="block truncate text-gray-500 text-xs"><?php echo htmlspecialchars($userEmail); ?></span>
                    </div>
                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="user-menu-button">
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-indigo-50 hover:text-indigo-700">Profile</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-indigo-50 hover:text-indigo-700">Settings</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 hover:bg-indigo-50 hover:text-indigo-700">Earnings</a>
                        </li>
                        <li>
                            <a href="../../auth/logout.php"
                                class="block px-4 py-2 hover:bg-indigo-50 hover:text-red-600">Logout</a>
                        </li>
                    </ul>
                </div>

                <!-- Mobile Menu Button -->
                <button data-collapse-toggle="navbar-user" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-white"
                    aria-controls="navbar-user" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="M5 7h14M5 12h14M5 17h14" />
                    </svg>
                </button>
            </div>

            <!-- Navigation Links -->
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-indigo-600 rounded-lg bg-indigo-800 md:bg-transparent md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">
                    <li>
                        <a href="../components/jobs.php"
                            class="block py-2 px-3 text-indigo-100 rounded hover:bg-indigo-600 md:hover:bg-transparent md:hover:text-white md:p-0">Jobs</a>
                    </li>
                    <li>
                        <a href="applications.php"
                            class="block py-2 px-3 text-indigo-100 rounded hover:bg-indigo-600 md:hover:bg-transparent md:hover:text-white md:p-0">My
                            Applications</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-indigo-100 rounded hover:bg-indigo-600 md:hover:bg-transparent md:hover:text-white md:p-0">Dev
                            Events</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-indigo-100 rounded hover:bg-indigo-600 md:hover:bg-transparent md:hover:text-white md:p-0">Companies</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Job sections -->

    

    <!-- Javascript functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Dropdown toggle logic
            const userMenuButton = document.getElementById('user-menu-button');
            const userDropdown = document.getElementById('user-dropdown');

            if (userMenuButton && userDropdown) {
                userMenuButton.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const isExpanded = userMenuButton.getAttribute('aria-expanded') === 'true';
                    userMenuButton.setAttribute('aria-expanded', !isExpanded);
                    userDropdown.classList.toggle('hidden');
                });
            }

            // Mobile Navbar toggle logic
            const mobileMenuButton = document.querySelector('[data-collapse-toggle="navbar-user"]');
            const navbarUser = document.getElementById('navbar-user');

            if (mobileMenuButton && navbarUser) {
                mobileMenuButton.addEventListener('click', (e) => {
                    e.stopPropagation();
                    const isExpanded = mobileMenuButton.getAttribute('aria-expanded') === 'true';
                    mobileMenuButton.setAttribute('aria-expanded', !isExpanded);
                    navbarUser.classList.toggle('hidden');
                });
            }

            // Close dropdowns when clicking outside
            document.addEventListener('click', (e) => {
                if (userDropdown && !userDropdown.contains(e.target) && !userMenuButton.contains(e.target)) {
                    userDropdown.classList.add('hidden');
                    userMenuButton.setAttribute('aria-expanded', 'false');
                }

                if (navbarUser && !navbarUser.contains(e.target) && !mobileMenuButton.contains(e.target)) {
                    navbarUser.classList.add('hidden');
                    mobileMenuButton.setAttribute('aria-expanded', 'false');
                }
            });
        });
    </script>

</body>

</html>
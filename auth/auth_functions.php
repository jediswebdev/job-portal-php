<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require '../lib/database.php';
require '../lib/uploader.php';

class AuthService
{
    private $db;
    public $errors = [];
    public $user;
    public $isVerified;
    public $isAuthorized;

    public function __construct($dbconn, $dbName = 'job_portal_db')
    {
        $this->db = $dbconn;
    }
    private function uploadProfileImg()
    {

        if (!empty($_FILES['profile_img'])) {

            $name = $_FILES['profile_img']['name'];
            $targetDir = '../uploads/profile-images/' . date('Y-m-d') . '_' . rand(10000000, 20000000) . '_' . $name;
            $allowedexts = ['png', 'jpg', 'jpeg'];

            $fileext = explode('.', $name);
            $fileext = strtolower(end($fileext));

            if (in_array($fileext, $allowedexts)) {

                if ($_FILES['profile_img']['size'] <= 1000000) {

                    move_uploaded_file($_FILES['profile_img']['tmp_name'], $targetDir);
                    return [
                        "completed" => true,
                        "path" => $targetDir,
                    ];

                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

    }

    public function registerUser($name, $email, $role, $password, $confirm_password)
    {
        $args = func_get_args();

        // check for missing fields
        foreach ($args as $value) {
            if (empty($value)) {
                return "All Fields are required";
            }
        }

        $uploadImg =
            $response = $this->db->getOneDataFromTable("SELECT email FROM users WHERE email = ?", [$email]);


        if ($response === false) {
            return "Database error while checking email.";
        }

        $data = $response['data'];
        if ($data != null) {
            return "Email already exists, Use a different email";
        }

        // FIXED length check
        if (strlen($name) > 50 || strlen($password) > 50) {
            return "Username or password too long.";
        }

        if ($password != $confirm_password) {
            return "Passwords do not match";
        }

        // Upload Profile Img
        $fileUploaded = $this->uploadProfileImg();

        $randId = rand(10000000, 30000000);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $res = $this->db->insertToTable(
            "INSERT INTO users (user_id, user_name, email, password_hash, user_type, profile_img_url) VALUES (?, ?, ?, ?, ?, ?)",
            [$randId, $name, $email, $hashed_password, $role, $fileUploaded['path'] ?? ""]
        );

        if (!$res || !$res['completed']) {
            return "An error occurred while creating your account.";
        } else {
            return [
                "completed" => true,
                "msg" => "success"
            ];
        }
    }

    public function loginUser($email, $password)
    {
        // 1. Basic validation
        if (empty($email) || empty($password)) {
            return "Please fill in both email and password.";
        }

        try {
            // 2. Fetch user from database
            $stmt = $this->db->connectToDB()->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
            $stmt->execute([':email' => $email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // 3. Check if user exists and password is correct
            if ($user && password_verify($password, $user['password_hash'])) {

                // 4. Store user details in session
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['user_name'] = $user['user_name'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['role'] = $user['role'] ?? 'developer'; // Optional role check
                $_SESSION['profile_img_url'] = $user['profile_img_url'];

                // 5. Redirect on success
                header("Location: ../dashboard/index.php");
                exit(); // Always call exit() after header redirection
            }

            return "Invalid email or password.";

        } catch (PDOException $e) {
            return "An error occurred. Please try again later.";
        }
    }
    public function logoutUser()
    {
        header("Location: ./logout.php");
    }
    public function passwordReset()
    {
    }
    public function deleteAccount()
    {
    }


}

$authService = new AuthService($db);
?>
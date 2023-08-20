<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['passWord']);
   
    require_once "../model/db_connect.php";

    try {
        $conn = db_conn();
        $selectQuery = "SELECT * FROM `registation_info` WHERE email = :email";
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':email' => $email
        ]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['passWord'])) {
            if ($email === 'admin@gmail.com' && $password === '123456') {
                $_SESSION['user_id'] = $user['ID'];
                $_SESSION['is_admin'] = true; // Set admin flag
                header("Location: ../AdminProfile.php"); // Redirect to admin dashboard
                exit();
            } else {
                $_SESSION['user_id'] = $user['ID'];
                header("Location: dashboard.php");
                exit();
            }
        } else {
            echo "Email or password does not match our records. Please try again.";
        }
    } catch (PDOException $e) {
        // Log the error for your reference, and provide a user-friendly error message.
        error_log("Database error: " . $e->getMessage());
        echo "An error occurred. Please try again later.";
    }
}
?>

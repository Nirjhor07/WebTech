<?php
// Perform server-side validation and authentication here
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve user inputs from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate user credentials (you should use a secure authentication method, e.g., hashing the passwords)
    $validUsername = "admin";
    $validPassword = "password";

    if ($username === $validUsername && $password === $validPassword) {
        // Successful login, you can redirect the user to the dashboard or some other page
        // Check if "Remember Me" checkbox is checked
        if (isset($_POST['remember_me']) && $_POST['remember_me'] === 'on') {
            // Set a cookie to remember the user (you can set an expiration date as needed)
            setcookie('remembered_user', $username, time() + (30 * 24 * 60 * 60)); // Expires in 30 days
        }

        header("Location: Welcome.html");
        exit();
    } else {
        // Invalid credentials, display an error message
        echo "Invalid username or password. Please try again.";
    }
}
?>

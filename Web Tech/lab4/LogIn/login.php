<?php
// Start session
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Perform authentication (replace this with your own authentication logic)
    if ($username === 'admin' && $password === 'password') {
        // Set session variables
        $_SESSION['username'] = $username;

        // Set cookie if remember me is checked
        if (isset($_POST['remember'])) {
            $cookie_name = 'remember_me';
            $cookie_value = $username;
            $cookie_expiry = time() + (86400 * 30); // Cookie expires in 30 days
            setcookie($cookie_name, $cookie_value, $cookie_expiry, '/');
        }

        // Redirect to the home page or any other authenticated page
        header('Location: display.php');
        exit;
    } else {
        $error_message = 'Invalid username or password.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Result</title>
</head>
<body>
    <?php if (isset($error_message)): ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>
</body>
</html>

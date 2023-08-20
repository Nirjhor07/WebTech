<?php
session_start();
session_destroy(); // Destroy the session
header("Location: ../userlogin.php"); // Redirect to the login page
exit;
?>

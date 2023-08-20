<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    // If not logged in as admin, redirect to login page
    header("Location: userlogin.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* Your existing CSS styles */
        
        /* Additional CSS styles for buttons */
        .view-button {
            display: inline-block;
            margin: 10px;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.2s ease;
            cursor: pointer;
        }


        .view-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Panel</h1>
        <div class="link-container">
            <a href="#" class="view-button view-users">Show All Users</a>
            <a href="#" class="view-button view-products">Show All Products</a>
            <a href="HomePageLogOut.php" class="view-button logout">Logout</a> <!-- Logout link -->
        </div>
        <div id="content"></div>
    </div>

    <script>
        $(document).ready(function() {
            // AJAX event handler for viewing all users
            $(".view-users").click(function(e) {
                e.preventDefault();
                $("#content").load("./Show_All_user.php");
            });

            // AJAX event handler for viewing all products
            $(".view-products").click(function(e) {
                e.preventDefault();
                $("#content").load("./show_all_product.php");
            });
        });
    </script>
</body>
</html>

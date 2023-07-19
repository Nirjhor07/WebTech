<!DOCTYPE html>
<html>
<head>
    <title>Navigation Page</title>
    <style>
        .page-button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Navigation Page</h1>

    <a class="page-button" href="RegistationPage.html">Registation Page</a>
    <a class="page-button" href="login.html">login Page</a>
     <!--<a class="page-button" href="upload.php">Page 3</a> -->
    <a class="page-button" href="display.php">Home Page</a>
    <a class="page-button" href="HomePage1.Html">Upload Selling goods page</a>
    <!-- Add more pages here -->

    <?php
    // Check if a page parameter is set
    if (isset($_GET['page'])) {
        $page = $_GET['page'];

        // Define the allowed pages
        $allowedPages = array('page1', 'page2', 'page3');
        // Add more pages to the array if needed

        // Check if the selected page is allowed
        if (in_array($page, $allowedPages)) {
            // Include the selected page
            include($page . '.php');
        } else {
            echo '<p>Invalid page selection.</p>';
        }
    }
    ?>

</body>
</html>

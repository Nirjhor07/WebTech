<!DOCTYPE html>
<html>
<head>
    <title>Display User Data</title>
</head>
<body>
    <?php
    // Read the contents of the JSON file
    $jsonData = file_get_contents('userdata.json');

    // Decode the JSON data into a PHP associative array
    $data = json_decode($jsonData, true);

    // Display the user data
    if (!empty($data)) {
        echo '<h2>User Data:</h2>';
        echo '<ul>';
        foreach ($data as $key => $value) {
            echo '<li><strong>' . $key . ':</strong> ' . $value . '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>No user data found.</p>';
    }
    ?>
	<a href = "login.html"> You want to log in!! <a/>
</body>
</html>
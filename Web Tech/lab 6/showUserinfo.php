<?php
session_start();

require_once 'model/db_connect.php'; // Include your database connection logic

// Check if user is logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Fetch user's profile information from the database
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `registation_info` WHERE ID = :user_id";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':user_id' => $user_id
        ]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            echo '<h1>Welcome to Your Profile</h1>';
            echo "Welcome " . $user['email'] . " to your Profile";

            // Display the user's information
            echo '<table>
                    <tr><td>Email:</td><td>' . $user['email'] . '</td></tr>
                    <tr><td>PassWord:</td><td>' . $user['passWord'] . '</td></tr>
                    <tr><td>Date of Birth:</td><td>' . $user['dob'] . '</td></tr>
                    <tr><td>Gender:</td><td>' . $user['Gender'] . '</td></tr>
                    <tr><td>Contact:</td><td>' . $user['contact'] . '</td></tr>
                    <tr><td>Religion:</td><td>' . $user['religion'] . '</td></tr>
                    <tr><td>First Name:</td><td>' . $user['firstName'] . '</td></tr>
                    <tr><td>Last Name:</td><td>' . $user['lastName'] . '</td></tr>
                    <!-- Add more rows for other profile data -->
                  </table>';
        } else {
            echo 'User not found.';
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} else {
    echo 'Please log in to access this page.';
}
?>
<!-- Add a logout link -->
<br>
<a href="./controller/logout.php">Logout</a>

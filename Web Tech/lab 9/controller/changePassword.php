<?php
session_start();

require_once '../model/db_connect.php'; // Include your database connection logic

// Check if user is logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Handle form submission for updating profile
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];
        $confirmNewPassword = $_POST['confirmNewPassword'];

        // Check if the old password matches the one in the database
        $conn = db_conn();
        $selectPasswordQuery = "SELECT passWord FROM `registation_info` WHERE ID = :user_id";
        
        try {
            $stmt = $conn->prepare($selectPasswordQuery);
            $stmt->execute([
                ':user_id' => $user_id
            ]);
            $userPassword = $stmt->fetchColumn();
            
            if (password_verify($oldPassword, $userPassword)) {
                // Check if the new password and confirm new password match
                if ($newPassword === $confirmNewPassword) {
                    // Update the password in the database
                    $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                    $updatePasswordQuery = "UPDATE `registation_info` SET passWord = :passWord WHERE ID = :user_id";

                    try {
                        $stmt = $conn->prepare($updatePasswordQuery);
                        $stmt->execute([
                            ':passWord' => $hashedNewPassword,
                            ':user_id' => $user_id
                        ]);
                        echo "Password updated successfully!";
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                } else {
                    echo "New password and confirm new password do not match.";
                }
            } else {
                echo "Old password is incorrect.";
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

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

            // Display the editable profile form and change password form
            echo '<form method="post">
                <!-- Display other fields here -->

                Old Password: <input type="password" name="oldPassword"><br>
                New Password: <input type="password" name="newPassword"><br>
                Confirm New Password: <input type="password" name="confirmNewPassword"><br>
                
                <input type="submit" value="Update Profile">
            </form>';

            // Add a Logout link
            echo '<br><a href="logout.php">Logout</a>';
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

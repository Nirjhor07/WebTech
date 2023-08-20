<?php
session_start();

require_once './model/db_connect.php'; // Include your database connection logic

// Check if user is logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    // Handle form submission for updating profile
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newEmail = $_POST['email'];
        $newDob = $_POST['dob'];
        $newGender = $_POST['Gender'];
        $newContact = $_POST['contact'];
        $newReligion = $_POST['religion'];
        $newFirstName = $_POST['firstName'];
        $newLastName = $_POST['lastName'];

        $conn = db_conn();
        $updateQuery = "UPDATE `registation_info` SET email = :email, dob = :dob, gender = :Gender, contact = :contact, religion = :religion, firstName = :firstName, lastName = :lastName WHERE ID = :user_id";

        try {
            $stmt = $conn->prepare($updateQuery);
            $stmt->execute([
                ':email' => $newEmail,
                ':dob' => $newDob,
                ':Gender' => $newGender,
                ':contact' => $newContact,
                ':religion' => $newReligion,
                ':firstName' => $newFirstName,
                ':lastName' => $newLastName,
                ':user_id' => $user_id
            ]);
            echo "Profile updated successfully!";
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

            // Display the editable profile form
            echo '<form method="post">
    ';
            echo 'Email: <input type="text" name="email" value="' . $user['email'] . '"><br>';
            echo 'Date of Birth: <input type="date" name="dob" value="' . $user['dob'] . '"><br>';
            echo 'Gender: <input type="text" name="Gender" value="' . $user['Gender'] . '"><br>';
            echo 'Contact: <input type="text" name="contact" value="' . $user['contact'] . '"><br>';
            echo 'Religion: <input type="text" name="religion" value="' . $user['religion'] . '"><br>';
            echo 'First Name: <input type="text" name="firstName" value="' . $user['firstName'] . '"><br>';
            echo 'Last Name: <input type="text" name="lastName" value="' . $user['lastName'] . '"><br>';
            // Add more input fields for other profile data here
            echo '<input type="submit" value="Update Profile">';
            echo '
</form>';
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

<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $password = $_POST['passWord'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    //$gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $religion = $_POST['religion'];

    // Validate form fields
    $errors = array();

    // Validate First Name
    if (empty($firstName)) {
        $errors['firstName'] = 'First Name is required.';
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $firstName)) {
        $errors['firstName'] = 'First Name should contain only letters and spaces.';
    }

    // Validate Last Name
    if (empty($lastName)) {
        $errors['lastName'] = 'Last Name is required.';
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $lastName)) {
        $errors['lastName'] = 'Last Name should contain only letters and spaces.';
    }

    // Validate Password
    if (empty($password)) {
        $errors['password'] = 'Password is required.';
    } elseif (strlen($password) < 6) {
        $errors['password'] = 'Password should be at least 6 characters long.';
    }

    // Validate Email
    if (empty($email)) {
        $errors['email'] = 'Email is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format.';
    }
	
	// Validate Contact
    if (empty($contact)) {
        $errors['contact'] = 'Contact is required.';
    } elseif (!preg_match("/^\+?\d+$/", $contact)) {
        $errors['contact'] = 'Invalid contact number format.';
    }
	// Validate Date of Birth
   if (empty($_POST["dob"])) {
    $errors['dob'] = "Date of Birth is required.";
} else {
    // Convert DOB to a DateTime object to check if it's a valid date
    $dob = DateTime::createFromFormat('Y-m-d', $_POST["dob"]);
    if (!$dob || $dob->format('Y-m-d') !== $_POST["dob"]) {
        $errors['dob'] = "Invalid Date of Birth format. Please use the YYYY-MM-DD format.";
    } else {
        // Additional validation can be done here if needed, e.g., checking if the user is at least 18 years old.
        // Convert the DateTime object to a string in 'Y-m-d' format before inserting into the database
        $dobString = $dob->format('Y-m-d');
    }
}
	// Validate Gender
    if (empty($_POST['gender'])) {
    $errors['gender'] = 'Please select your gender.';
    } else {
    $genderOptions = array('Male', 'Female');
    if (!in_array($_POST['gender'], $genderOptions)) {
        $errors['gender'] = 'Invalid gender selected.';
    }
	$gender = $_POST['gender'];
}
	// Validate Religion
if (empty($_POST['religion'])) {
    $errors['religion'] = 'Please select your religion.';
} else {
    $religionOptions = array('Islam', 'Christian', 'Hindu', 'Buddhism');
    if (!in_array($_POST['religion'], $religionOptions)) {
        $errors['religion'] = 'Invalid religion selected.';
    }
}

    // Perform additional validations for other fields if needed

    // Display the output or error message
    if (count($errors) > 0) {
        include '../RegistationPage.html';
        exit;
    } 
      else {
           $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        // Display success message or process the data further
        echo '<h2>Registration Successful!</h2>';
        echo '<p>First Name: ' . $firstName . '</p>';
        echo '<p>Last Name: ' . $lastName . '</p>';
        echo '<p>Email: ' . $email . '</p>';
        echo '<p>Password: ' . $password . '</p>';
        echo '<p>Contact: ' . $contact . '</p>';
        echo '<p>Gender: ' . $gender . '</p>';
        echo '<p>Religion: ' . $religion . '</p>';
		
        //echo '<p>Date of Birth: ' . $dob . '</p>';
		
        // Display other form field values as needed
    }
	if ($dob instanceof DateTime) {
        echo '<p>Date of Birth: ' . $dob->format('Y-m-d') . '</p>';
    }
	
    if (isset($_FILES['uploadPicture']) && $_FILES['uploadPicture']['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES['uploadPicture']['tmp_name'];
        $fileName = $_FILES['uploadPicture']['name'];
        $fileSize = $_FILES['uploadPicture']['size'];
        $fileType = $_FILES['uploadPicture']['type'];

        // You can perform additional validations for the uploaded file if needed

        // Move the uploaded file to a permanent location
        $destination = '../uploads/' . $fileName;
        move_uploaded_file($tmpName, $destination);
    }
	
    // Retrieve the path of the uploaded image
    $uploadedImagePath = '../uploads/' . $_FILES['uploadPicture']['name'];

    // Display the uploaded picture if it exists
    if (file_exists($uploadedImagePath)) {
        echo '<h2>Uploaded Picture:</h2>';
        echo '<img src="' . $uploadedImagePath . '" alt="Uploaded Picture" width="200">';
    }
}
if (count($errors) == 0) {
    require_once '../model/db_connect.php';

    try {
        $conn = db_conn();
        $insertQuery = "INSERT INTO `registation_info` (firstName, lastName, passWord, email,uploadPicture, contact, gender, dob, religion)
         VALUES (:firstName, :lastName, :password, :email,:uploadpicture, :contact, :gender, :dob, :religion)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->execute([
            ':firstName' => $firstName,
            ':lastName' => $lastName,
            ':password' => $hashedPassword,
            ':email' => $email,
            ':uploadpicture'=>$uploadedImagePath,
            ':contact' => $contact,
            ':gender' => $gender,
            ':dob' => $dobString, // Use the converted string here
            ':religion' => $religion,
        ]);

        // Display success message or process the data further
        echo '<h2>Registration Successful!</h2>';
        // ... Display the user's information here if needed
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    include '../RegistationPage.html';
}


?>

            <br />
            <a href="../Userlogin.php" class="btn-login">Log in</a>
       
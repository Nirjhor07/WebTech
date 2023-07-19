<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $password = $_POST['passWord'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
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
	$errors['contact'] = 'Invalid contact number format.';}

    // Perform additional validations for other fields if needed

    // Display the output or error message
    if (count($errors) > 0) {
        echo '<h2>Error:</h2>';
        echo '<ul>';
        foreach ($errors as $error) {
            echo '<li>' . $error . '</li>';
        }
        echo '</ul>';
    } else {
        // Display success message or process the data further
        echo '<h2>Registration Successful!</h2>';
        echo '<p>First Name: ' . $firstName . '</p>';
        echo '<p>Last Name: ' . $lastName . '</p>';
        echo '<p>Email: ' . $email . '</p>';
        // Display other form field values as needed
    }
	 // Handle file upload for profile picture
	 $directory = 'path/to/directory'; // Replace with the actual directory path you want to check
$directory='uploads/C:\xampp\htdocs\Mid Project';
if (is_writable($directory)) {
    echo 'The directory is writable.';
} else {
    echo 'The directory is not writable.';
}
//define (UPLOADS, C:\xampp\htdocs\Mid Project );
    if (isset($_FILES['uploadPicture']) && $_FILES['uploadPicture']['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES['uploadPicture']['tmp_name'];
        $fileName = $_FILES['uploadPicture']['name'];
        $fileSize = $_FILES['uploadPicture']['size'];
        $fileType = $_FILES['uploadPicture']['type'];

        // You can perform additional validations for the uploaded file if needed

        // Move the uploaded file to a permanent location
        $destination = 'uploads/' . $fileName;
        move_uploaded_file($tmpName, $destination);
    }
	
// Retrieve the path of the uploaded image
$uploadedImagePath = 'uploads/' . $_FILES['uploadPicture']['name'];

// Display the uploaded picture if it exists
if (file_exists($uploadedImagePath)) {
    echo '<h2>Uploaded Picture:</h2>';
    echo '<img src="' . $uploadedImagePath . '" alt="Uploaded Picture" width="200">';
}
  if (empty($errors)) {
        $data['firstName'] = $firstName;
        $data['lastName'] = $lastName;
        $data['password'] = $password;
        $data['email'] = $email;
        $data['contact'] = $contact;
        $data['gender'] = $gender;
        $data['dob'] = $dob;
        $data['religion'] = $religion;

        // Convert the data array to JSON
        $jsonData = json_encode($data);

        // Write the JSON data to a file
        $filename = 'userdata.json';
        file_put_contents($filename, $jsonData);
    }
	//header('Location: display_data.php');
        //exit;
 //<a href="../login.html">Now you can log in here!</a>
}
?>

<br>
 <a href="RegistationPage.html"> Go back to previous page! <a/><br>
 <a href="display_data.php"> show me the register info!! <a/>



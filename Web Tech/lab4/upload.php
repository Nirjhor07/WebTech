<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["photo"]["name"]);
    $uploadOk = true;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is an actual image
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if ($check === false) {
        echo "Error: File is not an image.";
        $uploadOk = false;
    }

    // Check if the file already exists
    if (file_exists($targetFile)) {
        echo "Error: File already exists.";
        $uploadOk = false;
    }

    // Check file size (optional)
    if ($_FILES["photo"]["size"] > 5000000000) {
        echo "Error: File is too large.";
        $uploadOk = false;
    }

    // Allow only certain file formats (e.g., JPEG, PNG)
    if ($imageFileType !== "jpg" && $imageFileType !== "jpeg" && $imageFileType !== "png") {
        echo "Error: Only JPG, JPEG, and PNG files are allowed.";
        $uploadOk = false;
    }

    if ($uploadOk) {
        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
            // Save the caption in a database or do other processing as needed
            $caption = $_POST["caption"];
            // ... additional processing logic ...

            // Prepare data to be stored in the JSON file
            $newData = [
                "photo" => $targetFile,
                "caption" => $caption
            ];

            // Load existing data from the JSON file or create an empty array
            $jsonData = file_get_contents("data.json");
            $data = json_decode($jsonData, true) ?: [];

            // Append new data to the existing data array
            $data[] = $newData;

            // Save updated data back to the JSON file
            $updatedJsonData = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents("data.json", $updatedJsonData);

            // Display the uploaded photo and caption
            echo "<h2>Uploaded Photo:</h2>";
            echo "<img src='$targetFile' alt='Uploaded Photo' width='300'>";
            echo "<h2>Caption:</h2>";
            echo "<p>$caption</p>";
        } else {
            echo "Error: There was an error uploading the file.";
        }
    }
}
?>
<BR>
<a href="display.php">Home page 1 <a>
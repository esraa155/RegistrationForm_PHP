<?php
require_once 'DB_Ops.php';

// Get form data
$full_name = $_POST['full_name'];
$user_name = $_POST['user_name'];
$birthdate = $_POST['birthdate'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$email = $_POST['email'];

// Check if form data is valid
if (!empty($errors)) {
  // Output errors and exit script
  foreach ($errors as $error) {
    echo "<p>$error</p>";
  }
  exit;
}

// Check if uploads directory exists, create it if not
if (!is_dir('uploads')) {
  mkdir('uploads');
}

// Get user image data
$user_image = $_FILES['user_image']['name'];
$user_image_temp = $_FILES['user_image']['tmp_name'];
$user_image_location = "uploads/" . $user_image;

// Check if file upload was successful
if ($_FILES['user_image']['error'] !== UPLOAD_ERR_OK) {
  die('File upload failed with error code ' . $_FILES['user_image']['error']);
}

// Move uploaded file to uploads directory
if (move_uploaded_file($user_image_temp, $user_image_location)) {
  // File upload successful, proceed with database insert
  saveUserData($full_name, $user_name, $birthdate, $phone, $address, $password, $confirm_password, $email, $user_image_location);

} else {
  die('Failed to move uploaded file');
}


?>
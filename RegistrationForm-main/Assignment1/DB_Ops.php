<?php

function dbConnect() {
  // Create connection
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "User";

  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  return $conn;
}

function saveUserData($full_name, $user_name, $birthdate, $phone, $address, $password, $confirm_password, $email, $user_image_location) {
  $conn = dbConnect();

  // Check if uploads directory exists, create it if not
  if (!is_dir('uploads')) {
    mkdir('uploads');
  }
if(!checkUsernameExists($user_name))
  // Insert data into database
 {
  $sql = "INSERT INTO usersdata (full_name, user_name, birthdate, phone, address, password, confirm_password, email, user_image) 
        VALUES ('$full_name', '$user_name', '$birthdate', '$phone', '$address', '$password', '$confirm_password', '$email', '$user_image_location')";

  if ($conn->query($sql) === TRUE) {
    echo "Data Inserted";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

}
}

function checkUsernameExists($user_name) {
  $conn = dbConnect();

  $sql = "SELECT * FROM usersdata WHERE user_name='$user_name'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Username already exists, return true
    echo "Username already exists";
    return true;
  } else {
    // Username does not exist, return false
    return false;
  }

}

?>
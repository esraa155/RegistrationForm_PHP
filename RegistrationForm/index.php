
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src= "actor_request.js" defer></script>
    <script src= "scripts.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#myForm").submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var formData = new FormData(form[0]);
        $.ajax({
          url: "Upload.php",
          type: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function(response) {
            alert("Inserted");
            form.trigger("reset");
          },
          error: function(jqXHR, textStatus, errorMessage) {
            console.log(errorMessage);
          }
        });
      });
    });
  </script>
    <title>Source Code Of Login & Registration Form</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    .my-form {
  max-width: 600px;
  margin: 0 auto;
  background-color: #f2f2f2;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  font-family: Arial, sans-serif;
}

.my-form h2 {
  text-align: center;
  margin-bottom: 30px;
}

.form-group {
  margin-bottom: 20px;
}

.form-group label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

.form-group input[type="text"],
.form-group input[type="email"],
.form-group input[type="tel"],
.form-group input[type="date"],
.form-group input[type="password"],
.form-group input[type="file"] {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

.btn-submit { 
  background-color: #007bff;
  color: #fff;
  border: none;
  padding: 10px 20px;
  font-size: 16px;
  border-radius: 5px;
}
  header {
  background-color: #f2f2f2;
  padding: 20px;
  text-align: center;
}

h1 {
  margin: 0;
  font-size: 36px;
}


 </style>
</head>
<body><?php
  include("header.php");
?> 
<main>
<br>
<form id="myForm" action="Upload.php" method="post"  enctype="multipart/form-data" class="my-form" onsubmit="validateForm()">
  
  <div class="form-group">
    <label for="full_name">Full Name</label>
    <input type="text" name="full_name" id="full_name" required >
  </div>

  <div class="form-group">
    <label for="user_name">User Name</label>
    <input type="text" name="user_name" id="user_name" required>
  </div>

  <div class="form-group">
    <label for="birthdate">Birthdate</label>
    <input type="date" name="birthdate" id="birthdate" required>
    <button type="button" id="get-actors-button">Get Actors</button>
  </div>
  <div id="container"> </div>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input type="tel" name="phone" id="phone" required>
  </div>

  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" name="address" id="address" required>
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" id="password" required>
  </div>

  <div class="form-group">
    <label for="confirm_password">Confirm Password</label>
    <input type="password" name="confirm_password" id="confirm_password">
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" required>
  </div>
  <div class="form-group">
    <label for="user_image">User Image</label>
    <input type="file" name="user_image" id="user_image" required>
  </div>
  <button type="submit" class="btn-submit" id=submit >Submit</button>
</form>

<br>

<?php
         include("footer.php");
  ?>
</body>
</html>
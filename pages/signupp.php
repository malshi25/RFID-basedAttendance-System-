<?php

// Define variables to store user input
$username  = $email = $password = $usertype =  "";
$usernameErr = $emailErr = $passwordErr = $usertypeErr =  "";

// Database connection configuration
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "attendance";


$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = md5($_POST['password']);
   $usertype = $_POST['usertype'];

   $select = " SELECT * FROM signup WHERE username = '$username' && password = '$password' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{
         $insert = "INSERT INTO signup (username, email, password, usertype) VALUES ('$username', '$email', '$password', '$usertype')";
         mysqli_query($conn, $insert);
         header('location:login.php');
      }
   };


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="username" required placeholder="enter your name">
      <input type="email" name="email" required placeholder="enter your email">
      <select name="usertype">
         <option value="staff">Staff</option>
         <option value="admin">Admin</option>
      </select>
      <input type="password" name="password" required placeholder="enter your password">
      
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="login.php">login now</a></p>
   </form>

</div>

</body>
</html>
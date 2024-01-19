<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

  <?php
// Define variables to store user input
$username =  $password =  "";
$usernameErr = $passwordErr =  "";

// Database connection configuration
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "attendance";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate and sanitize input
  if (empty($_POST["username"])) {
      $usernameErr = "Username is required";
  } else {
      $username = test_input($_POST["username"]);
  }


  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
} else {
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password
}

// If all inputs are valid, insert data into the database
if (empty($usernameErr)  && empty($utypeErr) && empty($passwordErr)) {
  $sql = "INSERT INTO login (username, password) VALUES ('$username','$password')";

  if ($conn->query($sql) === TRUE) {
      echo "Log In successful!";
      // You can redirect the user to a different page here
      // Redirect the user to dashboard.php
  header("Location: dashboard.php");
  exit; // Terminate script execution
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
}

// Function to sanitize and validate input
function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}


$conn->close(); // Close the database connection
?>

  <div class="containerlog">
    <h1>Welcome back</h1>
    <h2>Enter your student Id and password to sign in</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <form id="login-form" onsubmit="submitForm(event)">
      <input type="text" id="username" name="username" value="<?php echo $username;?>" placeholder="Username" required>
     <br>
      
</select>

      <input type="password" id="password" name="password" value="<?php echo $password;?>" placeholder="Password" required>
      <br>
      <a href="signup.php" class="text-link">
        <span class="text">Sign Up</span>
        <br><br><br>
          <button type="submit">SIGN IN</button>

    </form>
  </div>

  <script src="script.js"></script>
</body>
</html>

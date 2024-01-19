<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
// Define variables to store user input
$username = $email = $password = "";
$usernameErr = $emailErr = $passwordErr = "";

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

    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

   
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password
    }

    // If all inputs are valid, insert data into the database
    if (empty($usernameErr) && empty($emailErr) && empty($passwordErr) && empty($usertypeErr)) {
        $sql = "INSERT INTO signup (username, email, password) VALUES ('$username', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            echo "Sign Up successful!";
            // You can redirect the user to a different page here
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



<div class="container">
<h1>WELCOME</h1>
<h2>Sign Up Your Account</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<form id="signup-form" onsubmit="submitForm(event)">
    <label for="username">Username:</label>
    <input type="text" name="username" value="<?php echo $username;?>">
    <span class="error"><?php echo $usernameErr;?></span>
   

    <label for="email">Email:</label>
    <input type="text" name="email" value="<?php echo $email;?>">
    <span class="error"><?php echo $emailErr;?></span>
    
    <label for="password">Password:</label>
    <input type="password" name="password" value="<?php echo $password;?>">
    <span class="error"><?php echo $passwordErr;?></span>

    <a href="loginn.php" class="text-link">
        <span class="text">Sign In</span>
        <br><br>

    <input type="submit" name="submit" value="Sign Up">
</form>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add Lectures</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    

<?php

$name = $phone = $email = $lecid = $faculty = "";
$nameErr = $phoneErr =$emailErr = $lecidErr = $facultyErr = "";

// Database connection parameters
$host = "localhost"; // Replace with your host
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$database = "attendance"; // Replace with your database name

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process registration form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $lecid = $_POST["lecid"];
    $faculty = $_POST["faculty"];
    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate and sanitize input
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = test_input($_POST["name"]);
        }
    
    
        if (empty($_POST["phone"])) {
            $phoneErr = "Phone Number is required";
        } else {
            $usertype = test_input($_POST["phone"]);
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }
    

        if (empty($_POST["lecid"])) {
            $lecidErr = "Lecture ID is required";
        } else {
            $lecid = test_input($_POST["lecid"]);
        }

        if (empty($_POST["faculty"])) {
            $facultyErr = "Faculty ID is required";
        } else {
            $faculty = test_input($_POST["faculty"]);
        }

    
    
    
        // If all inputs are valid, insert data into the database
        if (empty($nameErr) && empty($phoneErr) && empty($emailErr) && empty($lecidErr) && empty($facultyErr)) {
    

    // Insert user data into the database
    $sql = "INSERT INTO lecture (name, phone, email, lecid, faculty) VALUES ('$name', '$phone', '$email', '$lecid', '$faculty')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";

        header("Location: lecture panel.php");
        exit();

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Lectures</title>
</head>
<body>
    <div class="container">
    <h1>Add Lectures</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $name;?>">
    <span class="error"><?php echo $nameErr;?></span><br>

        <label for="phone">Phone:</label>
        <input type="phone" name="phone" value="<?php echo $phone;?>">
    <span class="error"><?php echo $phoneErr;?></span><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $email;?>">
    <span class="error"><?php echo $emailErr;?></span><br>

        <label for="lecid">Lecture ID:</label>
        <input type="lecid" name="lecid" value="<?php echo $lecid;?>">
    <span class="error"><?php echo $lecidErr;?></span><br>

        <label for="faculty">Faculty:</label>
        <input type="faculty" name="faculty" value="<?php echo $faculty;?>">
    <span class="error"><?php echo $facultyErr;?></span><br>

        <input type="submit" value="Add">
        
    </form>

        
</body>
</html>

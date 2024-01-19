<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add Student</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    

<?php
$fname = $email = $phone = $nic =  $idnum =  $batch =  $fac =  $course ="";
$fnameErr = $emailErr = $phoneErr = $nicErr = $idnumErr = $batchErr = $facErr = $courseErr = "";

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
    $fname = $_POST["fname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $nic = $_POST["nic"];
    $idnum = $_POST["idnum"];
    $batch = $_POST["batch"];
    $fac = $_POST["fac"];
    $course= $_POST["course"];
    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate and sanitize input
        if (empty($_POST["fname"])) {
            $fnameErr = "Name is required";
        } else {
            $fname = test_input($_POST["fname"]);
        }
    
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }
    
        if (empty($_POST["phone"])) {
            $phoneErr = "Phone Number is required";
        } else {
            $usertype = test_input($_POST["phone"]);
        }
    
        if (empty($_POST["nic"])) {
            $nicErr = "NIC is required";
        } else {
            $nic = test_input($_POST["nic"]);
        }

        if (empty($_POST["idnum"])) {
            $idnumErr = "Student ID is required";
        } else {
            $idnum = test_input($_POST["idnum"]);
        }

        if (empty($_POST["batch"])) {
            $batchErr = "Intake ID is required";
        } else {
            $batch = test_input($_POST["batch"]);
        }

        if (empty($_POST["fac"])) {
            $facErr = "Faculty ID is required";
        } else {
            $fac = test_input($_POST["fac"]);
        }

        if (empty($_POST["course"])) {
            $courseErr = "Degree ID is required";
        } else {
            $course = test_input($_POST["course"]);
        }
    
    
        // If all inputs are valid, insert data into the database
        if (empty($fnameErr) && empty($emailErr) && empty($phoneErr) && empty($nicErr) && empty($idnumErr) && empty($batchErr) && empty($facErr) && empty($courseErr)) {

    // Insert user data into the database
    $sql = "INSERT INTO student (fname, email, phone, nic, idnum, batch, fac, course) VALUES ('$fname', '$email', '$phone', '$nic', '$idnum', '$batch', '$fac', '$course')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";

        header("Location: student.php");
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
    <title>Registration</title>
</head>
<body>
    <div class="container">
    <h1>Add Student</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="fname">name:</label>
        <input type="text" name="fname" value="<?php echo $fname;?>">
    <span class="error"><?php echo $fnameErr;?></span>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $email;?>">
    <span class="error"><?php echo $emailErr;?></span>

        <label for="phone">Phone:</label>
        <input type="phone" name="phone" value="<?php echo $phone;?>">
    <span class="error"><?php echo $phoneErr;?></span>

        <label for="nic">NIC:</label>
        <input type="nic" name="nic" value="<?php echo $nic;?>">
    <span class="error"><?php echo $nicErr;?></span>

        <label for="idnum">Student ID:</label>
        <input type="idnum" name="idnum" value="<?php echo $idnum;?>">
    <span class="error"><?php echo $idnumErr;?></span>

        <label for="batch">Intake:</label>
        <input type="batch" name="batch" value="<?php echo $batch;?>">
    <span class="error"><?php echo $batchErr;?></span>

        <label for="fac">Faculty:</label>
        <input type="fac" name="fac" value="<?php echo $fac;?>">
    <span class="error"><?php echo $facErr;?></span>

        <label for="course">Degree:</label>
        <input type="course" name="course" value="<?php echo $course;?>">
    <span class="error"><?php echo $courseErr;?></span>

        <input type="submit" value="Register">
        
    </form>

        
</body>
</html>

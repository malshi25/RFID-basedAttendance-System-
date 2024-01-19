<!DOCTYPE html>
<html lan="ën" dir="ltr">
<head>
	<meta charset="UTF-8">
	<title>View Lecture</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <?php




// Database connection configuration
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "attendance";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}





$sql = "SELECT * FROM `lecture`";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
//print_r($row);

$fname = $row['name'];
$phone = $row['phone'];
$email = $row['email'];
$lecid = $row['lecid'];
$faculty = $row['faculty'];



    ?>

<!-- Add Student Form-->
<div class="container">
<h1>View Lecture</h1>
<h2>View lecture details</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<form id="signup-form" onsubmit="submitForm(event)">
    <label for="name">Full Name:</label>
    <input type="text" name="name" disabled value="<?php echo $fname;?>">
    
    <label for="phone">Phone:</label>
    <input type="phone" name="phone" disabled value="<?php echo $phone;?>">

    <label for="email">Email:</label>
    <input type="text" name="email" disabled value="<?php echo $email;?>">   

    <label for="lecid">Lecture ID:</label>
    <input type="text" name="lecid" disabled value="<?php echo $lecid;?>">
    
    <label for="faculty">Faculty:</label>
    <input type="faculty" name="faculty" disabled value="<?php echo $faculty;?>">
      
    
</form>

       


</body>
</html>
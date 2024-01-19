<!DOCTYPE html>
<html lan="ën" dir="ltr">
<head>
	<meta charset="UTF-8">
	<title>View Student</title>
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




$id = $_GET['id'];
$sql = "SELECT * FROM `student` WHERE id = $id"; // Replace 'id' with your column name
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
//print_r($row);


$fname = $row['fname'];
$email = $row['email'];
$phone = $row['phone'];
$nic = $row['nic'];
$idnum = $row['idnum'];
$batch = $row['batch'];
$fac = $row['fac'];
$course = $row['course'];


    ?>

<!-- Add Student Form-->
<div class="container">
<h1>View Student</h1>
<h2>View student details</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<form id="signup-form" onsubmit="submitForm(event)">
<input type="hidden" name="id" value="<?php echo $id; ?>">
    <label for="fname">Full Name:</label>
    <input type="text" name="fname" disabled value="<?php echo $fname;?>">
    
   
    <label for="email">Email:</label>
    <input type="text" name="email" disabled value="<?php echo $email;?>">
    
    

    <label for="phone">Phone:</label>
    <input type="phone" name="phone" disabled value="<?php echo $phone;?>">
   
    

    <label for="nic">NIC:</label>
    <input type="nic" name="nic" disabled value="<?php echo $nic;?>">
    
    

    <label for="idnum">Student ID:</label>
    <input type="text" name="idnum" disabled value="<?php echo $idnum;?>">
    
    
    <label for="batch">Batch:</label>
    
    <select id="batch" name="batch" disabled value="<?php echo $batch;?>">
    <option value="batch 01">Intake 01</option>
                <option value="batch 02">Intake 02</option>
				<option value="batch 03">Intake 03</option>
				<option value="batch 04">Intake 04</option>
				<option value="batch 05">Intake 05</option>
				<option value="batch 06">Intake 06</option>
				<option value="batch 07">Intake 07</option>
				<option value="batch 08">Intake 08</option>
    
    
</select>

<label for="fac">Faculty:</label>
    <input type="fac" name="fac" disabled value="<?php echo $fac;?>">
   
    

    <label for="course">Degree:</label>
    <input type="course" name="course" disabled value="<?php echo $course;?>">
    
    

   
    
</form>

       


</body>
</html>
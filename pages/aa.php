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





$sql = "SELECT * FROM `attends`";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
//print_r($row);

$fname = $row['fname'];
$idnum= $row['idnum'];
$attend = $row['attend'];
$intake = $row['intake'];
$date = $row['date'];
$time = $row['time'];
$fac = $row['fac'];
$degree= $row['degree']



    ?>

<!-- Add Student Form-->
<div class="container">
<h1>View Lecture</h1>
<h2>View lecture details</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<form id="signup-form" onsubmit="submitForm(event)">
    <label for="fname">Full Name:</label>
    <input type="text" name="fname" disabled value="<?php echo $fname;?>">
    
    <label for="idnum">Student ID:</label>
    <input type="idnum" name="idnum" disabled value="<?php echo $idnum;?>">

    <label for="attend">Attendance:</label>
    <input type="text" name="attend" disabled value="<?php echo $attend;?>">   

    <label for="intake">Intake:</label>
    <input type="text" name="intake" disabled value="<?php echo $intake;?>">

    <label for="date">Date:</label>
    <input type="text" name="date" disabled value="<?php echo $date;?>">

    <label for="time">Time:</label>
    <input type="text" name="time" disabled value="<?php echo $time;?>">
    
    <label for="fac">Faculty:</label>
    <input type="fac" name="fac" disabled value="<?php echo $fac;?>">

    <label for="degree">Degree:</label>
    <input type="degree" name="degree" disabled value="<?php echo $degree;?>">
      
    <a href="print.php" class="btn-download">
					<i class='bx bxs-add-to-queue' ></i>
					<span class="text">Print</span>
				</a>
</form>

       


</body>
</html>
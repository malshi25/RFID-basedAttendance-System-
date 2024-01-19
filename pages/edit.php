<!DOCTYPE html>
<html lan="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Edit Lecture</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "attendance";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$id = $_GET['id']; // Assuming you have an 'id' parameter in the URL
$sql = "SELECT * FROM `student` WHERE id = $id"; // Replace 'id' with your column name
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $fname = $row['fname'];
    $email = $row['email'];
    $phone = $row['phone'];
    $nic = $row['nic'];
    $idnum = $row['idnum'];
    $batch = $row['batch'];
    $fac = $row['fac'];
    $course = $row['course'];
} else {
    echo "No record found.";
}
?>

<div class="container">
    <h1>Edit Student</h1>
    <h2>Edit student details</h2>
    <form method="post" action="update.php"> 

    <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label for="fname">Full Name:</label>
        <input type="text" name="fname" value="<?php echo $fname;?>">
    
        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo $email;?>">
    
        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="<?php echo $phone;?>">
   
        <label for="nic">NIC:</label>
        <input type="text" name="nic" value="<?php echo $nic;?>">
    
        <label for="idnum">Student ID:</label>
        <input type="text" name="idnum" value="<?php echo $idnum;?>">
    
        <label for="batch">Batch:</label>
        <input type="text" name="batch" value="<?php echo $batch;?>">
    
        <label for="fac">Faculty:</label>
        <input type="text" name="fac" value="<?php echo $fac;?>">
   
        <label for="course">Degree:</label>
        <input type="text" name="course" value="<?php echo $course;?>">
    
        <input type="submit" value="Update">
    </form>
</div>

</body>
</html>

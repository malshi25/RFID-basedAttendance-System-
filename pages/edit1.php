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
$sql = "SELECT * FROM `lecture` WHERE id = $id"; // Replace 'id' with your column name
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $phone = $row['phone'];
    $email = $row['email'];
    $lecid = $row['lecid'];
    $faculty = $row['faculty'];
} else {
    echo "No record found.";
}
?>

<div class="container">
    <h1>Edit Student</h1>
    <h2>Edit student details</h2>
    <form method="post" action="update1.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label for="name">Full Name:</label>
        <input type="text" name="name" value="<?php echo $name; ?>">
    
        <label for="phone">Phone:</label>
        <input type="text" name="phone" value="<?php echo $phone;?>">

        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo $email;?>">
    
        <label for="lecid">Lecture ID:</label>
        <input type="text" name="lecid" value="<?php echo $lecid;?>">
    
        <label for="faculty">Faculty:</label>
        <input type="text" name="faculty" value="<?php echo $faculty;?>">
   

    
        <input type="submit" value="Update">
    </form>
</div>

</body>
</html>

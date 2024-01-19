<?php

$id = $_GET['id'];

// Database connection configuration
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "attendance";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

$sql = "DELETE FROM `attends` WHERE id=$id";



$delete = mysqli_query($conn,$sql);
    if($delete)
    {
        header("Location: attendance.php");
    }

    ?>
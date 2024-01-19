<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $nic = $_POST['nic'];
    $phone = $_POST['phone'];
    $idnum = $_POST['idnum'];
    $batch = $_POST['batch'];
    $fac = $_POST['fac'];
    $course = $_POST['course'];
    

    // Database connection configuration
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "attendance";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    $sql = "UPDATE `student` SET `fname`='$fname', `email`='$email', `phone`='$phone', `nic`='$nic', `idnum`='$idnum', `batch`='$batch', `fac`='$fac', `course`='$course' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Updated successfully!";
        header("Location: student.php"); // Redirect the user to a different page after successful update
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request.";
}
?>

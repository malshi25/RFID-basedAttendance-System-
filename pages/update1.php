<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $lecid = $_POST['lecid'];
    $faculty = $_POST['faculty'];

    // Database connection configuration
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "attendance";

    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    $sql = "UPDATE `lecture` SET `name`='$name', `phone`='$phone', `email`='$email', `lecid`='$lecid', `faculty`='$faculty' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Updated successfully!";
        header("Location: lecture panel.php"); // Redirect the user to a different page after successful update
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request.";
}
?>

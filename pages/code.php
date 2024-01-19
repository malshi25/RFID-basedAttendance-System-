<?php
session_start();
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "attendance";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = mysqli_query($conn, "SELECT * FROM attends");

if (mysqli_num_rows($result) > 0) {
    echo '<table border="1">';
    echo '<tr><th>ID</th><th>Date</th><th>Time</th><th>Name</th><th>ID Number</th><th>Faculty</th><th>Intake</th><th>Degree</th></tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['date'] . '</td>';
        echo '<td>' . $row['time'] . '</td>';
        echo '<td>' . $row['fname'] . '</td>';
        echo '<td>' . $row['idnum'] . '</td>';
        echo '<td>' . $row['fac'] . '</td>';
        echo '<td>' . $row['intake'] . '</td>';
        echo '<td>' . $row['degree'] . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo 'No data found in the database.';
}

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST["import_file_btn"])) {

    $allowed_ext = ['xls', 'csv', 'xlsx'];

    $fileName = $_FILES['import_file']['name'];
    $checking = explode('.', $fileName);
    $file_ext = end($checking);

    if (in_array($file_ext, $allowed_ext)) {

        $targetPath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($targetPath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        foreach ($data as $row) {
            $id = $row['0'];
            $date = $row['1'];
            $time = $row['2'];
            $fname = $row['3'];
            $idnum = $row['4'];
            $fac = $row['5'];
            $intake = $row['6'];
            $degree = $row['7'];

            $checkAttendance = "SELECT id FROM attends WHERE id = '$id' ";
            $checkAttendance_result = mysqli_query($conn, $checkAttendance);

            if (mysqli_num_rows($checkAttendance_result) > 0) {
                $up_query = "UPDATE attends SET date = '$date', time = '$time', fname = '$fname', idnum = '$idnum', fac = '$fac', intake = '$intake', degree = '$degree' WHERE id = '$id'";
                $up_result = mysqli_query($conn, $up_query);
                $msg = 1;
            } else {
                $in_query = "INSERT INTO attends (date, time, fname, idnum, fac, intake, degree) VALUES ('$date', '$time', '$fname', '$idnum', '$fac', '$inatke', '$degree')";
                $in_result = mysqli_query($conn, $in_query);
                $msg = 1;
            }
        }

        if (isset($msg)) {
            $_SESSION['status'] = "File Imported Successfully.";
            header("Location: attendance.php");
        } else {
            $_SESSION['status'] = "File Importing Failed.";
            header("Location: attendance.php");
        }
    } else {
        $_SESSION['status'] = "Invalid File";
        header("Location: attendance.php");
        exit(0);
    }
}

?>

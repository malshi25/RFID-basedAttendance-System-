<?php
// Define 'web_root' constant
define('web_root', '/your/web/root/directory/'); // Replace with the actual path to your web root directory

// Database connection configuration
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "attendance";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$data = array();

$id = $_GET['id'];
$sql = "SELECT * FROM `student` WHERE id = $id";

$result = $conn->query($sql);
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
//print_r($row);

if ($result) {
  while ($row = mysqli_fetch_assoc($result)) {
      $data[] = $row;
  }
}else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

function redirect($url) {
  header("Location: " . $url);
  exit();
}



?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student Attendance System</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="<?php echo web_root; ?>css/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo web_root; ?>css/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo web_root; ?>css/css/animate.min.css" rel="stylesheet">
    <link href="<?php echo web_root; ?>css/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo web_root; ?>css/css/main.css" rel="stylesheet">
    <link href="<?php echo web_root; ?>css/css/responsive.css" rel="stylesheet">

    <link href="<?php echo web_root; ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">

<link href="<?php echo web_root; ?>css/dataTables.bootstrap.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<!-- // <script src="<?php echo web_root; ?>select2/select2.min.css"></script> ./ -->

<!-- datetime picker CSS -->
<link href="<?php echo web_root; ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<link href="<?php echo web_root; ?>css/datepicker.css" rel="stylesheet" media="screen">


<link rel="stylesheet" href="<?php echo web_root; ?>select2/select2.min.css">

<link href="<?php echo web_root; ?>css/nav-button-custom.css" rel="stylesheet" media="screen">
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h4 class="page-header ">
          <i class="fa fa"></i>Student Attendance System
           <small class="pull-right">Printed Date: <?php echo date('m/d/Y'); ?></small>
        </h4>
      </div>
      <!-- /.col -->
    </div>
            <div class="center wow fadeInDown"> 
                  <h2 class="page-header">Attendance Report</h2>  
                
            </div>

                <div class="features">


                
                 <!-- Add Student Form-->
<div class="container">


<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <?php foreach ($data as $index => $row) : ?>
    <input type="hidden" name="id<?php echo $index; ?>" value="<?php echo $row['id']; ?>">

    <label for="date<?php echo $index; ?>">Date:</label>
    <input type="text" name="date<?php echo $index; ?>" disabled value="<?php echo $row['date']; ?>">

    <label for="time<?php echo $index; ?>">Time:</label>
    <input type="text" name="time<?php echo $index; ?>" disabled value="<?php echo $row['time']; ?>">

    <label for="fname<?php echo $index; ?>">Full Name:</label>
    <input type="text" name="fname<?php echo $index; ?>" disabled value="<?php echo $row['fname']; ?>">

    <label for="idnum<?php echo $index; ?>">Student ID:</label>
    <input type="text" name="idnum<?php echo $index; ?>" disabled value="<?php echo $row['idnum']; ?>">

    <label for="intake<?php echo $index; ?>">Intake:</label>
    <input type="text" name="intake<?php echo $index; ?>" disabled value="<?php echo $row['intake']; ?>">

    <label for="fac<?php echo $index; ?>">Faculty:</label>
    <input type="text" name="fac<?php echo $index; ?>" disabled value="<?php echo $row['fac']; ?>">

    <label for="degree<?php echo $index; ?>">Degree:</label>
    <input type="text" name="degree<?php echo $index; ?>" disabled value="<?php echo $row['degree']; ?>">
  <?php endforeach; ?>
</form>


    


                  </tbody>
                  
                
                 
                  
                 </div><!--/.services--> 
          
 
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
<footer>
</footer>
</html>

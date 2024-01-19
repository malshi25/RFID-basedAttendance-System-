<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Dashbord Admin</title>

	<script type="text/javascript">
		$(document).ready(function (){
			setInterval(function(){
				$.post("get.php",{data:'get'},function(data){
					if(data>0){
						$("span").show();
						$("span").text(data);
					}
				});
			
			},1000); 
			$("span").click(function(){
				$.post("get.php",{update:'update'},
				function(data){

			});
			});
		});
	</script>
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
?>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class="bx bxs-graduation"></i>
			<span class="text">Horizon Campus</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="dashboard.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="lecture panel.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Lecture Panel</span>
				</a>
			</li>
			<li>
				<a href="student.php">
					<i class='bx bxs-user-detail' ></i>
					<span class="text">Student</span>
				</a>
			</li>
			<li>
				<a href="attendance.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Attendance</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			
				<a href="loginn.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Dashboard</h1>
					<br><br>
					<ul class="breadcrumb">
						<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>
					</ul>
				</div>
				
			</div>

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						
						<p>Students</p>
						<?php 
							$dash_student_query = "SELECT * FROM student";
							$dash_student_query_run = mysqli_query($conn, $dash_student_query);

							if($student_total = mysqli_num_rows($dash_student_query_run)) {
								echo '<h3 class="mb-0"> '.$student_total.'</h3>';
							} else {
								echo '<h2 class="mb-0"> No Data </h2>';
							}
						?>
					</span>
				</li>
				<li>
					<i class='bx bxs-group' ></i>
					<span class="text">
						
						<p>Lecture</p>
						<?php 
							$dash_lecture_query = "SELECT * FROM lecture";
							$dash_lecture_query_run = mysqli_query($conn, $dash_lecture_query);

							if($lecture_total = mysqli_num_rows($dash_lecture_query_run)) {
								echo '<h3 class="mb-0"> '.$lecture_total.'</h3>';
							} else {
								echo '<h2 class="mb-0"> No Data </h2>';
							}
						?>
					</span>
				</li>
				<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						
						<p>Attend Student</p>
						<?php 
							$dash_attend_query = "SELECT * FROM attends";
							$dash_attend_query_run = mysqli_query($conn, $dash_attend_query);

							if($attend_total = mysqli_num_rows($dash_attend_query_run)) {
								echo '<h3 class="mb-0"> '.$attend_total.'</h3>';
							} else {
								echo '<h2 class="mb-0"> No Data </h2>';
							}
						?>
					</span>
				</li>
			</ul>


			
				
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	
</body>
</html>
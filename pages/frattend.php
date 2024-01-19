<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">

	<title>Attendance</title>
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

// Fetch and display data
$select_query = "SELECT * FROM attends";
$result = $conn->query($select_query);



?>




	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form method="GET">
			<div class="form-input">
        <input type="text" name="search" placeholder="Search by Student Id...">
        <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
    </div>
			</form>
			
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Attendance</h1>
					<br><br>
					<form class="" action="" method="post" enctype="multipart/form-data">
			<input type="file" name="excel" required value="">
			<button type="submit" name="import">Import</button>
		</form>
					<ul class="breadcrumb">
						

						<li>
							<a class="active" href="index.php">Home</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>

						
					</ul>
				</div>
				
			</div>

			
		</main>

		<?php

$search_query = ""; // Initialize an empty search query string

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search_query = $_GET['search'];
    $select_query = "SELECT * FROM attends WHERE idnum LIKE '%$search_query%'";
} else {
    $select_query = "SELECT * FROM attends";
}

$result = $conn->query($select_query);


		if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
				<th>Date</th>
					<th>Time</th>
                    
                    <th>Name</th>
                    <th>Student ID</th>
                    <th>Faculty</th>
                    <th>Batch</th>
					<th>Degree</th>
					<th>Action</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
			$id = $row['id'];
            echo "<tr>
			<td>{$row['date']}</td>
					<td>{$row['time']}</td>
                    <td>{$row['fname']}</td>
                    <td>{$row['idnum']}</td>
                    <td>{$row['fac']}</td>
					<td>{$row['intake']}</td>
					<td>{$row['degree']}</td>
					
					<td class='action-icons'>
					
					<a href='print.php?id={$row['id']}'><i class='bx bx-download'></i></a>
					<a href='delete3.php?id={$row['id']}'><i class='bx bxs-trash'></i></a>
					</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";
    }
	
   
$conn->close(); // Close the database connection
    ?>
	
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
	
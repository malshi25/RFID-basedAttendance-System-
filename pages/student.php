<!DOCTYPE html>
<html lan="ën" dir="ltr">
<head>
	<meta charset="UTF-8">
	<title>Student Admin</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css'>
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

// Fetch and display data
$select_query = "SELECT * FROM student";
$result = $conn->query($select_query);



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
			<li class="active">
				<a href="lecture panel.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Lecture Panel</span>
				</a>
			</li>
			<li>
				<a href="#">
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
			
			<li>
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
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
			<form method="GET">
    <div class="form-input">
        <input type="text" name="search" placeholder="Search by Student ID...">
        <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
    </div>
</form>
			
			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Student</h1>
					<br><br>
					<ul class="breadcrumb">
						<li>
							<a class="active" href="dashboard.php">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a  href="#">Home</a>
						</li>
					</ul>
				</div>
				<a href="registration.php" class="btn-download">
					<i class='bx bxs-add-to-queue' ></i>
					<span class="text">Add Student</span>
				</a>
			</div>
		</main>

		




	<?php

$select_query = "SELECT * FROM student";
$result = $conn->query($select_query);

if (!$result) {
    echo "Error executing query: " . $conn->error;
}

$search_query = ""; // Initialize an empty search query string

if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search_query = $_GET['search'];
    $select_query = "SELECT * FROM student WHERE idnum LIKE '%$search_query%'";
} else {
    $select_query = "SELECT * FROM student";
}

$result = $conn->query($select_query);

if (!$result) {
    echo "Error executing query: " . $conn->error;
}


    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Name</th>
                    <th>Student ID</th>
                    <th>Faculty</th>
                    <th>Batch</th>
                    <th>Dgree</th>
					<th>Action</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
			$id = $row['id'];
            echo "<tr>
                    <td>{$row['fname']}</td>
                    <td>{$row['idnum']}</td>
                    <td>{$row['fac']}</td>
                    <td>{$row['batch']}</td>
					<td>{$row['course']}</td>
					<td class='action-icons'>
					<a href='edit.php?id={$row['id']}'><i class='bx bxs-edit'></i></a>
					<a href='view.php?id={$row['id']}'><i class='bx bxs-show'></i></a>
					<a href='delete.php?id={$row['id']}'><i class='bx bxs-trash'></i></a>
					</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";
    }
   
$conn->close(); // Close the database connection
    ?>
	
</body>
</html>
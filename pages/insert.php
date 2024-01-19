<!DOCTYPE html>
<html>
<head>
    <title>Student Information</title>
</head>
<body>
    <?php
    // Database connection
    $mysqli = new mysqli("localhost", "username", "password", "database_name");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = $_POST['fname'];
        $email = $_POST['email'];
        $student_number = $_POST['student_number'];
        $phone_number = $_POST['phone_number'];
        $batch = $_POST['batch'];

        // Insert data into the database
        $insert_query = "INSERT INTO student_info (fname, email, student_number, phone_number, batch) VALUES ('$fname', '$email', '$student_number', '$phone_number', '$batch')";
        if ($mysqli->query($insert_query) === TRUE) {
            echo "Record inserted successfully.";
        } else {
            echo "Error: " . $mysqli->error;
        }
    }

    // Fetch and display data
    $select_query = "SELECT * FROM student_info";
    $result = $mysqli->query($select_query);
    ?>

    <h2>Insert Student Information</h2>
    <form method="post">
        <label>Full Name: </label>
        <input type="text" name="fname" required><br>

        <label>Email: </label>
        <input type="email" name="email" required><br>

        <label>Student Number: </label>
        <input type="text" name="student_number" required><br>

        <label>Phone Number: </label>
        <input type="tel" name="phone_number" required><br>

        <label>Batch: </label>
        <input type="text" name="batch" required><br>

        <input type="submit" value="Insert">
    </form>

    <h2>Student Information Table</h2>
    <?php
    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Student Number</th>
                    <th>Phone Number</th>
                    <th>Batch</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['fname']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['student_number']}</td>
                    <td>{$row['phone_number']}</td>
                    <td>{$row['batch']}</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";
    }

    // Close the database connection
    $mysqli->close();
    ?>
</body>
</html>


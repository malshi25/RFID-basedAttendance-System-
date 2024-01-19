<!DOCTYPE html>
<html lan="ën" dir="ltr">
<head>
<head>
    <meta charset="UTF-8">
    <title>Lecture Side</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- ...other meta tags and scripts... -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://kit.fontawesome.com/73fe9f0d99.js" crossorigin="anonymous"></script>
    <meta name="'viewport" content="'width=device-width, initial-scale=1.0">
    
</head>
<body>



<!--Add Lectures Form-->
<div class="container">
<h1>View Attend Details</h1>

<form method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<form id="signup-form" onsubmit="submitForm(event)">
    <label for="fname">Full Name:</label>
    <input type="text" fname="fname">
    <span class="error"></span>
    

	<label for="idum">Student ID:</label>
    <input type="idum" name="idnum">
    <span class="error"></span>
    

    <label for="attend">Attendance:</label>
    <input type="text" name="attend">
    <span class="error"></span>

	<label for="intake">Intake:</label>
    <input type="text" name="intake">
    <span class="error"></span>    

 	<label for="fac">Faculty:</label>
    <input type="fac" name="fac">
    <span class="error"></span>

	<label for="degree">Degree:</label>
    <input type="text" name="degree">
    <span class="error"></span>

	<label for="sub">Subject:</label>
    <input type="text" name="sub">
    <span class="error"></span>

	<label for="currentdate">Date:</label>
    <input type="text" name="currentdate">
    <span class="error"></span>

	<label for="currenttime">Time:</label>
    <input type="text" name="currenttime">
    <span class="error"></span>

</form>

       


  
</body>
</html>


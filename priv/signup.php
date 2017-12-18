<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "signup";


$finame = $_POST['fname'];
$laname = $_POST['lname'];
$se = $_POST['sex'];
$ag = $_POST['age'];
$eml = $_POST['email'];
$pw = $_POST['pwd'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO signup (FirstName, LastName, Sex, Age, Email, Password)
VALUES ('$finame', '$laname', '$se', '$ag', '$eml', '$pw')";

if (mysqli_query($conn, $sql)) {
	header("Location:registration_success.html");
    echo "New record created successfully";
	echo "<a href='index.html'>Click Here to go at Home Pagek</a>";
} else {
	echo "Username has already been used. Please enter another Username";
	echo "<br><a href='signup.html'>Click Here to go back</a>";
}

mysqli_close($conn);
?> 
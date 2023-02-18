<?php
// Connect to the database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "mydatabase";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
	// Get the username and password from the form
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Query the database to find the user with the matching username and password
	$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
	$result = $conn->query($sql);

	// If there is a match, redirect to the dashboard page
	if ($result->num_rows > 0) {
		header("Location: home.html");
		exit();
	} else {
		// If there is no match, display an error message
		echo "<script>alert('Invalid username or password');</script>";
	}
}

// Close the database connection
$conn->close();
?>

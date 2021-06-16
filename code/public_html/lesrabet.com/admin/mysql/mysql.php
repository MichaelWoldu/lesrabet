<?php
$servername= "localhost";
$username = "root";
$password = "0911206639";

// create connection 

$conn = mysqli_connect($servername, $username, $password);

// Check Connection 
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
echo "Connection Succesful";
?>
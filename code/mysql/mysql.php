<?php

$servername= "localhost";

$username = "root";

$password = "";



// create connection 



$conn = mysqli_connect($servername, $username, $password);



// Check Connection 

if (!$conn) {

	die("Connection failed: " . mysqli_connect_error());

}

echo "Connection Succesful";

?>

<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
session_start();
$host = 'localhost';
$user = 'dissertationLogin';
$pass = '091164383707572306304pass';
$db = 'gethireddb';

$link = mysqli_connect($host,$user,$pass, $db);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
//$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$password = mysqli_real_escape_string($link, $_REQUEST['password']);
$hash = mysqli_real_escape_string($link, $_REQUEST['hash']);
$company_name = $_SESSION['company_name'];
$email = $_SESSION['email'];
 
// Attempt insert query execution
$sql = "INSERT INTO jobs (title, company, com_description, app_deadline, job_type) VALUES ('$company_name', '$last_name', '$email', '$password', '$hash')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
?>

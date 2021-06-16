<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */

session_start();
require '../db.php';

$link = mysqli_connect($host,$user,$pass, $db);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$id = mysqli_real_escape_string($link, $_REQUEST['applicantID']);
$message = mysqli_real_escape_string($link, $_REQUEST['message']);
$jobTitle = mysqli_real_escape_string($link, $_REQUEST['jobTitle']);
$today = date("Y-m-d");
$comp_id = $_SESSION['company_id'];


// Attempt insert query execution
$sql = "INSERT INTO messages (companyId, studentId, jobTitle, message, sentBy, timeSent) " . " VALUES ('$comp_id', '$id', '$jobTitle','$message','1','$today')";

if(mysqli_query($link, $sql)){
    header("location: company/success.php"); 
} else{
    header("location: company/error.php"); 
}
   ?>
<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */

session_start();
$host = 'localhost';
$user = 'dissertation';
$pass = '091164383707572306304pass';
$db = 'gethireddb';

$link = mysqli_connect($host,$user,$pass, $db);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Escape user inputs for security
$title = mysqli_real_escape_string($link, $_REQUEST['jobTitle']);
$job_description = mysqli_real_escape_string($link, $_REQUEST['job_description']);
//$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$app_deadline = mysqli_real_escape_string($link, $_REQUEST['app_deadline']);
$jobType = mysqli_real_escape_string($link, $_REQUEST['jobType']);
$degree = mysqli_real_escape_string($link, $_REQUEST['degree']);
$grade = mysqli_real_escape_string($link, $_REQUEST['grade']);
$city = mysqli_real_escape_string($link, $_REQUEST['city']);
$requirments = mysqli_real_escape_string($link, $_REQUEST['requirments']);
$today = date("Y-m-d");

$company_name = $_SESSION['company_name'];
$email = $_SESSION['email'];
$company_description = $_SESSION['company_description'];
$logo = $_SESSION['logo'];
$comp_id = $_SESSION['company_id'];
// Attempt insert query execution
$sql = "INSERT INTO jobs (title, job_description, grades, company_id, company, degree, com_description, app_deadline, logo, job_type, city, requirements, date_posted) " . " VALUES ('$title', '$job_description', '$grade', '$comp_id', '$degree', '$company_name', '$company_description', '$app_deadline', '$logo', '$jobType', '$city', '$requirments', '$today')";

if(mysqli_query($link, $sql)){
    header("location: company/success.php"); 
} else{
    header("location: company/error.php"); 
}
   ?>
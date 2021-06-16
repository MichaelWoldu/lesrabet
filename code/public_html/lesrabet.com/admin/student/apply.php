<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */
//session_start();
require 'db.php';
$link = mysqli_connect($host,$user,$pass, $db);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$fullName = mysqli_real_escape_string($link, $_REQUEST['fullName']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$degree = mysqli_real_escape_string($link, $_REQUEST['degree']);
$grade = mysqli_real_escape_string($link, $_REQUEST['grade']);
$university = mysqli_real_escape_string($link, $_REQUEST['university']);
$city = mysqli_real_escape_string($link, $_REQUEST['city']);
$skill = mysqli_real_escape_string($link, $_REQUEST['skill']);
//$cv = mysqli_real_escape_string($link, $_REQUEST['cv']);
$coverLetter = mysqli_real_escape_string($link, $_REQUEST['coverLetter']);
$today = date("Y-m-d");
$application_detail = $_GET['id'];  
$company_detail = $_GET['companyid'];
 
// Attempt insert query execution\
$sql = "INSERT INTO application (jobs_id, company_id, registered_id, full_name, email, course, cover_letter, grade, university, city, skills, date_applied) VALUES ('$application_detail', '$company_detail ', '$applicant_id', '$fullName', '$email', '$degree', '$coverLetter','$grade', '$university', '$city', '$skill', '$today')";
if(mysqli_query($link, $sql)){
header("location: applied.php");
} else{
    echo "ERROR: We were not able to add your vacanicy. <br> Error ID : $sql. " . mysqli_error($link);
}
   ?>
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
$applicant_id = mysqli_real_escape_string($link, $_REQUEST['applicant']);
$city = mysqli_real_escape_string($link, $_REQUEST['city']);
$skill = mysqli_real_escape_string($link, $_REQUEST['skill']);
//$cv = mysqli_real_escape_string($link, $_REQUEST['cv']);
$coverLetter = mysqli_real_escape_string($link, $_REQUEST['coverLetter']);
$application_id = mysqli_real_escape_string($link, $_REQUEST['application']);
$company_id = mysqli_real_escape_string($link, $_REQUEST['company']);

 
// Attempt insert query execution
$sql = "INSERT INTO application (jobs_id, company_id, registered_id, full_name, email, course, cover_letter, grade, university, city, skills) VALUES ('$application_id', '$company_id', '$applicant_id', '$fullName', '$email', '$degree', '$coverLetter','$grade', '$university', '$city', '$skill')";
if(mysqli_query($link, $sql)){
    echo "You have succesfully applied for the Job";
    header("location: search.php");
} else{
    echo "ERROR: We were not able to add your vacanicy. <br> Error ID : $sql. " . mysqli_error($link);
}
   ?>
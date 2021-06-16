<?php

/* Registration process, inserts user info into the database 

   and sends account confirmation email message

 */



//session_start();

require '../db.php';



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

$company_name = $_SESSION['company_name'];

$email = $_SESSION['email'];

$company_description = $_SESSION['company_description'];

$logo = $_SESSION['logo'];

 

// Attempt insert query execution

$sql = "INSERT INTO jobs (title, job_description, company, com_description, app_deadline, logo, job_type) VALUES ('$title', '$job_description', '$company_name', '$company_description', '$app_deadline', '$logo', '$jobType')";

if(mysqli_query($link, $sql)){

    echo "Records added successfully.";

} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}

   ?>
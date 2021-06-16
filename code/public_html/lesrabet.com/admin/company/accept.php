<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */
session_start();
$host = 'localhost';
$user = 'dissertation';
$pass = '091164383707572306304pass';
$db = 'gethireddb';
// Check connection
$link = mysqli_connect($host, $user, $pass, $db);
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$applicant_detail =  $_GET["id"];

            $sql = "UPDATE application SET id_responses = '1' WHERE id = '$applicant_detail'";



if(mysqli_query($link, $sql)){
    echo "You have succesfully applied for the Job";
    header("location: /dissertation/vacancies.php");
} 
        else{
    echo "ERROR: We were not able to edit your profile. <br> Error ID : $sql. " . mysqli_error($link) . "Michael" . $first_name; 
}

?>


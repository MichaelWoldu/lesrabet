<?php
require 'db.php';
$link = mysqli_connect($host,$user,$pass, $db);
 
$link = mysqli_connect($host, $user, $pass, $db);
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
$email = mysqli_real_escape_string($link, $_REQUEST['email']);
$messageSent = mysqli_real_escape_string($link, $_REQUEST['message']);

$coverLetter = mysqli_real_escape_string($link, $_REQUEST['coverLetter']);
$today = date("Y-m-d");
$application_detail = $_GET['appID'];  
$compID = $_GET['compID'];


// Attempt insert query execution\
$sql = "INSERT INTO connect (id_applicant, id_company, message, date_posted) VALUES ('$application_detail', '$compID', '$messageSent', '$today')";

if(mysqli_query($link, $sql)){
       // $_SESSION['message'] =
                
                "A company wants to connect with you. Please login to view your message. www.asselafi.com/dissertation";

        // Send registration confirmation link (verify.php)
        $to      = $email;
        $subject = 'Company Contact ( lesrabet.com )';
        $message_body = '
        Hello '.$first_name.',' 
			.$message; 
        
        $headers - "From: Les <NOREPLY@lesrabet.com>\r\n";
        $headers .= "Content-type: text/html\r\n";
        
       mail( $to, $subject, $message_body );
	
	
	//$address = "example@example.net";
$address = "Michael.woldu12@gmail.com";


// Configuration option.
// i.e. The standard subject will appear as, "You've been contacted by John Doe."

// Example, $e_subject = '$name . ' has contacted you via Your Website.';

$e_subject = 'A company has contacted you';


// Configuration option.
// You can change this if you feel that you need to.
// Developers, you may wish to add more fields to the form, in which case you must be sure to add them here.

$e_body = "A company wants to connect with you. Please login to view your message. www.asselafi.com/dissertation" . PHP_EOL . PHP_EOL;


$msg = wordwrap( $e_body . $e_content . $e_reply, 70 );

$headers = "From: NOREPLY@LESRABET.com" . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

	if(mail($address, $e_subject, $msg, $headers)) {
header("location: congradulations.php");
	}
} else{
    echo "ERROR: We were not able to add your vacanicy. <br> Error ID : $sql. " . mysqli_error($link);
}
   ?>
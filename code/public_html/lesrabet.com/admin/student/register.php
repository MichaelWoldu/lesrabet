<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */
$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstName'];
$_SESSION['last_name'] = $_POST['lastName'];

// Escape all $_POST variables to protect against SQL injections
$first_name = $mysqli->escape_string($_POST['firstName']);
$last_name = $mysqli->escape_string($_POST['lastName']);
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );
$today = date("Y-m-d");
      
// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM students WHERE email='$email'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: student/error.php");
    
}
else { // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO students (first_name, last_name, email, password, hash, date_registered) " 
            . "VALUES ('$first_name','$last_name','$email', '$password', '$hash', '$today')";
       // mkdir ("uploads/$applicant_id/", 0755);
    // Add user to the database
    if ( $mysqli->query($sql) ){

        $_SESSION['active'] = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSION['message'] =
                
                 "Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the message!";

       // Send registration confirmation link (verify.php)
        $to      = $email;
        $subject = 'Account Verification ( lesrabet.com )';
        $message_body = '
        Hello '.$first_name.',

        Thank you for signing up!

        Please click this link to activate your account:

        http://asselafi.com/dissertation/student/verify.php?email='.$email.'&hash='.$hash; 
        
        $headers - "From: Lesrabet <NOREPLY@lesrabet.com>\r\n";
        $headers .= "Content-type: text/html\r\n";
        
        
        mail( $to, $subject, $message_body );

        header("location: student/congradulations.php"); 
 
    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: student/error.php");
    }

}
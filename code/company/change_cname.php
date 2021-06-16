<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */

// get session variables to be used on this page
        $_SESSION['newName'] = $_POST['newName'];
        $company_name = $_SESSION['company_name'];
        $email = $_SESSION['email'];
        $active = $_SESSION['active'];

// Escape all $_POST variables to protect against SQL injections
        $newName = $_POST['newName'];
        
// Check if user with that email already exists
//$result = $mysqli->query("SELECT * FROM companys WHERE email='$email'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0

 // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
    $sql = "UPDATE companys SET company_name = 'GETHIREDDD' WHERE email =$email";

        header("location: cdashboard.php"); 
?>


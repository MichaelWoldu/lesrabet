<?php

/* User login process, checks if user exists and password is correct */



// Escape email to protect against SQL injections

$email = $mysqli->escape_string($_POST['email']);

$result = $mysqli->query("SELECT * FROM companys WHERE email='$email'");



if ( $result->num_rows == 0 ){ // User doesn't exist

    $_SESSION['message'] = "User with that email doesn't exist!";

    header("location: error.php");

}

else { // User exists

    $user = $result->fetch_assoc();



    if ( password_verify($_POST['password'], $user['password']) ) {

        

        $_SESSION['email'] = $user['email'];

        $_SESSION['company_name'] = $user['company_name'];

        $_SESSION['contact_name'] = $user['contact_name'];

        $_SESSION['contact_no'] = $user['contact_no'];

        $_SESSION['company_description'] = $user['company_description'];

        $_SESSION['logo'] = $user['logo'];

        $_SESSION['active'] = $user['active'];

        $_SESSION['hash'] = $user['hash'];

        $_SESSION['company_id'] = $user['company_id'];

        

        // This is how we'll know the user is logged in

        $_SESSION['loggeds_in'] = true;



        header("location: ../cdashboard.php");

    }

    else {

        $_SESSION['message'] = "You have entered wrong password, try again!";

        header("location: error.php");

    }

}




<?php
/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM students WHERE email='$email'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: student/error.php");
}
else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $user['password']) ) {
        
        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['university'] = $user['university'];
        $_SESSION['grade'] = $user['grade'];
        $_SESSION['course'] = $user['course'];
        $_SESSION['skills'] = $user['skills'];
        $_SESSION['cv'] = $user['cv'];
        $_SESSION['city'] = $user['city'];
        $_SESSION['active'] = $user['active'];
        $_SESSION['id'] = $user['id'];
		$_SESSION['career'] = $user['career'];
        $_SESSION['linkedIn'] = $user['linkedIn'];
        
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;

        header("location: sdashboard.php");
    }
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: student/error.php");
    }
}
?>

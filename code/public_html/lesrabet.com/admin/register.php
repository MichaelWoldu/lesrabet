<?php
/* Displays all error messages */
session_start();
session_unset();
session_destroy(); 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Error</title>
   <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form">
    <h1>Verify Account</h1>
    <p>Please check your email for the verification email</p>     
    <a href="/dissertation/index.php"><button class="button button-block">Home</button></a>
</div>
</body>
</html>

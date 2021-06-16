<?php
/* Displays all successful messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Success</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form">
    <h1><?= 'Success'; ?></h1>
    <p>
    <?php 
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
        echo $_SESSION['message'];    
    else:
        header( "location: cdashboard.php" );
    endif;
    ?>
    </p>
    <a href="/dissertation/cdashboard.php"><button class="button button-block">Back To your Dashboard</button></a>
</div>
</body>
</html>

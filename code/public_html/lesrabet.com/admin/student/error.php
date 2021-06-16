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
    <h1>Error</h1>
    <p>
    <?php 
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ): 
        echo $_SESSION['message'];    
    else:
        header( "location: /dissertation/index.php" );
    endif;
    ?>
    </p>     
   <a href="/dissertation/index.php"><button class="button button-block">Back To Index, you've been Logged Off for suspicious behaviour </button></a>
</div>
</body>
</html>

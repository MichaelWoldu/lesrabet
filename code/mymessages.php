<?php
/* Displays user information and some useful messages */
require 'db.php';
require ('php/paginator.php');
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['loggeds_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing the student dashboard page!";
  header("location: student/error.php");    
}
else {
    		 $_SESSION['message'] = '<li><a href="cdashboard.php"><button class="header_btn">  Your Dasboard</button></a></li> <li><a href="company/logout.php"><button class="header_btn"><span class="glyphicon glyphicon-log-in"></span>  Log Out</button></a></li>';
    // Makes it easier to read
    $company_name = $_SESSION['company_name'];
    $contact_name = $_SESSION['contact_name'];
    $email = $_SESSION['email'];
    $contact_no = $_SESSION['contact_no'];
    $company_description = $_SESSION['company_description'];
    $logo = $_SESSION['logo'];
    $active = $_SESSION['active'];
    $company_id =  $_SESSION['company_id'];
	$hash = $_SESSION['hash'];

    
    
    $conn = mysqli_connect($host, $user, $pass, $db);
   $query = "SELECT DISTINCT messages.studentId, students.first_name, students.last_name, students.sector FROM ( messages INNER JOIN students ON messages.studentId = students.id) WHERE companyId = '$company_id'";
    
//these variables are passed via URL
    $limit = ( isset( $_GET['limit'])) ? $_GET['limit'] : 10; // items per page
    $page = (isset ($_GET['page'])) ? $_GET['page'] : 1; //starting page
    $links = 5;

    $paginator = new Paginator ( $mysqli, $query); //__constructor is called
    $results = $paginator->getData( $limit, $page);
}

//$image = $mysqli->query("SELECT logo FROM company WHERE email ='$email'")  or die($mysqli->error());;
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Welcome <?= $first_name  ?></title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/owl.carousel.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/templet.css">
<!--<link rel="stylesheet" type="text/css" href="css/style.css">-->
<link rel="shortcut icon" href="img/logo/icon.ico" type="image/x-icon">	
<link rel="stylesheet" type="text/css" href="/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/home.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="css/all.css">
	
</head>

 <body>
  
<?php include 'classes/nav.php';?> 
    <section class="home" style="height: 30%; background: url(img/bg/bg_slide.jpg) no-repeat center center; background-size: cover; background-color: #51A0E7">

        <?php include 'classes/vacancySearchForm.php';?>

    </section>
    
<div style="height: auto;">
    <div class="container">
        <h1 align=center>Message History:</h1>
    </div>
    </div>  

<div class="container">
 <?php
    for ($p = 0; $p < count($results->data); $p++): ?>
<?php
    $app = $results->data[$p];
?>
    
<div class='app-container'>
        <div class="row">
          <div class="col-md-9">
            <div class='header'>
            <h3><?= $app['first_name']?></h3>
           </div>
            <div class='content description'><span><strong> Sector:</strong> <strong><font color="lightblue"><?= $app['sector']?></font></strong></span></div> 
           </div>
           <div class="col-md-3">
               <br>
               <div class='content description'><span><a href="messages.php?applicantId=<?= $app['studentId']?>&name=<?= $app["first_name"] . " " . $app["last_name"]?>"><strong> View all messages from <?= $app['first_name']?></strong> </a></span></div> 
           </div>
  </div>
    <hr>
    </div>
<?php endfor; ?>
    <div align=center> 
    
        <?php
        if($p > $limit){
    echo $paginator->createLinks($links, 'pagination pagination-sm');
        }
        ?>
    </div>
</div>
 
    
<section>
    <?php include 'classes/footer.php';?>
    </section>
											<!-- End Login modal -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</body>
</html>

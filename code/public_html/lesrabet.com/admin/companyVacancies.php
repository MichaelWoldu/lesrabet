<?php 
/* Main page with two forms: sign up and log in */
require 'db.php';
require ('php/paginator.php');
session_start();
    $conn = mysqli_connect($host, $user, $pass, $db);
    $_SESSION['companyId'] = $_GET["companyid"];
    $companyId = $_SESSION['companyId'];
    $query = "SELECT * FROM jobs WHERE company_id = '$companyId'";

//these variables are passed via URL
    $limit = ( isset( $_GET['limit'])) ? $_GET['limit'] : 9; // items per page
    $page = (isset ($_GET['page'])) ? $_GET['page'] : 1; //starting page
    $links = 5;

    $paginator = new Paginator ( $mysqli, $query); //__constructor is called
    $results = $paginator->getData( $limit, $page);
?>

<!DOCTYPE html>
<html>
	
									<!--        Styler          -->
	
<link rel="stylesheet" href="css/owl.carousel.css" media="screen">
<link rel="stylesheet" type="text/css" href="css/templet.css">
<!--<link rel="stylesheet" type="text/css" href="css/style.css">-->
<link rel="shortcut icon" href="img/logo/icon.ico" type="image/x-icon">	
<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/home.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
				<!--       reCAPTCHA       -->
<script src='https://www.google.com/recaptcha/api.js'></script>

	<body>
<?php include 'classes/nav.php';?>

	<section class="home" style="height: 35vh; background: url(img/bg/bg_slide.jpg) no-repeat center center; background-size: cover; background-color: #51A0E7; opacity: 0.8;">
	
<?php include 'classes/vacancySearchForm.php';?>
        
</section>
	
	    <div style="height: auto;">
    <div class="container">
        <h1 align=center>Vacancy Postings</h1>
    </div>
    </div> 
    

	<section class="result_section" style="height: auto;">
		<div class="container">
 <?php
    $y=0;
    if ($y == ($results->data)){
        echo'
            <div class="app-container">
                <div class="row">
                    <h1>No results found</h1>
                </div>
              <hr>
            </div>';
    } 
                else {
    for ($p = 0; $p < count($results->data); $p++): ?>
<?php
    $job = $results->data[$p];
    if ($results->num_rows = 0) {
        echo "fuck you, type properly";
    }
?>
    
<div class='app-container'>
    <div class="row">
    <div class="col-md-9">
            <div class='header'>
            <h2><?= $job['title'] ?></h2>
            <span class='year'><strong>Company: </strong><?= $job['company'] ?></span><br>
            <span class='year'><strong>Job Description: </strong><?= $job['job_description'] ?></span><br>
            <span class='year'><strong>City: </strong><?= $job['city'] ?></span><br>
    </div>
    <div class='content description'><strong>Application Deadline :</strong>  <?= $job['app_deadline']?></div>
        <a href='applyform.php?role=<?= $job["title"] ?>&id=<?= $job["id_jobs"]?>&companyid=<?= $job["company_id"]?>'><font size="5.5em" align=center><strong>More Detail!</strong></font></a>
        </div>
    <div class="col-md-3">
        <img width='<?php 67*1.8 ?>' height='<?= 98*1.8 ?>' src='<?= $job['logo'] ?>'>
    
    </div>
        </div>
    <hr>
  </div>
             
                
<?php endfor; ?>
    <div align=center> 
    
        <?php

    echo $paginator->createLinks($links, 'pagination pagination-sm');
       }
        ?>
    </div>
		</div>
    </section>

        <section>
            <?php include 'classes/footer.php';?>
            											<!-- Login modal -->
            											<!--   Modals 	 -->
											<!-- Login modal -->
            <?php include 'modals/loginModal.php';?>
									
											<!-- Register modal -->
            <?php include 'modals/registerModal.php';?>

        </section>
        
	
</body>
</html>

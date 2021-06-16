<?php

/* Displays user information and some useful messages */

require 'db.php';

require ('php/paginator.php');

session_start();



// Check if user is logged in using the session variable

/*if ( $_SESSION['logged_in'] = 1 ) {

  $_SESSION['message'] = "You must log in before viewing this section. This is for registered students only!";

  header("location: error.php");    



} 

else {*/

	 $_SESSION['message'] = '<li><a href="sdashboard.php"><button class="header_btn">  Your Dasboard</button></a></li> <li><a href="student/logout.php"><button class="header_btn"><span class="glyphicon glyphicon-log-in"></span>  Log Out</button></a></li>';




	$today = date("Y-m-d");

        $conn = mysqli_connect($host, $user, $pass, $db);

  //  $query = "SELECT * FROM application WHERE  = '$company_name'  ORDER BY `app_deadline` ASC";

    $query = "SELECT jobs.title, jobs.company, jobs.app_deadline, jobs.job_type, responses.name FROM(( jobs INNER JOIN application ON application.jobs_id=jobs.id_jobs) INNER JOIN responses ON responses.id_responses = application.id_responses)  WHERE application.registered_id = '$applicant_id' AND jobs.app_deadline > $today";



//these variables are passed via URL

    $limit = ( isset( $_GET['limit'])) ? $_GET['limit'] : 3; // items per page

    $page = (isset ($_GET['page'])) ? $_GET['page'] : 1; //starting page

    $links = 5;



    $paginator = new Paginator ( $mysqli, $query); //__constructor is called

    $results = $paginator->getData( $limit, $page);

//}//

?>

<!DOCTYPE html>

<html >

<head>

  <meta charset="UTF-8">

  <title>Welcome Admin</title>

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

	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="index.js"></script>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    

    <link rel="stylesheet" type="text/css" href="css/all.css">

	<style>

        .info

    </style>

           

</head>



<body>

<?php include 'classes/nav.php';?>



    

    <section class="home" style="height: 35%; background: url(img/bg/bg_slide.jpg) no-repeat center center; background-size: cover; background-color: #51A0E7">



        <?php include 'classes/vacancySearchForm.php';?>



    </section>

    



    <div class="container">

        <h1 align=center>Adminstration Tools</h1>

    </div>

	<div class="board">

     <div class="dashtab">

  		<button class="tablinks" onclick="viewDash(event, 'Welcome')" id="defaultOpen">Welcome</button>

  		<button class="tablinks" onclick="viewDash(event, 'viewaccount')">View Acccounts</button>

  		<button class="tablinks" onclick="viewDash(event, 'addaccount')">Add Accounts</button>

  		<button class="tablinks" onclick="viewDash(event, 'report')">Reports</button>

  		<button class="tablinks" onclick="viewDash(event, 'Contact')">Need Help?</button>

	 </div>



<div id="Welcome" class="dashcontent">

  <div class="dashinfo">

    <h3>Hello,</h3>

  <p>We want you to enjoy your experience with us and these pages are designed to help you find lots of important information to help you quickly settle in to your new life at Leicester. We hope you find your time here successful and enjoyable – good luck as you begin your time at Leicester!</p>

	  <p> Once you are registered, we can prepare your University ID card so that it’s ready for you to pick up at the start of term. Once you have your card, you can access everything you need on campus, from meals to lectures.</p>

	  <p align=right> Kind Reagrds,</p>

    <p align=right> The lesrabet team</p>

</div>

	<hr>

	   <div class="row" align=center>

		<div class="col-xs-6">

			<p><a href="marketingAdmin.php"><button class="btn"> Marketing Tools</button></a></p>

		</div>

		<div class="col-xs-6">

			 <p><a href="HRadmin.php"><button class="btn">HR Tools</button></a></p>

		</div>

	</div>

</div>

<div id="viewaccount" class="dashcontent">

  <h4>Here you can find specific users to delete or to find out more infromation about them.</h4>

	<hr>

	<form method="post" action="findadmin">

	<p>

		<label>Full Name</label>

			<input id="name" name="name" class="btn btn-default">

	</p>

		<hr>

		<div align=right>

				<button type="submit" class="btn btn-success">Search</button>

		</div>	

	</form>

	

</div>



<div id="addaccount" class="dashcontent">

	  <h3>Add New User,</h3>

	<hr>

	<form method="post" action="newAdmin">

	<p>

		<label>Full Name</label>

			<input type="text" id="name" name="name" class="btn btn-default">

	</p>

	<p>

		<label>Account Type</label>

			<select type="text" id="account" name="account" class="btn btn-default" value="Account Type">

				<option value="3">HR Account</option>

				<option value="2">Marketing Account</option>

				<option value="1">Admin Account</option>

				

				

			</select>

	</p>	

	<p>

		<label>User Name</label>

			<input type="text" class="btn btn-default" id="username" name="username">

	</p>

	<p>

		<label>Password</label>

			<input type="password" class="btn btn-default" id="password" name="password">

	</p>

		<hr>

		<div align=right>

				<button type="submit" class="btn btn-success">Submit</button>

		</div>	

	</form>

 </div>

<div id="report" class="dashcontent">

  <h3>What report are you looking for?</h3><hr>

     <div class="row" align=center>

         <div class="col-xs-6">

			 <p><a><button type="button" data-toggle="modal" data-target="#user" class="btn"> Number of new Users</button></a></p>

		</div>

		<div class="col-xs-6">

			<p><a><button type="button" data-toggle="modal" data-target="#company" class="btn">Number of New Company</button></a></p>

		</div> 

      </div> 

	<br>

	<div class="row" align=center>

         <div class="col-xs-6">

			 <p><a><button type="button" data-toggle="modal" data-target="#custuners" class="btn"> Total Paying Custumers</button></a></p>

		</div>

		<div class="col-xs-6">

			<p><a><button type="button" data-toggle="modal" data-target="#application"class="btn">Applications Made</button></a></p>

		</div> 

      </div>

	<br>

	<div class="row" align=center>

         <div class="col-xs-6">

			 <p><a><button type="button" data-toggle="modal" data-target="#companyHistory" class="btn"> Company History</button></a></p>

		</div>

		<div class="col-xs-6">

			<p><a><button type="button" data-toggle="modal" data-target="#userHistory"class="btn">User History</button></a></p>

		</div> 

      </div>

    <hr>

</div> 

<div id="Contact" class="dashcontent">

  <h3>What can we help with?</h3><hr>

     <div class="row">

          <div class="col-sm-6">

        Password

            </div>

          <div class="col-sm-6">

             <p>if you would like to change your password please follow <a href="student/reset.php">this link.</a></p>

                </div>

      </div>

    <hr>

</div>

	<script>

function viewDash(evt, section) {

  var i, dashtabcontent, tablinks;

  tabcontent = document.getElementsByClassName("dashcontent");

  for (i = 0; i < tabcontent.length; i++) {

    tabcontent[i].style.display = "none";

  }

  tablinks = document.getElementsByClassName("tablinks");

  for (i = 0; i < tablinks.length; i++) {

    tablinks[i].className = tablinks[i].className.replace(" active", "");

  }

  document.getElementById(section).style.display = "block";

  evt.currentTarget.className += " active";

}



// Get the element with id="defaultOpen" and click on it

document.getElementById("defaultOpen").click();

</script> 

	</div>

<section>

     <?php include 'classes/footer.php';?>

     <?php include 'modals/userModal.php';?>

     <?php include 'modals/companyModal.php';?>

     <?php include 'modals/applicationModal.php';?>

     <?php include 'modals/userHistory.php';?>

     <?php include 'modals/companyHistory.php';?>

</section>

</body>

</html>


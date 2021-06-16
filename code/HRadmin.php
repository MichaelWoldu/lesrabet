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

    // Makes it easier to read

    /*$first_name = $_SESSION['first_name'];

    $last_name = $_SESSION['last_name'];

    $email = $_SESSION['email'];

    $active = $_SESSION['active'];

    $city = $_SESSION['city'];

    $skills = $_SESSION['skills'];

    $university = $_SESSION['university'];

    $degree = $_SESSION['course'];

    $grade = $_SESSION['grade'];

    $cv = $_SESSION['cv'];

    $applicant_id = $_SESSION['id'];

    //$avatar_path = $mysqli->real_escape_string('image/'.$_FILES['avatar']['name']);

    */



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

        <h1 align=center>Marketing Tools</h1>

    </div>

	<div class="board">

     <div class="dashtab">

  		<button class="tablinks" onclick="viewDash(event, 'Welcome')" id="defaultOpen">Welcome</button>

  		<button class="tablinks" onclick="viewDash(event, 'Profile')">Student Acccounts</button>

  		<button class="tablinks" onclick="viewDash(event, 'Application')">Company Accounts</button>

  		<button class="tablinks" onclick="viewDash(event, 'Application')">Reports</button>

  		<button class="tablinks" onclick="viewDash(event, 'Contact')">Need Help?</button>

	 </div>



<div id="Welcome" class="dashcontent">

  <div class="dashinfo">

    <h3>Hello <?php echo $first_name; ?>,</h3>

  <p>We want you to enjoy your experience with us and these pages are designed to help you find lots of important information to help you quickly settle in to your new life at Leicester. We hope you find your time here successful and enjoyable – good luck as you begin your time at Leicester!</p>

  <p> Once you are registered, we can prepare your University ID card so that it’s ready for you to pick up at the start of term. Once you have your card, you can access everything you need on campus, from meals to lectures.</p>

    <p align=right> Kind Reagrds,</p>

    <p align=right> The lesrabet team</p>

</div>

</div>

<div id="Profile" class="dashcontent">

  <h3>Hello <?php echo $first_name; ?> </h3>

   <a href="student/editProfile.php"><small><strong>Edit</strong></small></a>

      <div class="container"><br>

      <div class="row">

          <div class="col-sm-6">

        Full Name: 

            </div>

          <div class="col-sm-6">

           <?php echo $first_name.' '. $last_name; ?>

      </div>

      <br><hr>

            <div class="row">

          <div class="col-sm-6">

        Email

            </div>

          <div class="col-sm-6">

             <?php echo $email; ?>

                </div>

      </div>

               <br><hr>

      <div class="row">

          <div class="col-sm-6">

        University Atteneded

            </div>

          <div class="col-sm-6">

              <?php echo $university;?>

          </div>

      </div>

                  <br><hr>

      <div class="row">

          <div class="col-sm-6">

        Attained/ Predicted Grade

            </div>

          <div class="col-sm-6">

              <?php echo $grade;?>

          </div>

      </div>

           <br><hr>

          <div class="row">

          <div class="col-sm-6">

        City you reside in

            </div>

          <div class="col-sm-6">

             <?php echo $city; ?>

                </div>

      </div>

      <br><hr>

               <div class="row">

          <div class="col-sm-6">

        Current CV

            </div>

          <div class="col-sm-6">

             <?php echo $cv; ?>

                </div>

      </div>

      <br><hr>

      <div class="row">

          <div class="col-sm-6">

        Top 5 Skills

            </div>

          <div class="col-sm-6">

             <?php echo $skills; ?>

                </div>

      </div>

      <br><hr>

    </div>

</div>

	 </div>



<div id="Application" class="dashcontent">

     <?php

    for ($p = 0; $p < count($results->data); $p++): ?>

<?php

    $app = $results->data[$p];

?>

    

<div class='app-container'>

        <div class="row">

          <div class="col-md-9">

            <div class='header'>

            <h3><?= $app['title'] ?></h3>

            <span><h4><i><?= $app['company'] ?></i></h4></span>

            </div>

            <div><span><strong> Vacancy Type: </strong><?= $app['job_type']?></span></div> 

            <div><span><strong> Application Deadline:</strong> <strong><?= $app['app_deadline']?></strong></span></div> 

           </div>

           <div class="col-md-3">

               <br>

               <br>

               <div class='content description'><span><strong> Application Status:</strong> <strong><font color="Green"><?= $app['name']?></font></strong></span></div> 

           </div>

  </div>

    <hr>

    </div>

<?php endfor; ?>

    <p align=right><a href="myapplications.php"> All my applications</a></p>

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

</section>

</body>

</html>


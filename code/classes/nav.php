<?php

echo '
 <nav class="navbar navbar-inverse" style="margin-bottom: 0%;padding-bottom: 0%;">
 <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php"><img src="img/logo/OrigainalLogo.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php"><i class="fa fa-home"></i></a></li>
		 <li><a href="search.php">Jobs</a></li>
		  <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"> Employeer</a>
          <ul class="dropdown-menu">
			<li><a href="cportal.php">Accounts</a></li>
            <li><a href="clients.php">All Employeers</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="fa fa-search"></span> Information</a>
          <ul class="dropdown-menu">
			<li><a href="invest.php">Invest In Ethiopia</a></li>
            <li><a href="studenthelp.php">Student Help</a></li>
          </ul>
        </li>
      </ul>
         <ul class="nav navbar-nav navbar-right">
        ' .  $_SESSION['message'] . ' </ul></div></div>
        </nav>';
  ?>
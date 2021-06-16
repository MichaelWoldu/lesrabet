<?php 
require 'db.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
	if (isset($_POST['sregister'])) { //applicant registering
        
        require 'student/register.php';
        
    }
	 elseif (isset($_POST['slogin'])) { //applicant registering
        
        require 'student/login.php';
        
    }
	elseif (isset($_POST['clogin'])) { //company logging in

        require 'company/login.php';
        
    }
    
    elseif (isset($_POST['cregister'])) { //company registering
        
        require 'company/register.php';
        
    } 
	   
	elseif (isset($_POST['addJob'])) { //company post job
        
        require 'company/addjob.php';
        
    }
		elseif (isset($_POST['contact'])) { //company post job
        
        require 'company/sendmess.php';
        
    }
	
}
?>
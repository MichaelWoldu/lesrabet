<?php
/* Database connection settings */
$host = 'localhost';
$user = 'dissertationLogin';
$pass = '091164383707572306304pass';
$db = 'gerthireddb';
$mysqli = new mysqli($host,$user,$pass, $db) or die($mysqli->error);
?>
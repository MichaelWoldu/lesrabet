<?php
/* Database connection settings */
$host = 'localhost';
$user = 'mikewold_lesra';
$pass = '091164383707572306304pass';
$db = 'mikewold_gethireddb';
$mysqli = new mysqli($host,$user,$pass, $db) or die($mysqli->error);
?>
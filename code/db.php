<?php
/* Database connection settings */
$host = 'localhost';
$user = 'dissertation';
$pass = '091164383707572306304pass';
$db = 'gethireddb';
$mysqli = new mysqli($host,$user,$pass, $db) or die($mysqli->error);
?>
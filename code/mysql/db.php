<?php

/* Database connection settings */

$host = 'localhost';

$user = 'dissertationLogin';

$pass = '';

$db = 'gerthireddb';

$mysqli = new mysqli($host,$user,$pass, $db) or die($mysqli->error);

?>

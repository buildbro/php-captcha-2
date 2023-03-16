<?php
$localhost = "localhost";
$dbname = "your_database_name";
$dbuser = "database_user";
$dbpass = "database_user_password";

$mysqli = new mysqli($localhost, $dbuser, $dbpass, $dbname);

//Output any connection error
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
} 
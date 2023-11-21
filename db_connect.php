<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// modify these settings according to the account on your database server.
//Temporary Cloud Settings
//
$host = "x71wqc4m22j8e3ql.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$port = "3306";
$username = "f0xzp0i11tb6nnj6";
$user_pass = "xyyddka5igi7xiyl";
$database_in_use = "j5x9jr68qhtbn8j3";
//

//Localhost Settings
/*
$host = "localhost";
$port = "3306";
$username = "root";
$user_pass = "root";
$database_in_use = "JokesPart1";
*/


$mysqli = new mysqli($host, $username, $user_pass, $database_in_use);
if ($mysqli->connect_error) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "<br>";

?>
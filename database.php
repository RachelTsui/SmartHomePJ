<?php
$host = "localhost";
$dbname = "smarthouse";
$username = "root";
$password = "000000";

$mysqli = mysqli_connect($host, $username, $password,$dbname);

if(!$mysqli)
    die("Connection error:".$mysqli->connect_error);
echo 'Connected Successfully';
return $mysqli;

?>
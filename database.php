<?php
$host = "localhost";
$dbname = "smarthouse";
$username = "root";
$password = "000000";

$mysqli = mysqli_connect($host, $username, $password,$dbname);

if(!$mysqli)
    die("SQL error: " . $sql->error);
//echo 'Connected Successfully';
return $mysqli;

?>
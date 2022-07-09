<?php
$host = "localhost";
$dbname = "smartHouse";
$username = "root";
$password = "123456";

$mysqli = new mysqli($host,$username,$password,$dbname);
if ($mysqli->connect_errno){
    die("Connection error: " . $mysqli->connect_errno);
}
return $mysqli;

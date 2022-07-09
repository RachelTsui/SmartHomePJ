<?php

session_start();
$_SESSION = $_POST;
header("Location: theme_new.php");

?>
<?php
include "test.php";
echo $user["familyNo"];
session_start();
session_destroy();
header("Location: test.php");
exit;
?>

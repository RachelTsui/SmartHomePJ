<?php
$mysqli = require __DIR__ . "/database.php";
$stmt = $mysqli->stmt_init();
$name = $_POST['name'];
$result = mysqli_query($mysqli, "SELECT * FROM `equipment` where Name='$name'");
$row    = mysqli_fetch_row($result);
if ($row){
    $FamilyID = $row[0];
    $ID = $row[1];
}
$result_all = mysqli_query($mysqli, "SELECT * FROM `pattern` where `FamilyID`='$FamilyID' and `ID` ='$ID'");
$data    = mysqli_fetch_all($result_all);
echo  json_encode($data);

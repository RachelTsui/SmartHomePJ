<?php

$mysqli = require __DIR__ . "/database.php";
$sql = "INSERT INTO theme (theme_id,theme_name,device_select,onTime,offTime,theme_description,place_select,theme_state)
      VALUES(?,?,?,?,?,?,?,?)";
$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}
$stmt->execute();
echo "Signup successful";
$state = "on";
$result = mysqli_query($mysqli, "SELECT * FROM theme");
$row = mysqli_fetch_array($result);

if ($_POST['theme_state'] == "on") {
    $state = "off";
} else {
    $state = "on";
}
echo $state;
$sql = "UPDATE theme SET theme_state = '$state' WHERE theme_id = $_POST[theme_id]";
echo (int)$_POST["theme_id"];
if ($mysqli->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
header("Location: theme_new.php");
//print_r($_POST);

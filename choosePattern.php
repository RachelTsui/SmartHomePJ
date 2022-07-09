<?php
    session_start();

    $FamilyId = 123;
    $ID = $_SESSION["ID"];

    $mysqli = require __DIR__ . "/database.php";

    $result = mysqli_query($mysqli, "SELECT * FROM equipment WHERE (FamilyID = $FamilyId AND ID = $ID) limit 0, 1");
    $row = $result->fetch_assoc();
            
    $sql = "UPDATE equipment SET Pattern = '$_POST[choose]' WHERE (FamilyID = $FamilyId AND ID = $ID)";
    mysqli_query($mysqli, $sql) or die (mysqli_error());
    


    header("Location: equipments.php");
?>





<?php
    session_start();

    $FamilyId = 123;
    $ID = $_SESSION["ID"];

    $mysqli = require __DIR__ . "/database.php";

    $result = mysqli_query($mysqli, "SELECT * FROM equipment WHERE (FamilyID = $FamilyId AND ID = $ID) limit 0, 1");
    $row = $result->fetch_assoc();
            
    $sql1 = "DELETE FROM pattern WHERE (FamilyID = $FamilyId AND ID = $ID AND PatternID = '$_POST[delete]')";
    mysqli_query($mysqli, $sql1) or die (mysqli_error());

    $sql2 = 
    


    header("Location: equipments.php");

?>
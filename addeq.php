<?php

    $arr = array(
        'television'=>array(),
        'router'=>array('Accelerator','WIFI', 'Light'),
        'lamp'=>array('normal','bright','dark'),
        'curtain'=>array('thin','thick'),
        'fan'=>array('rotate','powerful','normal','weak'),
    );
    $FamilyId = 123;

    $mysqli = require __DIR__ . "/database.php";
    $con=mysqli_connect("localhost","root","000000","smarthouse");

    $sql = "INSERT INTO Equipment(FamilyID, ID, Name, Date, Cycle, Battery, Kind)
        VALUE ('$FamilyId',?,?,?,?,?,?)";

    $stmt = $mysqli->stmt_init();
    if(! $stmt->prepare($sql)){
        die("SQL error: " . $mysqli->error);
    }
    $stmt->bind_param("issiis",$_POST["ID"],
                              $_POST["Name"],
                              $_POST["Date"],
                              $_POST["Cycle"],
                              $_POST["Battery"],
                              $_POST["Kind"]);
    switch($_POST["Kind"]){
        case "television":
            $sql2 = "INSERT INTO tv(FamilyID, ID, PatternID)
                    VALUE ('$FamilyId', ".$_POST["ID"].",1)";
            mysqli_query($con, $sql2) or die (mysqli_error());
            break;
        case "router":
            $sql2 = "INSERT INTO router(FamilyID, ID, PatternID)
                    VALUE ('$FamilyId', ".$_POST["ID"].",1)";
            mysqli_query($con, $sql2) or die (mysqli_error());
            break;
        case "lamp":
            $sql2 = "INSERT INTO lamp(FamilyID, ID, PatternID)
                    VALUE ('$FamilyId', ".$_POST["ID"].",1)";
            mysqli_query($con, $sql2) or die (mysqli_error());
            break;
        case "curtain":
            $sql2 = "INSERT INTO curtain(FamilyID, ID, PatternID)
                    VALUE ('$FamilyId', ".$_POST["ID"].",1)";
            mysqli_query($con, $sql2) or die (mysqli_error());
            break;
        case "fan":
            $sql2 = "INSERT INTO fan(FamilyID, ID, PatternID)
                    VALUE ('$FamilyId', ".$_POST["ID"].",1)";
            mysqli_query($con, $sql2) or die (mysqli_error());
            break;
    }
    //echo $sql2;
    
    if(!$stmt->execute()){
        die($mysqli->error ." " . $mysqli->errno);
    }
    //print_r($_POST);
    header("Location: equipments.php");
    
    
    // print_r($_POST); 
?>




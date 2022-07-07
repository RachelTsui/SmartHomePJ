<?php
    $arr = array(
        '电视'=>array(),
        'router'=>array('Accelerator','WIFI', 'Light'),
        '灯'=>array('正常','明亮','暗色')
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
        case "router":
            $sql2 = "INSERT INTO router(FamilyID, ID, Pattern)
                    VALUE ('$FamilyId', ".$_POST["ID"].",1)";
            echo $sql2;
            mysqli_query($con, $sql2) or die (mysqli_error());
            break;
    }
    if($stmt->execute()){
        echo"create successful!";
    }else{
        die($mysqli->error ." " . $mysqli->errno);
    }
    //print_r($_POST);
    header("Location: equipments.php");
    
    
    // print_r($_POST); 
?>




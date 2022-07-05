<?php
    $arr = array(
        '电视'=>array(),
        '路由器'=>array('加速器','电源指示灯'),
        '灯'=>array('正常','明亮','暗色')
    );
    $FamilyId = 123;

    $mysqli = require __DIR__ . "/database.php";

    $sql = "INSERT INTO Equipment(FamilyID, ID, Name, Cycle, Battery, Kind)
        VALUE ('$FamilyId',?,?,?,?,?)";

    $stmt = $mysqli->stmt_init();
    if(! $stmt->prepare($sql)){
        die("SQL error: " . $mysqli->error);
    }
    $stmt->bind_param("isiis",$_POST["ID"],
                              $_POST["Name"],
                              $_POST["Cycle"],
                              $_POST["Battery"],
                              $_POST["Kind"]);

    if ($stmt->execute()){
        echo "succsefful\n";
        print_r($_POST); 
    }
    else{
        if($mysqli->errno === 1062){
            die("Equipment id is already taken");
        }
        else{
            die($mysqli->error . " " . $mysqli->errno);
        }
        
    }
    
?>




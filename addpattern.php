<?php 
    $arr = array(
        '电视'=>array(),
        'router'=>array('Accelerator','WIFI', 'Light'),
        '灯'=>array('正常','明亮','暗色')
    );
    $FamilyId = 123;
    $ID = 1;
    $mysqli = require __DIR__ . "/database.php";
    $con=mysqli_connect("localhost","root","000000","smarthouse");
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli = require __DIR__ . "/database.php";

    $result = mysqli_query($mysqli, "SELECT * FROM equipment WHERE (FamilyID = $FamilyId AND ID = $ID) limit 0, 1");
    $row = $result->fetch_assoc();     
    switch($row["Kind"]) {
        case "router":
            $result = mysqli_query($mysqli, "SELECT * FROM router");
            $num    = mysqli_num_rows($result) + 1;
            $WIFI="CLOSE";
            $Accelerator="CLOSE";
            $Light="CLOSE";
            
            $value = $_POST['checkbox'];
            foreach($value as $onevalue){
                switch($onevalue){
                    case 1:
                        $WIFI="OPEN";
                        break;
                    case 2:
                        $Accelerator="OPEN";
                        break;
                    case 3:
                        $Light="OPEN";
                        break;
                }
            }

            print_r($_POST);
            
            print_r($FamilyId);
            print_r($ID);
            print_r(++$num);
            print_r($_POST['Name']) ;
            print_r($WIFI);
            print_r($Accelerator);
            print_r($Light);
            $sql = "INSERT INTO router(FamilyID, ID, PatternID, Name, WIFI, Accelerator, Light)
                    VALUE ('$FamilyId',$ID,$num,'$_POST[Name]', '$WIFI', '$Accelerator', '$Light')";
            mysqli_query($con, $sql) or die (mysqli_error());
            $sql2 = "INSERT INTO pattern(FamilyID, ID, PatternID, Name)
                    VALUE ('$FamilyId',$ID,$num,?)";
            $stmt = $mysqli->stmt_init();
            $stmt->prepare($sql2);
            $stmt->bind_param("s",$_POST["Name"]);
            $stmt->execute();
            break;
        }
        
    //print_r($_POST);
    header("Location: pattern.php");
    
    
    // print_r($_POST); 
?>




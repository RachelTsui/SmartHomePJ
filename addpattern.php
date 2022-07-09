<?php 
    session_start();
    if(strlen($_POST["Name"])>10)
        die("Name长度需小于10");
    
    $FamilyId = 123;
    $ID = $_SESSION["ID"];
    
    $mysqli = require __DIR__ . "/database.php";
    $con=mysqli_connect("localhost","root","123456","smarthouse");
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli = require __DIR__ . "/database.php";

    $result = mysqli_query($mysqli, "SELECT * FROM equipment WHERE (FamilyID = $FamilyId AND ID = $ID) limit 0, 1");
    $row = $result->fetch_assoc();
    //echo $row["Kind"] ;
    switch($row["Kind"]) {
        case "router":
            $result = mysqli_query($mysqli, "SELECT * FROM router"); //选择路由表中所有元组
            $num    = mysqli_num_rows($result) + 1; //当前元组数+1
            $WIFI="CLOSE"; //赋初值
            $Accelerator="CLOSE";
            $Light="CLOSE";
            
            $value = $_POST['checkbox'];
            foreach($value as $onevalue){ //遍历
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

            // print_r($_POST);
            
            // print_r($FamilyId);
            // print_r($ID);
            // print_r(++$num);
            // print_r($_POST['Name']) ;
            // print_r($WIFI);
            // print_r($Accelerator);
            // print_r($Light);
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
        case "television":
            $result = mysqli_query($mysqli, "SELECT * FROM tv"); //选择路由表中所有元组
            $num    = mysqli_num_rows($result) + 1; //当前元组数+1
            $Power ="CLOSE";
            
            $value = $_POST['checkbox'];
            foreach($value as $onevalue){ //遍历
                switch($onevalue){
                    case 1:
                        $Power="OPEN";
                        break;
                }
            }
            $sql = "INSERT INTO tv(FamilyID, ID, PatternID, Name, Power)
                    VALUE ('$FamilyId',$ID,$num,'$_POST[Name]', '$Power')";
            mysqli_query($con, $sql) or die (mysqli_error());
            $sql2 = "INSERT INTO pattern(FamilyID, ID, PatternID, Name)
                    VALUE ('$FamilyId',$ID,$num,?)";
            $stmt = $mysqli->stmt_init();
            $stmt->prepare($sql2);
            $stmt->bind_param("s",$_POST["Name"]);
            $stmt->execute();
            break;
        case "lamp":
            $result = mysqli_query($mysqli, "SELECT * FROM lamp"); //选择路由表中所有元组
            $num    = mysqli_num_rows($result) + 1; //当前元组数+1
            $Normal ="CLOSE";
            $Bright = "CLOSE";
            $Dark = "CLOSE";
            
            $value = $_POST['checkbox'];
            foreach($value as $onevalue){ //遍历
                switch($onevalue){
                    case 1:
                        $Normal="OPEN";
                        break;
                    case 2:
                        if($Normal=="OPEN")
                            die("不允许同时选中多种亮度");
                        $Bright="OPEN";
                        break;
                    case 3:
                        if($Normal=="OPEN" || $Bright=="OPEN")
                            die("不允许同时选中多种亮度");
                        $Dark="OPEN";
                        break;
                }
            }
            $sql = "INSERT INTO lamp(FamilyID, ID, PatternID, Name, Normal,Bright,Dark)
                    VALUE ('$FamilyId',$ID,$num,'$_POST[Name]', '$Normal','$Bright','$Dark')";
            mysqli_query($con, $sql) or die (mysqli_error());
            $sql2 = "INSERT INTO pattern(FamilyID, ID, PatternID, Name)
                    VALUE ('$FamilyId',$ID,$num,?)";
            $stmt = $mysqli->stmt_init();
            $stmt->prepare($sql2);
            $stmt->bind_param("s",$_POST["Name"]);
            $stmt->execute();
            break;
        case "curtain":
            $result = mysqli_query($mysqli, "SELECT * FROM curtain"); //选择路由表中所有元组
            $num    = mysqli_num_rows($result) + 1; //当前元组数+1
            $thin ="CLOSE";
            $thick = "CLOSE";
 
            
            $value = $_POST['checkbox'];
            foreach($value as $onevalue){ //遍历
                switch($onevalue){
                    case 1:
                        $thin="OPEN";
                        break;
                    case 2:
                        $thick="OPEN";
                        break;
                }
            }
            $sql = "INSERT INTO curtain(FamilyID, ID, PatternID, Name, thin,thick)
                    VALUE ('$FamilyId',$ID,$num,'$_POST[Name]', '$thin','$thick')";
            mysqli_query($con, $sql) or die (mysqli_error());
            $sql2 = "INSERT INTO pattern(FamilyID, ID, PatternID, Name)
                    VALUE ('$FamilyId',$ID,$num,?)";
            $stmt = $mysqli->stmt_init();
            $stmt->prepare($sql2);
            $stmt->bind_param("s",$_POST["Name"]);
            $stmt->execute();
            break;
        case "fan":
            $result = mysqli_query($mysqli, "SELECT * FROM fan"); //选择路由表中所有元组
            $num    = mysqli_num_rows($result) + 1; //当前元组数+1
            $rotate ="CLOSE";
            $powerful = "CLOSE";
            $normal = "CLOSE";
            $weak ="CLOSE";
            
            $value = $_POST['checkbox'];
            foreach($value as $onevalue){ //遍历
                switch($onevalue){
                    case 1:
                        $rotate="OPEN";
                        break;
                    case 2:
                        $powerful="OPEN";
                        break;
                    case 3:
                        if($powerful=="OPEN")
                            die("不允许同时选中多种强度");
                        $normal="OPEN";
                        break;
                    case 4:
                        if($powerful=="OPEN" || $normal=="OPEN")
                            die("不允许同时选中多种强度");
                        $weak="OPEN";
                        break;
                }
            }
            $sql = "INSERT INTO fan(FamilyID, ID, PatternID, Name,rotate,powerful,normal,weak)
                    VALUE ('$FamilyId',$ID,$num,'$_POST[Name]', '$rotate','$powerful','$normal','$weak')";
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




<?php
// $test1=$_POST["test1"];
// $test2=$_POST["test2"];
// echo $test1;

$mysqli = require __DIR__ . "/themedatabase.php";
$sql="INSERT INTO theme (theme_id,theme_name,device_id,onTime,offTime,theme_description,place_select)
      VALUES(?,?,?,?,?,?,?)";

$stmt = $mysqli->stmt_init();
if(!$stmt->prepare($sql)){
    die("SQL error:".$mysqli->error);
}
// $place_sel=@$_POST["place_select"]
$stmt->bind_param("isissss",
                   $_POST["theme_id"],
                   $_POST["theme_name"],
                   $_POST["device_id"],
                   $_POST["onTime"],
                   $_POST["offTime"],
                   $_POST["theme_description"],
                   $_POST['place']
                 
);
if($stmt->execute()){
    echo"create successful!";
}else{
    die($mysqli->error ." " . $mysqli->errno);
}

print_r($_POST);
?>
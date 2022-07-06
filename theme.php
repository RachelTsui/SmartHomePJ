<?php


$mysqli = require __DIR__ . "/themedatabase.php";
$sql="INSERT INTO theme (theme_id,theme_name,device_select,onTime,offTime,theme_description,place_select)
      VALUES(?,?,?,?,?,?,?)";

$stmt = $mysqli->stmt_init();
if(!$stmt->prepare($sql)){
    die("SQL error:".$mysqli->error);
}
// $place_sel=@$_POST["place_select"]
$stmt->bind_param("issssss",
                   $_POST["theme_id"],
                   $_POST["theme_name"],
                   $_POST["device_select"],
                   $_POST["onTime"],
                   $_POST["offTime"],
                   $_POST["theme_description"],
                   $_POST["place_select"]
                 
);
if($stmt->execute()){
    echo"create successful!";
}else{
    die($mysqli->error ." " . $mysqli->errno);
}

print_r($_POST);
?>
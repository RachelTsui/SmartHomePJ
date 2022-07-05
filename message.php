<?php
print_r($_POST);
$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO message (id, message)
        VALUES (?,?)";

$stmt = $mysqli->stmt_init();

if(!$stmt->prepare($sql)){
    die("SQL error: ". $mysqli->error);
}

$stmt->bind_param("ss",
                $_POST["usr_id"],
                $_POST["mess"]);

$stmt->execute();
echo "Signup successful";

?>
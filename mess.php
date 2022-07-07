<?php
print_r($_POST);
$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO message (name, message, time)
        VALUES (?,?,?)";

$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

date_default_timezone_set('RPC'); //将默认时区调回为北京时间
$time = date('Y/m/d H:i:s'); //输出指定时区当前时间
        

$stmt->bind_param(
    "sss",
    $_POST["usr_id"],
    $_POST["mess"],
    $time
);

$stmt->execute();
echo "Signup successful";

$result = mysqli_query($mysqli, "SELECT * FROM message");
echo "<table border='1'>
<tr>
<th>name</th>
<th>message</th>
<th>time</th>
</tr>";

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['message'] . "</td>";
    echo "<td>" . $row['time'] . "</td>";
    echo "</tr>";
}
echo "</table>";

header("Location: message.php");

?>
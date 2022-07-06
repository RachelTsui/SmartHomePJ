<?php
session_start();
if(isset($_SESSION["user_id"])){
    $mysqli = require __DIR__ . "/database.php";
    $sql = "SELECT * FROM usr
            WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>Home</h1>
    <?php if(isset($user)): ?>
        <?php $username = $user["name"]?>
        <p>Hello <?= htmlspecialchars($user["name"])?> you are in No. <?= htmlspecialchars($user["familyNo"])?> family</p>
        <b> Go to </b><a href="./index.html">our dashboard</a>
        <p><a href="logout.php">Log out</a></p>
    <?php else: ?>
        <p><a href="login.php">Log in</a> or <a href="singup.html">sign up</a></p>
    <?php endif; ?>
</body>
</html>
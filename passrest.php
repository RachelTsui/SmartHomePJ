<?php
$is_valid = false;
if($_SERVER["REQUEST_METHOD"]=== "POST"){
    $mysqli = require __DIR__ . "/database.php";
    $sql = sprintf("SELECT * FROM usr
                    WHERE email = '%s'",
                    $mysqli->real_escape_string($_POST["email"]));
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();

    if($user){
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $user["id"];
            header("Location: login.php");
            exit;
    }
    $is_valid = true;
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
<h1>Password Reset</h1>
    <?php   if($is_valid): ?>
        <em>You are not the user, please <a href="singup.html">sign up</a></em>
    <?php endif; ?>
    
    <form action="process-pass.php" method="post">
        <div>
            <label for="email">email</label>
            <input type="email" id="email" name = "email">
        </div>
        <div>
            <label for="newpassword">New Password</label>
            <input type="password" id="newpassword" name = "newpassword">
        </div>
        <div>
            <label for="password_confirmation">Repeat Password</label>
            <input type="password" id="password_confirmation" name = "password_confirmation">
        
        </div>
        <button>reset</button>
        
    </form>
</body>
</html>

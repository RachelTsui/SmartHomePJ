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
        if(password_verify($_POST["password"], $user["password_hash"])){
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"]= $user["id"];
            
            header("Location: test.php");
            exit;
        }
    }
    $is_valid = true;
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h1>Login</h1>
    <?php   if($is_valid): ?>
        <em>Invalid login</em>
    <?php endif; ?>

    
    <form method="post"> 
        <label for="email">email</label>
        <input type="email" id="email" name = "email">
        
        <label for="password">Password</label>
        <input type="password" id="password" name = "password">
        
        <button>Login</button>
    </form>
    <p>Doesn't have an account? Go to <a href="./singup.html">sign up</a></p>
    <p>Forget your password? Go to <a href="./passrest.php">reset your password</a></p>
</body>
</html>
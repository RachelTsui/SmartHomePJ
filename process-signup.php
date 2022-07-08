<?php
if (empty($_POST["name"])){
    die("Name is Required");
}
if ( ! filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
    die("Valid email is required");
}
if( (strlen($_POST["password"])<8)){
    die("The password must contain at least 8 characters");
}
if(!(preg_match("/[a-z]/i", $_POST["password"]))){
    die("Password must contain at least one letter");
}
if(!(preg_match("/[0-9]/", $_POST["password"]))){
    die("Password must contain at least one number");
}
if($_POST["password"]!= $_POST["password_confirmation"]){
    echo "<script>alert('different password');window.location.href='singup.html';</script>";
    exit;
}

session_start();
//判断有没有输入验证码
if ( empty($_SESSION['captcha']) ){
    echo '<script>alert("请输入验证码！");window.location.href="./singup.html";</script><br>';
} 
//判断验证码是否正确
if ( strtolower($captcha) != strtolower($_SESSION['captcha']) ){ 
    echo '<script>alert("验证码不正确！");window.location.href="./singup.html";</script><br>';
}
$password_hash = password_hash($_POST["password"],PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO usr(name, familyNo, email, password_hash)
        VALUE (?,?,?,?)";

$stmt = $mysqli->stmt_init();
if(! $stmt->prepare($sql)){
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssss",$_POST["name"],
                        $_POST["familyNo"],
                        $_POST["email"],
                        $password_hash);

if ($stmt->execute()){
    header("Location: signup-success.html");
    exit;
}
else{
    if($mysqli->errno === 1062){
        die("email is already taken");
    }
    else{
        die($mysqli->error . " " . $mysqli->errno);
    }
    
}



?>
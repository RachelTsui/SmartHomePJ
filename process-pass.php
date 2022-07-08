<?php
if( (strlen($_POST["newpassword"])<8)){
    die("The password must contain at least 8 characters");
}
if(!(preg_match("/[a-z]/i", $_POST["newpassword"]))){
    die("Password must contain at least one letter");
}
if(!(preg_match("/[0-9]/", $_POST["newpassword"]))){
    die("Password must contain at least one number");
}
$password_hash = password_hash($_POST["newpassword"],PASSWORD_DEFAULT);

$con=mysqli_connect("localhost","root","123456","smartHouse");

// 检测连接

if (mysqli_connect_errno())

{

echo "连接失败: " . mysqli_connect_error();

}

mysqli_query($con,"UPDATE usr SET password_hash = '". $password_hash."' WHERE email='". $_POST['email']."'");

header("Location: login.php");
    



?>
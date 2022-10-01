<?php
include('../../connect/connection.php');
session_start();
$path = $_POST["path"];
$username = $_POST["username"];
$password = md5($_POST["password"]);

$sql = mysqli_query($con,"SELECT user_id,username,password FROM users WHERE username='$username' AND password='$password'");
$row = mysqli_fetch_assoc($sql);
if (isset($row["user_id"])){
    $_SESSION["user_id"] = $row["user_id"];
    header('Location: '.$path.'/');
}else{
    header('Location: '.$path.'/login?error=error');
}
?>
<?php
include('../../connect/connection.php');
session_start();

$user_id = $_SESSION["user_id"];
$date = date("Y-m-d");

$path = $_POST["path"];
$title = $_POST["title"];
$name = $_POST["name"];
$lastName = $_POST["lastName"];
$tel = $_POST["tel"];
$departmentId = $_POST["departmentId"];
$username = $_POST["username"];
$pass = md5($_POST["pass"]);

mysqli_query($con,"INSERT INTO users(title_id,first_name,last_name,tel,username,password,department_id,role_id,create_date,create_by,update_date,update_by,status_id)
values('$title','$name','$lastName','$tel','$username','$pass','$departmentId','2','$date','$user_id','$date','$user_id','1')");

header('Location: '.$path.'/officer?success=1');
?>

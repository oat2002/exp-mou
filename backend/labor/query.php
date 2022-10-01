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

if (isset($_POST["user_id"])){
    $userId = $_POST["user_id"];
    if ($_POST["pass"] != ''){
        mysqli_query($con, "UPDATE users SET title_id='$title',
                 first_name='$name',
                 last_name='$lastName',
                 tel='$tel',
                 username='$username',
                 password='$pass',
                 department_id='$departmentId',
                 update_date='$date',
                 update_by='$user_id'
                 WHERE user_id='$userId'");
        echo "111";
    }else{
        mysqli_query($con, "UPDATE users SET title_id='$title',
                 first_name='$name',
                 last_name='$lastName',
                 tel='$tel',
                 username='$username', 
                 department_id='$departmentId',
                 update_date='$date',
                 update_by='$user_id'
                 WHERE user_id='$userId'");
    }
    header('Location: '.$path.'/officer?success=3');
}else{
    mysqli_query($con,"INSERT INTO users(title_id,first_name,last_name,tel,username,password,department_id,role_id,create_date,create_by,update_date,update_by,status_id)
    values('$title','$name','$lastName','$tel','$username','$pass','$departmentId','2','$date','$user_id','$date','$user_id','1')");
    header('Location: '.$path.'/officer?success=1');
}
?>

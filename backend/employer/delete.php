<?php
include('../../connect/connection.php');

$user_id = $_GET["user_id"];
$path = $_GET["path"];
mysqli_query($con,"UPDATE users SET status_id='-9' WHERE user_id='$user_id'");
header('Location: '.$path.'/officer?success=2');
?>
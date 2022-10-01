<?php
$con= mysqli_connect("194.59.164.31","u180177368_mou","001122334455Mou","u180177368_mou") or die("Error: " . mysqli_error($con));

mysqli_query($con, "SET NAMES 'utf8'");
date_default_timezone_set('Asia/Bangkok');
?>
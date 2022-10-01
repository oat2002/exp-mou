<?php
include('../../connect/connection.php');
$province_id = $_GET['province_id'];
$sql = "SELECT * FROM m_district WHERE province_id='$province_id'";
$query = mysqli_query($con, $sql);

$json = array();
while($result = mysqli_fetch_assoc($query)) {
    array_push($json, $result);
}
echo json_encode($json);
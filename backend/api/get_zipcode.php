<?php
include('../../connect/connection.php');
$subdistrict_id = $_GET['subdistrict_id'];
$sql = "SELECT * FROM m_zipcode WHERE subdistrict_id='$subdistrict_id'";
$query = mysqli_query($con, $sql);

$json = array();
while($result = mysqli_fetch_assoc($query)) {
    array_push($json, $result);
}
echo json_encode($json);
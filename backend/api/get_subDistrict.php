<?php
include('../../connect/connection.php');
$district_id = $_GET['district_id'];
$sql = "SELECT * FROM m_subdistrict WHERE district_id='$district_id'";
$query = mysqli_query($con, $sql);

$json = array();
while($result = mysqli_fetch_assoc($query)) {
    array_push($json, $result);
}
echo json_encode($json);
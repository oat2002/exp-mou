<?php
include('../../connect/connection.php');

$product_id = $_GET["product_id"];
mysqli_query($con,"UPDATE form_product SET status_id='-9' WHERE product_id='$product_id'");
header('Location: ../index.php?url=product/view.php&title=จัดการสินค้า&st=3');
?>
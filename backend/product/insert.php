<?php
include('../../connect/connection.php');
session_start();
$productName = $_POST["productName"];
$price = $_POST["price"];
$amount = $_POST["amount"];
$productDetail = $_POST["productDetail"];
$user_id = $_SESSION["user_id"];

$date = date("Y-m-d");
$numrand = (mt_rand());
$path="../img/";
$limit_size=3000000;
$allowed_types=array("jpg","jpeg","gif","png");

    if ($_FILES['img']['size'] != "" && isset($_FILES['img'])){
        if($_FILES['img']['size'] < $limit_size){
            $type = strrchr($_FILES['img']['name'],".");
            $newName = $date.$numrand.$type;
            $path_copy=$path.$newName;

            move_uploaded_file($_FILES['img']['tmp_name'],$path_copy);
            if (isset($_POST["product_id"])){
                $product_id = $_POST["product_id"];
                mysqli_query($con,"UPDATE form_product SET product_name='$productName',price='$price',amount='$amount',product_detail='$productDetail',img_id='$newName',update_date='$date',update_by='$user_id' where product_id='$product_id'");
            }else{
                mysqli_query($con,"INSERT INTO form_product(product_name,price,amount,product_detail,img_id,create_date,create_by,update_date,update_by,status_id) 
                values('$productName','$price','$amount','$productDetail','$newName','$date','$user_id','$date','$user_id','1')");
            }
        }else{
            header('Location: ../index.php?url=product/manage.php&title=เพิ่มข้อมูล&st=2');
            exit();
        }
    }else{
        if (isset($_POST["product_id"])){
            $product_id = $_POST["product_id"];
            mysqli_query($con,"UPDATE form_product SET product_name='$productName',price='$price',amount='$amount',product_detail='$productDetail',update_date='$date',update_by='$user_id' where product_id='$product_id'");
        }else {
            mysqli_query($con, "INSERT INTO form_product(product_name,price,amount,product_detail,create_date,create_by,update_date,update_by,status_id) 
            values('$productName','$price','$amount','$productDetail','$date','$user_id','$date','$user_id','1')");
        }
    }
header('Location: ../index.php?url=product/view.php&title=จัดการสินค้า&st=1');
?>

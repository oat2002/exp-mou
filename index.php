<?php
use AltoRouter as Router;
require __DIR__ . '/vendor/autoload.php';

$path = "/".basename(dirname(__FILE__));
$GLOBALS['path'] = $path;

$router = new Router();
$router->setBasePath($path);

$router->map("GET", "/", function (){
    require __DIR__ . '/backend/index.php';
});

$router->map("GET", "/login", function () {
    require __DIR__ . '/backend/login/login.php';
});

$router->map("GET", "/logout", function () {
    require __DIR__ . '/backend/login/lockout.php';
});

$router->map("GET", "/product", function () {
    $url = "product/view.php";
    if (isset($_GET["url"])){
        $url = $_GET["url"];
    }
    $title = "จัดการสินค้า";
    require __DIR__ . '/backend/index.php';
});

$router->map("GET", "/officer", function () {
    $url = "officer/view.php";
    if (isset($_GET["url"])){
        $url = $_GET["url"];
    }
    $title = "จัดการข้อมูลเจ้าหน้าที่";
    require __DIR__ . '/backend/index.php';
});

$router->map("GET", "/labor", function () {
    $url = "labor/view.php";
    if (isset($_GET["url"])){
        $url = $_GET["url"];
    }
    $title = "จัดการข้อมูลแรงงาน";
    require __DIR__ . '/backend/index.php';
});

$router->map("GET", "/product/add", function (){
    $url = "product/manage.php";
    $title = "เพิ่มข้อมูล";
    require __DIR__ .'/backend/index.php';
});

$match = $router->match();

if (is_array($match) && is_callable($match['target'])) {
    // เรียก callback เพื่อดึงหน้าที่ต้องการมาแสดง
    call_user_func_array($match['target'], $match['params']);
} else {
    // แสดงหน้า 404
    require __DIR__ . "/backend/error/404.php";
}

//* ใช้ดัก request ทั้งหมด อะไรก็ได้
//[i] ดักค่าที่เป็นตัวเลขเท่านั้น
//[a] ดักค่าที่เป็นตัวหนังสือและตัวเลข (alphanumeric)
//[h] ดักค่าที่เป็นเลขฐาน 16 (ตัวเลข 0-9 และหนังสือ A-F)
//[*] ดักค่าอะไรก็ได้ จนกว่าจะถึง / ตัวต่อไป
//[**] ดักค่าทั้งหมดจนสุด URL
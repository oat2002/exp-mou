
<?php
session_start();
if (isset($_SESSION["user_id"])){
    header('Location: '.$GLOBALS['path'].'/');
}
include 'template/header.php';
?>
<body id="kt_body"
      class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<!--begin::Main-->

<div class="d-flex flex-column flex-root">
    <!--begin::Login-->

    <div class="login login-4 login-signin-on d-flex flex-row-fluid">
        <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat"
             style="background-image: url('assets/media/bg/bg-3.jpg');">
            <div class="login-form text-center p-7 position-relative overflow-hidden">
                <!--begin::Login Header-->
                <?php
                if(isset($_GET["error"])){
                    if ($_GET["error"] == 'error'){
                    ?>
                    <div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                        <div class="alert-text">ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง</div>
                        <div class="alert-close">
                        </div>
                    </div>
                <?php
                    }
                }
                ?>

                <div class="d-flex flex-center mb-15">
                    <a href="#">
                        <img src="assets/media/logos/logo-letter-13.png" class="max-h-75px" alt=""/>
                    </a>
                </div>
                <!--end::Login Header-->
                <!--begin::Login Sign in form-->
                <div class="mb-20">
                    <h3>เข้าสู่ระบบ</h3>
                    <div class="text-muted font-weight-bold"></div>
                </div>
                <form class="form" action="backend/login/chkLogin.php" method="post">
                    <input type="hidden" name="path" value="<?php echo $GLOBALS['path'];?>">
                    <div class="form-group mb-5">
                        <input class="form-control h-auto form-control-solid py-4 px-8" type="text"
                               placeholder="Username" name="username" autocomplete="off" required/>
                    </div>
                    <div class="form-group mb-5">
                        <input class="form-control h-auto form-control-solid py-4 px-8" type="password"
                               placeholder="Password" name="password" required/>
                    </div>
                    <button id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">
                        เข้าสู่ระบบ
                    </button>
                </form>
            </div>
        </div>
    </div>
    <!--end::Login-->
</div>
</body>
</html>
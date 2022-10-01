<div class="card card-custom">
    <div class="card-header flex-wrap pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label"><?php echo $_GET["title"];?></h3>
        </div>
        <div class="card-toolbar">
            <a href="labor" class="btn btn-primary font-weight-bolder mb-5">
                <span class="svg-icon svg-icon-md"><i class="flaticon2-fast-back"></i></span>ย้อนกลับ</a>
        </div>
    </div>
    <form method="post" action="backend/labor/query.php">
        <div class="card-body">
            <input type="hidden" name="path" value="<?php echo $GLOBALS['path'];?>">
            <?php
            if (isset($_GET["user_id"])) {
                $user_id = $_GET["user_id"];
                ?>
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <?php
                $sql = mysqli_query($con, "SELECT * FROM users WHERE user_id='$user_id'");
                $assoc = mysqli_fetch_assoc($sql);
            }
            ?>
            <div class="form-group row">
                <div class="col-2">
                    <label>ตำนำหน้าชื่อ</label>
                    <select name="title" class="select2 form-control" required>
                        <option value=""></option>
                        <?php
                        $title = mysqli_query($con,"SELECT * FROM m_title WHERE status_id='1'");
                        while ($resultTitle = mysqli_fetch_assoc($title)){
                            ?>
                            <option <?php if (isset($_GET["user_id"]) && $assoc["title_id"] == $resultTitle['title_id']){ echo "selected";}?>
                                    value="<?php echo $resultTitle['title_id'];?>"><?php echo $resultTitle['title_name'];?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-4">
                    <label>ชื่อ</label>
                    <input type="text" name="name" class="form-control" value="<?php if (isset($_GET["user_id"])) {echo $assoc["first_name"];} ?>" placeholder="ชื่อ" required/>
                </div>
                <div class="col-4">
                    <label>นามสกุล</label>
                    <input type="text" name="lastName" class="form-control" value="<?php if (isset($_GET["user_id"])) {echo $assoc["last_name"];} ?>" placeholder="นามสกุล" required/>
                </div>
                <div class="col-2">
                    <label>วัน/เดือน/ปีเกิด</label>
                    <input type="text" class="form-control datepicker" data-provide="datepicker" data-date-language="th-th" name="createDateSafe">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-3">
                    <label>เบอโทรศัพท์</label>
                    <input type="text" name="tel" maxlength="10" class="form-control numberOnly" value="<?php if (isset($_GET["user_id"])) {echo $assoc["tel"];} ?>">
                </div>
                <div class="col-3">
                    <label>แผนก</label>
                    <select name="departmentId" class="select2 form-control" required>
                        <option value=""></option>
                        <?php
                        $department = mysqli_query($con,"SELECT * FROM m_department WHERE status_id='1'");
                        while ($resultDepartment = mysqli_fetch_assoc($department)){
                            ?>
                            <option <?php if (isset($_GET["user_id"]) && $assoc["department_id"] == $resultDepartment['department_id']){ echo "selected";}?>
                                    value="<?php echo $resultDepartment['department_id'];?>"><?php echo $resultDepartment['department_th'];?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-3">
                    <label>ชื่อผู้ใช้</label>
                    <input type="text" name="username" class="form-control" value="<?php if (isset($_GET["user_id"])) {echo $assoc["username"];} ?>" required>
                </div>
                <div class="col-3">
                    <label>รหัสผ่าน</label>
                    <input type="password" onkeyup="chkPassword()" name="pass" class="form-control" <?php if (!isset($_GET["user_id"])) {echo "required";} ?>>
                </div>
                <div class="col-3">
                    <label>ยืนยันรหัสผ่าน</label>
                    <input type="password" id="rePass" onkeyup="chkPassword()" class="form-control" <?php if (!isset($_GET["user_id"])) {echo "required";} ?>>
                    <span id="pass" style="display: none" class="form-text text-success">รหัสผ่านตรงกัน</span>
                    <span id="fail" style="display: none" class="form-text text-danger">รหัสผ่านไม่ตรงกัน</span>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary mr-2">ยืนยัน</button>
            <button type="reset" class="btn btn-danger">ล้างข้อมูล</button>
        </div>
    </form>
</div>


<script type="application/javascript">
    function chkPassword(){
        let pass = $('[name=pass]').val();
        let rePass = $('#rePass').val();
        if (pass == rePass){
            if (pass != '' && rePass != ''){
                $('#pass').show();
                $('#fail').hide();
                return true;
            }
        }else {
            $('#pass').hide();
            $('#fail').show();
            return false;
        }
    }
</script>
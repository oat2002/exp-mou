<div class="card card-custom">
    <div class="card-header flex-wrap pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label"><?php echo $_GET["title"];?></h3>
        </div>
        <div class="card-toolbar">
            <a href="officer" class="btn btn-primary font-weight-bolder mb-5">
                <span class="svg-icon svg-icon-md"><i class="flaticon2-fast-back"></i></span>ย้อนกลับ</a>
        </div>
    </div>
    <form method="post" action="backend/employer/query.php" onsubmit="return chkPassword()">
        <div class="card-body">
            <input type="hidden" name="path" value="<?php echo $GLOBALS['path'];?>">
            <?php
            if (isset($_GET["employer_id"])) {
                $employer_id = $_GET["employer_id"];
                ?>
                <input type="hidden" name="user_id" value="<?php echo $employer_id; ?>">
                <?php
                $sql = mysqli_query($con, "SELECT * FROM employer WHERE employer_id='$employer_id'");
                $assoc = mysqli_fetch_assoc($sql);
            }
            ?>
            <div class="form-group row">
                <div class="col-4">
                    <label>ตำนำหน้าชื่อ</label>
                    <select name="title" class="select2 form-control" required>
                        <option value=""></option>
                        <?php
                        $title = mysqli_query($con,"SELECT * FROM m_title WHERE status_id='1'");
                        while ($resultTitle = mysqli_fetch_assoc($title)){
                            ?>
                            <option <?php if (isset($_GET["employer_id"]) && $assoc["title_id"] == $resultTitle['title_id']){ echo "selected";}?>
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
            </div>
            <div class="form-group row">
                <div class="col-12">
                    <label>ที่อยู่</label>
                    <input type="text" name="name" class="form-control" value="<?php if (isset($_GET["user_id"])) {echo $assoc["first_name"];} ?>" placeholder="ที่อยู่" required/>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-3">
                    <label>จังหวัด</label>
                    <select class="select2 form-control" name="province" id="province">
                        <option value="" selected disabled hidden>-- กรุณาเลือก --</option>
                        <?php
                        $province = mysqli_query($con, "SELECT * FROM m_province WHERE status_id='1' ORDER BY province_name ASC");
                        while ($rowProvince = mysqli_fetch_assoc($province)){
                            ?>
                            <option value="<?php echo $rowProvince["province_id"];?>"><?php echo $rowProvince["province_name"];?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="col-3">
                    <label>อำเภอ</label>
                    <select class="select2 form-control" name="district" id="district"></select>
                </div>
                <div class="col-3">
                    <label>ตำบล</label>
                    <select class="select2 form-control" name="subDistrict" id="subDistrict"></select>
                </div>
                <div class="col-3">
                    <label>รหัสไปรษณีย์</label>
                    <select class="select2 form-control" name="zipcode" id="zipcode"></select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-3">
                    <label>เบอโทรศัพท์</label>
                    <input type="text" name="tel" maxlength="10" class="form-control numberOnly" value="<?php if (isset($_GET["user_id"])) {echo $assoc["tel"];} ?>">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-3">
                    <label>เบอโทรศัพท์</label>
                    <select class="select2 form-control" name="typeWork" id="typeWork">
                        <option value="" selected disabled hidden>-- กรุณาเลือก --</option>
                        <?php
                        $typeWorkSql = mysqli_query($con, "SELECT * FROM m_type_work WHERE status_id='1' ORDER BY type_work_id ASC");
                        while ($typeWork = mysqli_fetch_assoc($typeWorkSql)){
                            ?>
                            <option value="<?php echo $typeWork["type_work_id"];?>"><?php echo $typeWork["type_work_th"];?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary mr-2">ยืนยัน</button>
            <button type="reset" class="btn btn-danger">ยกเลิก</button>
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
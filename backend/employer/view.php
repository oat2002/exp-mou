<div class="card card-custom">
    <?php
    if(isset($_GET["success"])){
        if ($_GET["success"] == 1){
            echo "<script>$(function (){alertSaveData();});</script>";
        }else if ($_GET["success"] == 2){
            echo "<script>$(function (){alertDeleteData();});</script>";
        }
    }
    ?>
    <div class="card-header flex-wrap pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label"><?php echo $title;?></h3>
        </div>
        <div class="card-toolbar">
            <a href="?url=employer/manage.php&title=เพิ่มข้อมูล" class="btn btn-primary font-weight-bolder mb-5">
                <span class="svg-icon svg-icon-md"><i class="flaticon2-plus"></i></span>เพิ่มข้อมูล</a>
        </div>
    </div>
    <div class="card-body">
        <?php
        $sql = mysqli_query($con,"SELECT * FROM employer WHERE status_id='1'");
        ?>
        <table class="table table-hover" id="tbView" style="display: block;overflow: auto;white-space: nowrap;margin-top: 13px; !important">
            <thead>
            <tr>
                <th>ลำดับ</th>
                <th>คำนำหน้าชื่อ</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>เบอโทรศัพท์</th>
                <th>ประเภทงาน</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            $i = 0;
            while ($assoc = mysqli_fetch_assoc($sql)){
                $titleId = $assoc["title_id"];
                $sqlTitle = mysqli_query($con,"SELECT * FROM m_title WHERE title_id = '$titleId'");
                $title = mysqli_fetch_array($sqlTitle);
                $typeWorkId = $assoc["type_work_id"];
                $sqlTypeWork = mysqli_query($con,"SELECT * FROM m_type_work WHERE type_work_id = '$typeWorkId'");
                $typeWork = mysqli_fetch_array($sqlTypeWork);
                ?>
                <tr>
                    <td style="width: 10%"><?php echo $i +=1;?></td>
                    <td><?php echo $title["title_name"];?></td>
                    <td><?php echo $assoc["first_name"];?></td>
                    <td><?php echo $assoc["last_name"];?></td>
                    <td><?php echo $assoc["tel"];?></td>
                    <td><?php echo $typeWork["type_work_th"];?></td>
                    <td style="width: 10%">
                        <a href="?url=employer/manage.php&title=แก้ไขข้อมูล&employer_id=<?php echo $assoc["employer_id"];?>" class="btn btn-light-success font-weight-bold mr-2"><i class="flaticon-eye icon-lg"></i></a>
                        <a href="#" onclick="confirmDel(<?php echo $assoc["employer_id"];?>, '<?php echo $GLOBALS['path'];?>')" class="btn btn-light-danger font-weight-bold mr-2"><i class="flaticon-delete"></i></a>
                    </td>
                </tr>

                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<script type="application/javascript">

    function confirmDel(user_id, path){
        Swal.fire({
            title: 'ยืนยันการลบ',
            text: "คุณต้องการลบใช่หรือไม่?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = "backend/officer/delete.php?user_id="+ user_id+"&path="+path;
            }
        })
    }
</script>

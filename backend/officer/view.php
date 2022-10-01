<div class="card card-custom">
    <?php
    if(isset($_GET["success"])){
        if ($_GET["success"] == 1){
            echo "<script>$(function (){alertSaveData();});</script>";
        }else if ($_GET["success"] == 2){
            echo "<script>$(function (){alertDeleteData();});</script>";
        }else if ($_GET["success"] == 3){
            echo "<script>$(function (){alertEditData();});</script>";
        }
    }
    ?>
    <div class="card-header flex-wrap pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label"><?php echo $title;?></h3>
        </div>
        <div class="card-toolbar">
            <a href="?url=officer/manage.php&title=เพิ่มข้อมูล" class="btn btn-primary font-weight-bolder mb-5">
                <span class="svg-icon svg-icon-md"><i class="flaticon2-plus"></i></span>เพิ่มข้อมูล</a>
        </div>
    </div>
    <div class="card-body">
        <?php
        $sql = mysqli_query($con,"SELECT u.user_id, u.first_name, u.last_name, u.tel, u.department_id, u.create_date, u.status_id, t.title_name, d.department_th 
        FROM users u 
        LEFT JOIN m_title t ON u.title_id=t.title_id 
        LEFT JOIN m_department d ON u.department_id=d.department_id 
        WHERE u.role_id='2' AND u.status_id='1'");
        ?>
            <table class="table table-hover" id="tbView" style="overflow: auto;white-space: nowrap;margin-top: 13px; !important">
                <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>คำนำหน้าชื่อ</th>
                    <th>ชื่อ</th>
                    <th>นามสกุล</th>
                    <th>เบอโทรศัพท์</th>
                    <th>ตำแหน่ง</th>
                    <th>วันที่</th>
                    <th>สถานะ</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                while ($assoc = mysqli_fetch_assoc($sql)){
                ?>
                <tr>
                    <td style="width: 10%"><?php echo $i +=1;?></td>
                    <td><?php echo $assoc["title_name"];?></td>
                    <td><?php echo $assoc["first_name"];?></td>
                    <td><?php echo $assoc["last_name"];?></td>
                    <td><?php echo $assoc["tel"];?></td>
                    <td><?php echo $assoc["department_th"];?></td>
                    <td><?php echo DateTime::createFromFormat('Y-m-d',$assoc["create_date"])->format('d-m-Y');?></td>
                    <td><?php
                        if ($assoc["status_id"] == 1){
                            echo "<span class='label font-weight-bold label-lg  label-light-success label-inline'>ใช้งาน</span>";
                        }elseif ($assoc["status_id"] == 2){
                            echo "<span class='label font-weight-bold label-lg  label-light-danger label-inline'>ไม่ใช้งาน</span>";
                        } ?></td>
                    <td style="width: 10%">
                        <a href="?url=officer/manage.php&title=แก้ไขข้อมูล&user_id=<?php echo $assoc["user_id"];?>" class="btn btn-light-warning font-weight-bold mr-2"><i class="flaticon2-edit icon-lg"></i></a>
                        <a href="#" onclick="confirmDel(<?php echo $assoc["user_id"];?>, '<?php echo $GLOBALS['path'];?>')" class="btn btn-light-danger font-weight-bold mr-2"><i class="flaticon-delete"></i></a>
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

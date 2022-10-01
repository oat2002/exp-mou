
<div class="card card-custom">
    <?php
    if(isset($_GET["st"])){
        if ($_GET["st"] == 1){
            ?>
            <div class="alert alert-custom alert-light-success fade show mb-2" role="alert" style="margin-top: -20px;">
                <div class="alert-icon"><i class="flaticon-refresh"></i></div>
                <div class="alert-text">บันทึกข้อมูลเสร็จสิ้น</div>
                <div class="alert-close">
                </div>
            </div>
            <?php
        }
    }
    ?>
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label"><?php echo $title;?></h3>
        </div>
        <div class="card-toolbar">
            <a href="?url=product/manage.php&title=เพิ่มข้อมูล" class="btn btn-primary font-weight-bolder">
											<span class="svg-icon svg-icon-md">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<circle fill="#000000" cx="9" cy="15" r="6" />
														<path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
													</g>
												</svg>
                                                <!--end::Svg Icon-->
											</span>เพิ่มข้อมูล</a>
        </div>
    </div>
    <div class="card-body">
        <?php
        $sql = mysqli_query($con,"SELECT * FROM form_product WHERE status_id='1'");
        ?>
            <table class="table table-hover" id="tbView">
                <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อสินค้า</th>
                    <th>ราคา</th>
                    <th>จำนวน</th>
                    <th>วันที่</th>
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
                    <td style="width: 40%"><?php echo $assoc["product_name"];?></td>
                    <td style="width: 15%"><?php echo $assoc["price"];?></td>
                    <td style="width: 15%"><?php echo $assoc["amount"];?></td>
                    <td style="width: 10%"><?php echo DateTime::createFromFormat('Y-m-d',$assoc["create_date"])->format('d-m-Y');?></td>
                    <td style="width: 10%">
                        <a href="index.php?url=product/manage.php&title=แก้ไขข้อมูล&product_id=<?php echo $assoc["product_id"];?>" class="btn btn-light-success font-weight-bold mr-2"><i class="flaticon-eye icon-lg"></i></a>
                        <a href="#" onclick="confirmDel(<?php echo $assoc["product_id"];?>)" class="btn btn-light-danger font-weight-bold mr-2"><i class="flaticon-delete"></i></a>
                    </td>
                </tr>

                <?php
                }
                ?>
                </tbody>
            </table>
    </div>
</div>
<script>

    function confirmDel(product_id){
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
                Swal.fire(
                    'ลบสำเร็จ!',
                    'คุณได้ลบข้อมูลแล้ว',
                    'success'
                )
                window.location = "product/delete.php?product_id="+ product_id;
            }
        })
    }

</script>

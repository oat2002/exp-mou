<form method="post" action="product/insert.php" enctype="multipart/form-data">
    <div class="card-header">
        <h3 class="card-title" style="margin-bottom: 0rem;"><?php echo $_GET["title"];?></h3>
    </div>
    <?php
    if (isset($_GET["product_id"])){
        $product_id = $_GET["product_id"];
        ?>
        <input type="hidden" name="product_id" value="<?php echo $product_id;?>">
    <?php
        $sql = mysqli_query($con,"SELECT * FROM form_product WHERE product_id='$product_id'");
        $assoc = mysqli_fetch_assoc($sql);
    }
    ?>
    <div class="card-body">
        <div class="form-group row">
            <div class="col-6">
                <label>ชื่อสินค้า</label>
                <input type="text" name="productName" class="form-control" value="<?php if (isset($_GET["product_id"])){echo $assoc["product_name"];}?>" placeholder="ชื่อสินค้า" required/>
            </div>
            <div class="col-3">
                <label>ราคาสินค้า</label>
                <input type="number" name="price" class="form-control" value="<?php if (isset($_GET["product_id"])){echo $assoc["price"];}?>" placeholder="ราคาสินค้า" required/>
            </div>
            <div class="col-3">
                <label>จำนวนสินค้า</label>
                <input type="number" name="amount" class="form-control" value="<?php if (isset($_GET["product_id"])){echo $assoc["amount"];}?>" placeholder="จำนวนสินค้า" required/>
            </div>
        </div>
        <div class="form-group">
            <label>รายละเอียดสินค้า</label>
            <div class="tinymce">
                <textarea rows="5" name="productDetail" class="summernote form-control">
                    <?php if (isset($_GET["product_id"])){echo $assoc["product_detail"];}?>
                </textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-6">
                <label>รูปภาพสินค้า</label>
                <input type="file" name="img" class="form-control"/>
                <span class="form-text text-muted">ขนาดรูปภาพไม่เกิน 3MB</span>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-success mr-2">ยืนยัน</button>
        <button type="reset" class="btn btn-secondary">ยกเลิก</button>
    </div>
</form>
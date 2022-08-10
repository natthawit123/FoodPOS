<?php
$ID = mysqli_real_escape_string($con,$_GET['ID']);
$sql = "
SELECT *
FROM tbl_product as p
WHERE p.p_id=$ID";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);
?>
<h4> ฟอร์มแก้ไขรายละเอียดสินค้า </h4>
<form action="food_form_edit_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">
    <div class="form-group">
      <div class="col-sm-2 control-label">
        ชื่อสินค้า :
      </div>
      <div class="col-sm-5">
        <input type="text" name="p_name" required class="form-control" autocomplete="off" value="<?php echo $row['p_name'];?>">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-2 control-label">
        รสชาติ :
      </div>
      <div class="col-sm-8">
        <input type="text" name="p_flavour" required class="form-control" value="<?php echo $row['p_flavour'];?>">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-2 control-label">
        รายละเอียดสินค้า :
      </div>
      <div class="col-sm-8">
        <textarea id="editor1" name="p_detail" rows="10" cols="80" style="visibility: hidden; display: none;">
        <?php echo $row['p_detail'];?>
        </textarea>
      </div>
    </div>
 <div class="form-group">
      <div class="col-sm-2 control-label">
        ราคาสินค้า :
      </div>
      <div class="col-sm-2">
        <input type="text" name="p_price" required class="form-control" value="<?php echo $row['p_price'];?>">
      </div>
      <div class="col-sm-1">
        บาท
      </div>
    </div>  
    <div class="form-group">
      <div class="col-sm-2 control-label">
        หน่วยนับสินค้า :
      </div>
      <div class="col-sm-3">
        <select name="p_unit" class="form-control" required>
          <option value="<?php echo $row["p_unit"];?>">
            <?php echo $row['p_unit'];?>
            <option value="t_id">-เลือกข้อมูล-</option>
             <option value="จาน">จาน</option>
              <option value="ถ้วย">ถ้วย</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-2 control-label">
          ภาพสินค้า :
        </div>
        <div class="col-sm-4">
          ภาพเก่า <br>
          <img src="../p_img/<?php echo $row['p_img'];?>" width="200px">
          <br><br>
          <input type="file" name="p_img"  accept="image/*" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-4">
          <input type="hidden" name="p_img2" value="<?php echo $row['p_img'];?>">
          <input type="hidden" name="p_id" value="<?php echo $row['p_id'];?>">
          <button type="submit" class="btn btn-primary">บันทึก</button>
        </div>
      </div>
      
    </form>
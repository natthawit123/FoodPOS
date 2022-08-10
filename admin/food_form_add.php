
<h4>ฟอร์มเพิ่มข้อมูลสินค้า/อาหาร </h4>
<form action="food_form_add_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">
  <div class="form-group">
    <div class="col-sm-2 control-label">
      ชื่อสินค้า :
    </div>
    <div class="col-sm-5">
      <input type="text" name="p_name" required class="form-control">
    </div>
  </div>
    <div class="form-group">
    <div class="col-sm-2 control-label">
      รสชาติ :
    </div>
    <div class="col-sm-8">
      <input type="text" name="p_flavour" required class="form-control">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-2 control-label">
      รายละเอียดสินค้า :
    </div>
    <div class="col-sm-8">
      <textarea id="editor1" name="p_detail" rows="10" cols="80" style="visibility: hidden; display: none;">                                       
      </textarea>
    </div>
  </div>
 <div class="form-group">
    <div class="col-sm-2 control-label">
      ราคาสินค้า :
    </div>
    <div class="col-sm-2">
      <input type="number" name="p_price" required class="form-control">
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
              <option value="t_id">-เลือกข้อมูล-</option>
              <option value="จาน">จาน</option>
              <option value="ถ้วย">ถ้วย</option>

            </select>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-2 control-label">
      รูปภาพสินค้า :
    </div>
    <div class="col-sm-4">
      <input type="file" name="p_img" required class="form-control" accept="image/*">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-3">
      <input type="hidden" name="ref_m_id" value="<?php echo $m_id;?>">
      <button type="submit" class="btn btn-primary">เพิ่มข้อมูล</button>
    </div>
  </div>
</form>
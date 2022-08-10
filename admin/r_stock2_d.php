<h4>เลือกช่วงเรียกดูรายงาน</h4>
<form action="" method="get" class="form-horizontal">
  <div class="form-group">
    <div class="col-sm-1 control-label">
      จาก
    </div>
    <div class="col-sm-2">
      <input type="date" name="ds" class="form-control" required>
    </div>
    <div class="col-sm-1 control-label">
      ถึง
    </div>
    <div class="col-sm-2">
      <input type="date" name="de" class="form-control" required>
    </div>
    <div class="col-sm-1">
      <button type="submit" name="act" value="stock2d" class="btn btn-info">เรียกดู</button>
    </div>
  </div>
</form>
<hr>
<?php
$ds= mysqli_real_escape_string($con,$_GET['ds']);
$de=mysqli_real_escape_string($con,$_GET['de']);
$querys = "
SELECT  p.p_id, p.p_name,p.p_price, SUM(o.d_qty) as qtotal, p.p_img, 
p.p_flavour, p.p_unit
FROM tbl_order_detail as o
INNER JOIN tbl_product_option  as b ON o.ref_op_id=b.op_id
INNER JOIN tbl_product  as p ON b.ref_p_id=p.p_id
WHERE p.ref_t_id=2
AND o.d_date BETWEEN '$ds 00:00:00.000000' AND '$de 23:59:59'
GROUP BY p.p_id
ORDER BY qtotal DESC" or die("Error:" . mysqli_error());
$results = mysqli_query($con, $querys);
echo '<h4>';
echo '<font color="red">';
echo 'จากวันที่ ';
echo date('d/m/Y',strtotime($ds));
echo ' '. ' ถึงวันที่ ';
echo date('d/m/Y',strtotime($de));
echo '</font>';
echo '</h4>';
echo '<h4> รายงานสต๊อกสินค้า-เมนูอร่อย (เลือกช่วงเวลา)</h4>';
echo ' <table id="example10" class="table table-bordered table-striped">';
  echo "<thead>";
    echo "<tr class='danger'>
      <th width='3%'>No.</th>
      <th width='7%'>รูป</th>
      <th width='30%'>ชื่อสินค้า</th>
      <th width='10%'><center>จำนวนที่ขายได้</center></th>
    </tr>";
  echo "</thead>";
  while($row = mysqli_fetch_array($results)) {
  echo "<tr>";
    echo "<td align='center'>" .$i +=1 .  "</td> ";
    echo "<td>"."<img src='../p_img/".$row['p_img']."' width='100%'>"."</td>";
    echo "<td>";
    echo "<a href='product.php?act=dt&ID=$row[0]' target='_blank'>"
     ."<b>" 
    .$row["p_name"]
    ."</b>"
    ."</a>" 
    ."<br>"
    .$row["p_flavour"]
    ."</td> ";
     echo "<td align='center'>" .$row["qtotal"] ."  " .$row["p_unit"] ."</td>"; 
  echo "</tr>";
  }
echo "</table>";
mysqli_close($con);
?>
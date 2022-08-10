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
      <button type="submit" name="act" value="stock1d" class="btn btn-info">เรียกดู</button>
    </div>
  </div>
</form>
<hr>
<?php
$querys = "
SELECT  p.p_id, p.p_name,p.p_price, SUM(o.d_qty) as qtotal, p.p_img,
p.p_flavour, p.p_unit
FROM tbl_order_detail as o
INNER JOIN tbl_product_option  as b ON o.ref_op_id=b.op_id
INNER JOIN tbl_product  as p ON b.ref_p_id=p.p_id
WHERE p.ref_t_id=1
GROUP BY p.p_id
ORDER BY qtotal DESC" or die("Error:" . mysqli_error());
//INNER JOIN tbl_product_option  as b ON o.ref_op_id=b.op_id
$results = mysqli_query($con, $querys);
echo '<h4> รายงานสต๊อกสินค้า-เครื่องดื่ม (ภาพรวม) </h4>';
echo ' <table id="example10" class="table table-bordered table-striped">';
  echo "<thead>";
    echo "<tr class='danger'>
      <th width='3%'>No.</th>
      <th width='7%'>รูป</th>
      <th width='30%'>ชื่อสินค้า</th>
      <th width='10%'><center>จำนวนที่ขายได้</center></th>
      <th width='10%'><center>รวม</center></th>
    </tr>";
  echo "</thead>";
  while($row = mysqli_fetch_array($results)) {
  echo "<tr>";
    echo "<td align='center'>" .$i +=1 .  "</td> ";
    echo "<td>"."<img src='../p_img/".$row[p_img]."' width='100%'>"."</td>";
    echo "<td>";
      echo "<a href='product.php?act=dt&ID=$row[0]' target='_blank'>"
        ."<b>"
        .$row["p_name"]
        ."</b>"
      ."</a>"
      ."<br>"
      .$row["p_flavour"];
    echo "</td> ";
    echo "<td>";
      $pid = $row['p_id'];
      $query2 = "
      SELECT t.op_name, SUM(o.d_qty) as qtotal
      FROM tbl_product_option  as t
      INNER JOIN tbl_product  as p ON t.ref_p_id=p.p_id
      INNER JOIN tbl_order_detail  as o ON t.op_id=o.ref_op_id
      WHERE t.ref_p_id=$pid
      GROUP BY t.op_id
      ORDER BY t.op_id ASC" or die("Error:" . mysqli_error());
      $result2 = mysqli_query($con, $query2);
      //echo $query2;
      while($rowo = mysqli_fetch_array($result2)) {
      echo $rowo['op_name'];
      echo '<font color="red">';
      echo ' '.' '.' '.$rowo['qtotal']. ' ';
      echo '</font>';
      echo ' แก้ว ';
      echo '<br>';
      }
    echo "</td>";
    echo "<td align='center'><b>" .$row["qtotal"] ."  " .$row["p_unit"] ."</b></td>";
  echo "</tr>";
  }
echo "</table>";
mysqli_close($con);
?>
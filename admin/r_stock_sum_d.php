<h4>เลือกช่วงเรียกดูรายงาน</h4>
<form action="" method="get" class="form-horizontal">
  <div class="form-group">
    <div class="col-sm-2 control-label">
      เลือกวันที่
    </div>
    <div class="col-sm-4">
      <input type="date" name="dn" class="form-control" required>
    </div>
    <div class="col-sm-1">
      <button type="submit" name="act" value="sum2" class="btn btn-info">เรียกดู</button>
    </div>
  </div>
</form>
<hr>
<?php
$dn=mysqli_real_escape_string($con,$_GET['dn']);

//food

$querys2 = "
SELECT  
p.p_id, 
p.p_name,
p.p_price, 
SUM(o.d_qty) as qtotal, 
SUM(o.d_price_total) as ptotal,
p.p_img,
p.p_flavour, 
p.p_unit
FROM tbl_order_detail as o
INNER JOIN tbl_product  as p ON o.ref_op_id=p.p_id
WHERE o.d_date='$dn' 
GROUP BY p.p_id
ORDER BY qtotal DESC" or die("Error:" . mysqli_error());
//INNER JOIN tbl_product_option  as b ON o.ref_op_id=b.op_id
$results2 = mysqli_query($con, $querys2);
echo '<h4> ยอดขายวันที่ ' . date('d/m/Y',strtotime($dn))  .'</h4>';
echo ' <table id="example10" class="table table-bordered table-striped">';
  echo "<thead>";
    echo "<tr class='danger'>
      <th width='3%'>No.</th>
      
      <th width='20%'>ชื่อสินค้า</th>
      <th width='10%'><center>จำนวน</center></th>
      <th width='10%'><center>ราคา</center></th>
    </tr>";
    //<th width='7%'>รูป</th>
  echo "</thead>";
  while($row = mysqli_fetch_array($results2)) {
    @$k +=1;
  echo "<tr>";
    echo "<td align='center'>" .$k .  "</td> ";
    //echo "<td>"."<img src='../p_img/".$row[p_img]."' width='100%'>"."</td>";
    echo "<td>"
        ."<b>"
        .$row["p_name"]
        ."</b>";
    echo "</td> ";
    /*
    echo "<td>";
      $pid = $row['p_id'];
      $query2 = "
      SELECT t.op_name, SUM(o.d_qty) as qtotal
      FROM tbl_product_option  as t
      INNER JOIN tbl_product  as p ON t.ref_p_id=p.p_id
      INNER JOIN tbl_order_detail  as o ON t.op_id=o.ref_op_id
      WHERE t.ref_p_id=$pid
      AND o.d_date='$dn'
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
     */
     echo "<td align='center'><b>" .$row["qtotal"] ."  " .$row["p_unit"] ."</b></td>";
     echo "<td align='center'><b>" .$row["ptotal"] ."</b></td>";
  echo "</tr>";
  @$ftotal +=$row["ptotal"];
  }
   echo "<tr>";
    echo "<td align='right' colspan='4'>";
    echo 'รวม  ';
    echo '<b>';
    echo number_format($ftotal);
    echo '</b>';
    echo  ' บาท';
    echo  "</td> ";
   echo "<tr>";
echo "</table>";

echo '<p align="right">';
echo '<b>';
echo '<font color="red">';
echo 'รวมราคาขายทั้งหมด = ';
echo number_format($ftotal); 
echo ' บาท';
echo '</font>';
echo '</b>';
echo '</p>';

mysqli_close($con);
?>
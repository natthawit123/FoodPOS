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
      <button type="submit" name="act" value="alld" class="btn btn-info">เรียกดู</button>
    </div>
  </div>
</form>
<hr>
<?php
$query = "
SELECT 
o.order_id as oid, o.ref_m_id, o.ref_s_id,o.order_date,
d.ref_order_id , COUNT(d.ref_order_id) as coid, SUM(d.d_price_total) as ctotal,
s.s_name,m.m_name,m.m_lastname,m.m_phone 
FROM tbl_orders  as o
INNER JOIN  tbl_order_detail as d ON o.order_id=d.ref_order_id
INNER JOIN  tbl_status as s ON o.ref_s_id=s.s_id 
LEFT JOIN  tbl_member as m ON o.ref_m_id=m.m_id
WHERE o.ref_s_id>=1
GROUP BY o.order_id
ORDER BY o.order_id DESC
" or die("Error:" . mysqli_error());
$result = mysqli_query($con, $query);


//print_r($result);
//echo $query;

// exit;

echo '<div class="col-sm-7">';
echo '<h4>รายการขายทั้งหมด</h4>';

echo ' <table id="example1" class="table table-bordered table-striped table-hover">';
  echo "<thead>";
    echo "<tr class='success'>
      <th width='5%'><center>OrderID</center></th>
      <th width='7%'><center>รายการ</center></th>
      <th width='10%'><center>ราคา</center></th>
      <th width='10%'><center>สถานะ</center></th>
      <th width='25%'><center>ว/ด/ป</center></th>
      <th width='10%'><center>เปิดดู</center></th>
    </tr>";
  echo "</thead>";
  while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
    echo "<td align='center'>".$row["oid"]."</td> ";
    echo "<td align='center'>".$row["coid"]."</td> ";
    echo "<td align='right'>" .$row["ctotal"]."</td> ";
    echo "<td align='center'>" .$row["s_name"]. "</td> ";
    echo "<td align='center'>" 
    .date('d/m/Y',strtotime($row["order_date"]))
    . "</td> ";
    echo "<td align='center'><a href='print.php?act=print&order_id=$row[0]&bill=detail' class='btn btn-info btn-xs' target='_blank'>เปิดดู</a></td> ";
    
echo "</tr>";
$stotal += $row["ctotal"];
}
echo "</table>";
echo '<h4 style="color:red">';
echo 'ยอดขายรวม '.number_format($stotal,2). ' บาท ';
echo '</h4>';
echo '</div>';
mysqli_close($con);
?>
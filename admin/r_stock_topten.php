
<?php
$querys = "
SELECT  p.p_id, p.p_name,p.p_price, SUM(o.d_qty) as qtotal, p.p_img, 
p.p_flavour, p.p_unit
FROM tbl_order_detail as o
INNER JOIN tbl_product_option  as b ON o.ref_op_id=b.op_id
INNER JOIN tbl_product  as p ON b.ref_p_id=p.p_id
GROUP BY p.p_id
ORDER BY qtotal DESC LIMIT 10" or die("Error:" . mysqli_error());
$results = mysqli_query($con, $querys);
echo '<h4> รายงานสินค้าขายดี 10 อันดับ</h4>';
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
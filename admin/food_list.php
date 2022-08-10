<?php
$query = "
SELECT * FROM tbl_product as p 
ORDER BY p.p_id DESC" or die("Error:" . mysqli_error());
$result = mysqli_query($con, $query);
echo ' <table id="example1" class="table table-bordered table-striped">';
  echo "<thead>";
    echo "<tr class='danger'>
      <th width='3%'>No.</th>
      <th width='7%'>รูป</th>
      <th width='60%'>ชื่อสินค้า</th>
       <th width='7%'>ราคา</th>
      <th width='3%'>แก้ไข</th>
      <th width='3%'>ลบ</th>
    </tr>";
  echo "</thead>";
  while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
    echo "<td align='center'>" .$i +=1 .  "</td> ";
    echo "<td>"."<img src='../p_img/".$row['p_img']."' width='100%'>"."</td>";
    echo "<td>".$row["p_name"]
    ."<br>"
    .$row["p_flavour"]
    ."</td> ";
    echo "<td>";
     $pid =  $row['p_id'];
             echo '<font color="red">'; 
             echo $row['p_price']. ' บ. ';
             echo '</font>';
    echo "</td> ";
    echo "<td><a href='food.php?act=edit&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a>
    </td> ";
    echo "<td><a href='food_del_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
  echo "</tr>";
  }
echo "</table>";
mysqli_close($con);
?>
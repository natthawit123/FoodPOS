<?php
$query = "SELECT * FROM tbl_member WHERE m_level='member' ORDER BY m_id DESC" or die("Error:" . mysqli_error());
$result = mysqli_query($con, $query);
echo ' <table id="example1" class="table table-bordered table-striped">';
  echo "<thead>";
    echo "<tr class='danger'>
      <th width='5%'>No.</th>
      <th width='7%'>IMG</th>
      <th width='10%'>user</th>
      <th width='40%'>ชื่อ-สกุล</th>
      <th width='10%'>แก้รหัส</th>
      <th width='5%'>แก้ไข</th>
      <th width='5%'>ลบ</th>
    </tr>";
  echo "</thead>";
  while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
    echo "<td align='center'>" .$i +=1 ."</td> ";
    echo "<td>"."<img src='../people_img/".$row[m_img]."' width='100%'>"."</td>";
    echo "<td>" .$row["m_username"]."</td> ";
    echo "<td>" .$row["m_firstname"].$row["m_name"] 
    .' '.$row["m_lastname"] 
    .'<br>'
    .' ที่อยู่ '.$row["m_address"] 
    .'<br>'
    .' เบอร์  '.$row["m_phone"] 
    .' อีเมล  '.$row["m_email"] 
    . "</td> ";
     echo "<td><a href='member.php?act=rwd&ID=$row[0]' class='btn btn-primary btn-xs'>แก้รหัส</a></td> ";
    echo "<td><a href='member.php?act=edit&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a></td> ";
  echo "<td><a href='member_del_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
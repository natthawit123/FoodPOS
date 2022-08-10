<?php
$query = "SELECT * FROM tbl_member WHERE m_level IN('admin','staff') ORDER BY m_id DESC" or die("Error:" . mysqli_error());
$result = mysqli_query($con, $query);
echo ' <table id="example1" class="table table-bordered table-striped">';
  echo "<thead>";
    echo "<tr class='danger'>
      <th width='5%'>ลำดับ</th>
      <th width='7%'>รูปภาพ</th>
      <th width='10%'>Username</th>
      <th width='40%'>ชื่อ-สกุล</th>
      <th width='10%'>ตำแหน่ง</th>
      <th width='10%'>รหัสผ่าน</th>
      <th width='5%'>ข้อมูล</th>
      <th width='5%'>ลบ</th>
    </tr>";
  echo "</thead>";
  while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
    echo "<td align='center'>" .$i +=1 ."</td> ";
    echo "<td>"."<img src='../people_img/".$row['m_img']."' width='100%'>"."</td>";
    echo "<td>" .$row["m_username"]."</td> ";
    echo "<td>" .$row["m_firstname"].$row["m_name"] 
    .' '.$row["m_lastname"] 
    .'<br>'
    .' ที่อยู่ '.$row["m_address"] 
    .'<br>'
    .' เบอร์  '.$row["m_phone"] 
    .' อีเมล  '.$row["m_email"] 
    . "</td> ";
    echo "<td>";
    $ml = $row["m_level"];
    if($ml=='Admin'){
      echo 'ผู้จัดการ';
    }else{
      echo 'พนักงาน';
    }
    echo "</td> ";
     echo "<td><a href='emp.php?act=rwd&ID=$row[0]' class='btn btn-primary btn-xs'>เปลี่ยน</a></td> ";
    echo "<td><a href='emp.php?act=edit&ID=$row[0]' class='btn btn-warning btn-xs'>แก้ไข</a></td> ";
  echo "<td><a href='emp_del_db.php?ID=$row[0]' onclick=\"return confirm('Do you want to delete this record? !!!')\" class='btn btn-danger btn-xs'>ลบ</a></td> ";
echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
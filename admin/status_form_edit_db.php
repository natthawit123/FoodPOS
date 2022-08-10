<meta charset="utf-8">
<?php
include('../condb.php');
	$s_id = mysqli_real_escape_string($con,$_POST['s_id']);
	$s_name = mysqli_real_escape_string($con,$_POST["s_name"]);
	

	$sql = "UPDATE  tbl_status SET 
	s_name='$s_name'
	WHERE s_id=$s_id
	";

	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
	mysqli_close($con);
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไขข้อมูลสำเร็จ');";
	echo "window.location = 'status.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'status.php'; ";
	echo "</script>";
}
?>
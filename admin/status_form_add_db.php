<meta charset="utf-8">
<?php
include('../condb.php');
	$s_name = mysqli_real_escape_string($con,$_POST["s_name"]);

	$check = "
	SELECT  s_name 
	FROM tbl_status  
	WHERE s_name = '$s_name' 
	";
    $result1 = mysqli_query($con, $check) or die(mysqli_error());
    $num=mysqli_num_rows($result1);

    if($num > 0)
    {
    echo "<script>";
    echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
    echo "window.history.back();";
    echo "</script>";
    }else{
	
	$sql = "INSERT INTO tbl_status
	(s_name)
	VALUES
	('$s_name')";
	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

}
	mysqli_close($con);
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('เพิ่มข้อมูลสำเร็จ');";
	echo "window.location = 'status.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'status.php'; ";
	echo "</script>";
}
?>
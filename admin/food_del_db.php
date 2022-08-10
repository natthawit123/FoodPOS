<meta charset="utf-8">
<?php
include('../condb.php');
	$ID  = mysqli_real_escape_string($con,$_GET["ID"]);

	$sql = "DELETE FROM tbl_product WHERE p_id=$ID";
	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());	
	mysqli_close($con);
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "window.location = 'food.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'food.php'; ";
	echo "</script>";
}
?>
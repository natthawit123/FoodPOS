<meta charset="utf-8">
<?php
include('../condb.php');
	
	$p_id = mysqli_real_escape_string($con,$_POST["p_id"]);
	$p_name = mysqli_real_escape_string($con,$_POST["p_name"]);
	$p_detail = mysqli_real_escape_string($con,$_POST["p_detail"]);
	$p_unit = mysqli_real_escape_string($con,$_POST["p_unit"]);
	$p_img2 = mysqli_real_escape_string($con,$_POST['p_img2']);
	$p_flavour = mysqli_real_escape_string($con,$_POST['p_flavour']);
	$p_price = mysqli_real_escape_string($con,$_POST['p_price']);

    $date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$p_img = (isset($_POST['p_img']) ? $_POST['p_img'] : '');
	$upload=$_FILES['p_img']['name'];
	if($upload !='') { 

		$path="../p_img/";
		$type = strrchr($_FILES['p_img']['name'],".");
		$newname =$numrand.$date1.$type;
		$path_copy=$path.$newname;
		$path_link="../p_img/".$newname;
		move_uploaded_file($_FILES['p_img']['tmp_name'],$path_copy);  
	}else{
		$newname=$p_img2;
	}

	$sql = "UPDATE tbl_product SET 
	p_name='$p_name',
	p_detail='$p_detail',
	p_unit='$p_unit',
	p_img='$newname',
	p_flavour='$p_flavour',
	p_price='$p_price'
	WHERE p_id=$p_id
	";

	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

	mysqli_close($con);
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('แก้ไขข้อมูลสำเร็จ');";
	echo "window.location = 'food.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "alert('Error!!');";
	echo "window.location = 'food.php'; ";
	echo "</script>";
}
?>





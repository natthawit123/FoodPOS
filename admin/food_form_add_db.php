<meta charset="utf-8">
<?php
include('../condb.php');

	$ref_m_id = mysqli_real_escape_string($con,$_POST["ref_m_id"]);
	$p_name = mysqli_real_escape_string($con,$_POST["p_name"]);
	$p_detail = mysqli_real_escape_string($con,$_POST["p_detail"]);
	$p_price = mysqli_real_escape_string($con,$_POST["p_price"]);
	$p_unit = mysqli_real_escape_string($con,$_POST["p_unit"]);
	$p_flavour = mysqli_real_escape_string($con,$_POST['p_flavour']);
	

	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$p_img = (isset($_POST['p_img']) ? $_POST['p_img'] : '');
	$upload=$_FILES['p_img']['name'];
	if($upload !='') { 
	
		$path="../p_img/";
		$type = strrchr($_FILES['p_img']['name'],".");
		$newname ='f'.$numrand.$date1.$type;
		$path_copy=$path.$newname;
		$path_link="../p_img/".$newname;
		move_uploaded_file($_FILES['p_img']['tmp_name'],$path_copy);  
	}

	$sql = "INSERT INTO tbl_product
	(
	p_price,
	ref_m_id,
	p_name,
	p_detail,
	p_unit,
	p_img,
	p_flavour
	)
	VALUES
	(
	'$p_price',
	'$ref_m_id',
	'$p_name',
	'$p_detail',
	'$p_unit',
	'$newname',
	'$p_flavour'
	)";

	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

	mysqli_close($con);

	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('เพิ่มข้อมูลสำเร็จ');";
	echo "window.location = 'food.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'food.php'; ";
	echo "</script>";
}
?>
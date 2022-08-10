<meta charset="utf-8">
<?php
include('../condb.php');
	$m_username = mysqli_real_escape_string($con,$_POST["m_username"]);
	$m_password = mysqli_real_escape_string($con,$_POST["m_password"]);
	$m_firstname = mysqli_real_escape_string($con,$_POST["m_firstname"]);
	$m_name = mysqli_real_escape_string($con,$_POST["m_name"]);
	$m_lastname = mysqli_real_escape_string($con,$_POST["m_lastname"]);
	$m_address = mysqli_real_escape_string($con,$_POST["m_address"]);
	$m_phone = mysqli_real_escape_string($con,$_POST["m_phone"]);
	$m_email = mysqli_real_escape_string($con,$_POST["m_email"]);
	$m_level = mysqli_real_escape_string($con,$_POST["m_level"]);

	$date1 = date("Ymd_His");
	$numrand = (mt_rand());
	$m_img = (isset($_POST['m_img']) ? $_POST['m_img'] : '');
	$upload=$_FILES['m_img']['name'];
	if($upload !='') { 
	
		$path="../people_img/";
		$type = strrchr($_FILES['m_img']['name'],".");
		$newname ='p'.$numrand.$date1.$type;
		$path_copy=$path.$newname;
		$path_link="../people_img/".$newname;
		move_uploaded_file($_FILES['m_img']['tmp_name'],$path_copy);  
	}else{
		$newname='';
	}

	$check = "
	SELECT m_username, m_email 
	FROM tbl_member  
	WHERE m_username = '$m_username' 
	OR m_email='$m_email'
	";
    $result1 = mysqli_query($con, $check) or die(mysqli_error());
    $num=mysqli_num_rows($result1);

    if($num > 0)
    {
	    echo "<script>";
	    echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มข้อมูลใหม่อีกครั้ง !');";
	    echo "window.history.back();";
	    echo "</script>";
    }else{

	$sql = "INSERT INTO tbl_member
	(
	m_username,
	m_password,
	m_firstname,
	m_name,
	m_lastname,
	m_address,
	m_phone,
	m_email,
	m_img,
	m_level
	)
	VALUES
	(
	'$m_username',
	'$m_password',
	'$m_firstname',
	'$m_name',
	'$m_lastname',
	'$m_address',
	'$m_phone',
	'$m_email',
	'$newname',
	'$m_level'
	)";

	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

	}
	mysqli_close($con);

	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('เพิ่มข้อมูลเรียบร้อย');";
	echo "window.location = 'emp.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'emp.php'; ";
	echo "</script>";
}
?>
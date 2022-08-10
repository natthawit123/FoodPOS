<?php
	error_reporting( error_reporting() & ~E_NOTICE );
    session_start();  
	include('../condb.php');

	// echo "<pre>";
	// print_r($_SESSION);
	// echo "<hr>";
	// print_r($_POST);
	// echo "</pre>";

	// exit;
 
?>

<meta http-equiv="content-Type" content="text/html; charset=utf-8" />

<!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
<?php
   
    $ref_m_id = $_POST['staff_id'];
    $order_time_rev  ='';
	$p_qty = $_POST["p_qty"];
	$order_total = $_POST["ptotal"];
	$order_date = date("Y-m-d H:i:s");
	$ref_s_id = 3;

	
	//บันทึกการสั่งซื้อลงใน order_detail
	mysqli_query($con, "BEGIN"); 
	$sqlo = "INSERT  INTO tbl_orders VALUES
	(
	NULL,  
	'$ref_m_id',
	'$ref_s_id',
	'$order_total',
	'$order_date'
	)";
	
	$query1	= mysqli_query($con, $sqlo) or die ("Error in query: $sqlo " . mysqli_error());
	

// echo $sqlo;
// exit;

	$sql2 = "SELECT MAX(order_id) AS order_id FROM tbl_orders  
	WHERE order_total=$order_total";
	$query2	= mysqli_query($con, $sql2) or die ("Error in query: $sql2 " . mysqli_error());
	$row = mysqli_fetch_array($query2);
	$ref_order_id = $row['order_id'];
	
	

// echo $sql2;
// echo '<br>';
// echo $order_id;
 
//  exit;


	foreach($_SESSION['shopping_cart'] as $p_id=>$p_qty)
	 
	{

	//print_r($_SESSION['shopping_cart']);



		




		$sql3= "
		SELECT *
		FROM tbl_product
		WHERE p_id=$p_id";
		$query3 = mysqli_query($con, $sql3) or die ("Error in query: $sql3 " . mysqli_error());
		$row3 = mysqli_fetch_array($query3);
        	$mprice = $row3['p_price'];
       

		//echo $sql3;
		//print_r($row3);

		 //exit;

		//$disc =	$row3['p_price'] * $row3['p_discount']/100;
		//$mprice = $row3['op_price'];
		//$nprice = $row3['p_price'];
		$d_price_total=$mprice*$p_qty;
		$d_date = date('Y-m-d');

		
		$sql4	= "INSERT INTO  tbl_order_detail 
		values(null, 
		'$ref_order_id', 
		'$p_id', 
		'$p_qty', 
		'$d_price_total',
		'$d_date'
	)";
		$query4	= mysqli_query($con, $sql4) or die ("Error in query: $sql4 " . mysqli_error());

		// echo $sql4;

		// exit;
	}



	//insert staff log

	$sql5= "INSERT INTO  tbl_orders_log 
		(ref_order_id, ref_m_id)
		values
		($ref_order_id,$ref_m_id)";
		$query5	= mysqli_query($con, $sql5) or die ("Error in query: $sql5 " . mysqli_error());


	
	if($query1 && $query4){
		mysqli_query($con, "COMMIT");
		//$msg = "บันทึกข้อมูลเรียบร้อยแล้ว ";
		foreach($_SESSION['shopping_cart'] as $p_id)
		{	
			unset($_SESSION['shopping_cart']);
		}
	}
	else{
		mysqli_query($con, "ROLLBACK");  
		$msg = "บันทึกข้อมูลไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";	
	}

	mysqli_close($con);

	// exit();
?>


<script type="text/javascript">
	//alert("<?php // echo $msg;?>");
	window.location ='print.php?order_id=<?php echo $ref_order_id;?>&act=print';
</script>

 
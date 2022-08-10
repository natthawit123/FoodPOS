<!-- Start menu Area -->
<style type="text/css">
	input[type="number"], text {
  background-color : white; 
  color: red;
  text-align: center;
}

</style>
<?php 
    session_start(); 
    $p_id = mysqli_real_escape_string($con,$_REQUEST['p_id']); 
	$act = mysqli_real_escape_string($con,$_REQUEST['act']);

	if($act=='add' && !empty($p_id))
	{
		if(!isset($_SESSION['shopping_cart']))
		{
			 
			$_SESSION['shopping_cart']=array();
		}else{
		 
		}
		if(isset($_SESSION['shopping_cart'][$p_id]))
		{
			$_SESSION['shopping_cart'][$p_id]++;
		}
		else
		{
			$_SESSION['shopping_cart'][$p_id]=1;
		}

		 //    echo "<script>";
			// echo "window.location ='pos.php'; ";
			// echo "</script>";
	}

	if($act=='remove' && !empty($p_id))  //ยกเลิกการสั่งซื้อ
	{
		unset($_SESSION['shopping_cart'][$p_id]);
	}

	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $p_id=>$amount)
		{
			$_SESSION['shopping_cart'][$p_id]=$amount;
		}
	}
	
	
	//ยกเลิกตะกร้าสินต้า 
	if($act=='Cancel-Cart'){
		unset($_SESSION['shopping_cart']);
	}


	//convert 
	function Convert($amount_number)
{
$amount_number = number_format($amount_number, 2, ".","");
$pt = strpos($amount_number , ".");
$number = $fraction = "";
if ($pt === false)
$number = $amount_number;
else
{
$number = substr($amount_number, 0, $pt);
$fraction = substr($amount_number, $pt + 1);
}
$ret = "";
$baht = ReadNumber ($number);
if ($baht != "")
$ret .= $baht . "บาท";
$satang = ReadNumber($fraction);
if ($satang != "")
$ret .=  $satang . "สตางค์";
else
$ret .= "ถ้วน";
return $ret;
}
function ReadNumber($number)
{
$position_call = array("แสน", "หมื่น", "พัน", "ร้อย", "สิบ", "");
$number_call = array("", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
$number = $number + 0;
$ret = "";
if ($number == 0) return $ret;
if ($number > 1000000)
{
$ret .= ReadNumber(intval($number / 1000000)) . "ล้าน";
$number = intval(fmod($number, 1000000));
}
$divider = 100000;
$pos = 0;
while($number > 0)
{
$d = intval($number / $divider);
$ret .= (($divider == 10) && ($d == 2)) ? "ยี่" :
((($divider == 10) && ($d == 1)) ? "" :
((($divider == 1) && ($d == 1) && ($ret != "")) ? "เอ็ด" : $number_call[$d]));
$ret .= ($d ? $position_call[$pos] : "");
$number = $number % $divider;
$divider = $divider / 10;
$pos++;
}
return $ret;
}
	
	
	?>

      <form id="frmcart" name="frmcart" method="post" action="?act=update" class="form-horizontal">
        <table class="table table-hover">
        <tr>
          <td align="center" bgcolor="#EAEAEA"><strong>No.</strong></td>
          <td bgcolor="#EAEAEA"><strong>สินค้า</strong></td>
          <td align="right" bgcolor="#EAEAEA"><strong>ราคา</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>จำนวน</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>รวม</strong></td>
          <td align="center" bgcolor="#EAEAEA"><strong>ลบ</strong></td>
        </tr>
        <?php

if(!empty($_SESSION['shopping_cart']))
{
 
	foreach($_SESSION['shopping_cart'] as $p_id=>$p_qty)
	{
		$sql = "SELECT *  
		FROM tbl_product 
		WHERE p_id=$p_id";
		$query = mysqli_query($con, $sql);
		while($row = mysqli_fetch_array($query))
		{
        	$mprice = $row['p_price'];
		$sum = $mprice * $p_qty;
		$total += $sum;
		echo "<tr>";
		echo "<td bgcolor='#EAEAEA'>";
        echo $i += 1;
        echo ".";
		echo "</td>";
		echo "<td width='334' bgcolor='#EAEAEA'>"." "; 

		 
	    echo $row["p_name"]; 
		echo "</td>";
		echo "<td width='100' align='right' bgcolor='#EAEAEA'>" . number_format($mprice,2) . "</td>";
		echo "<td width='100' align='right' bgcolor='#EAEAEA'>";  
		echo "<input type='number' name='amount[$p_id]' value='$p_qty' class='form-control'/></td>";
		echo "<td width='100' align='right' bgcolor='#EAEAEA'><b>" .number_format($sum,2)."</b></td>";
		echo "<td width='100' align='center' bgcolor='#EAEAEA'><a href='pos.php?p_id=$p_id&act=remove' class='btn btn-danger btn-xs'>ลบ</a></td>";
		
		echo "</tr>";
		}
 
	}
	echo "<tr>";
  	echo "<td colspan='4' bgcolor='#e0d0d0' align='right'>";
  	echo 'รวม ('. Convert($total).')';
  	echo "</td>";
  	echo "<td align='right' bgcolor='#e0d0d0'>";
  	echo "<b>";
  	echo  number_format($total,2);
  	echo "</b>";
  	echo "</td>";
  	echo "<td align='left' bgcolor='#e0d0d0'>บาท</td>";
	echo "</tr>";
}
?>
        <tr>
          <td></td>
          <td colspan="6" align="right">
          
          <a href="pos.php?act=Cancel-Cart" class="btn btn-danger"  onclick="return confirm('ยืนยัน');"> ยกเลิกออร์เดอร์ </a>
          <?php if($total > 0){ ?>
          	<button type="submit" name="button" id="button" class="btn btn-warning"> คำนวณราคาใหม่ </button>
            <button type="button" name="Submit2"  onclick="window.location='confirm.php';" class="btn btn-primary"> 
            <span class="glyphicon glyphicon-shopping-cart"> </span> สั่งซื้อ 
        </button>
    <?php } ?>

            </td>
        </tr>
    </b>
</strong>
</td>
</tr>
</table>
      </form>
 
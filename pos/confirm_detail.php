<?php   session_start(); ?>

<hr>


				<form action="saveorder.php" class="form-horizontal" method="post">
					<div class="form-group row">
						<div class="col-md-2 control-label"> ว/ด/ป </div>
						<div class="col-md-3">
							<input type="text" class="form-control" name="o_date"  readonly value="<?php echo date('d-m-Y');?>">
						</div>
						<div class="col-md-1 control-label"> พนง. </div>
						<div class="col-md-3">
							<input type="text" class="form-control" name="staff_name"  value="<?php echo $m_name;?>" readonly>
							<input type="hidden" class="form-control" name="m_id" value="<?php echo $m_idq;?>">
						</div>
						<div class="col-md-1">
							<button type="submit" class="btn btn-primary" onclick="return confirm('ยืนยัน');">ยืนยันการสั่ง</button></div>
					</div>
					
				<table  align="center" class="table table-hover">
					<tr bgcolor="#EAEAEA">
						<td align="center" width="5%">ลำดับ</td>
						<td align="center" width="5%"><strong>image</strong></td>
						<td align="center" width="25%">สินค้า</td>
						<td align="right" width="10%">ราคา</td>
						<td align="right" width="5%">จำนวน</td>
						<td align="right" width="10%">รวม/รายการ</td>
					</tr>
					<?php
						$total=0;
						foreach($_SESSION['shopping_cart'] as $p_id=>$p_qty)
						{

					$sql = "SELECT *
						FROM tbl_product
						WHERE p_id=$p_id";
					$query = mysqli_query($con, $sql);
					$row	= mysqli_fetch_array($query);
					//print_r($row);


				 
						$mprice = $row['p_price'];
						 
					$sum = $mprice * $p_qty;
					$total	+= $sum;
					$img = $row['p_img'];
					echo "<tr>";
					echo "<td align='center'>";
					echo  $i += 1;
					echo "</td>";
					echo "<td width='100'>";
					echo "<img src='../p_img/".$img."'  width='100%'/>";
					echo "</td>";
					echo "<td width='334'>"." "; 

		 
		echo $row["p_name"];  	
		 

		echo "</td>";
		echo "<td align='right'>" .number_format($mprice,2) ."</td>";
		echo "<td align='right'>$p_qty</td>";
		echo "<td align='right'>".number_format($sum,2)."</td>";
					echo "</tr>";
						}
						echo "<tr bgcolor='#e0d0d0'>";
								echo "<td  align='right' colspan='5'><b>รวม</b></td>";
								echo "<td align='right'>"."<b>".number_format($total,2)."</b>"."</td>";
					echo "</tr>";
					?>
				</table>
				<input type="hidden" name="ptotal" value="<?php echo $total;?>">
				<input type="hidden" name="staff_id" value="<?php echo $m_id;?>">
				</form>

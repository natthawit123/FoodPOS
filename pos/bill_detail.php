<?php
$order_id = mysqli_real_escape_string($con,$_GET['order_id']);
$sqlb = "
SELECT * FROM tbl_orders as o 
INNER JOIN tbl_member as m ON o.ref_m_id=m.m_id
WHERE o.order_id=$order_id
";
$resultb = mysqli_query($con, $sqlb);
$rowb = mysqli_fetch_array($resultb);
extract($rowb);
?>
<section>
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-60 col-lg-10">
				<div class="title">
					<h1 class="mb-10">รายการสั่งทำ</h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8">
				<form action="order_rev.php" class="form-horizontal" method="post">
					<div class="form-group row">
						<div class="col-md-2 control-label"> Bill ID </div>
						<div class="col-md-3">
							<input type="text" class="form-control" name="order_id"  value="000<?php echo $_GET['order_id'];?>" readonly>
						</div>
						<div class="col-md-1"> ว/ด/ป</div>
						<div class="col-md-3">
							<input type="text" class="form-control" name="o_time" value="<?php echo date('d/m/Y H:i:s',strtotime($rowb['order_date']));?>" readonly>
						</div>
						<div class="col-md-1"> น. </div>
						<div class="col-md-1">
							<input type="hidden" name="staff_id" value="<?php echo $m_id;?>">
						<button  class="btn btn-primary" onclick="return confirm('ยืนยัน');">รับ Order </button></div>
					</div>
					<div class="form-group row">
						<div class="col-md-2 control-label"> ว/ด/ป ที่มารับ </div>
						<div class="col-md-3">
							<input type="text" class="form-control" name="o_date"  value="<?php echo date('d/m/Y',strtotime($rowb['order_date_rev']));?>" readonly>
						</div>
						<div class="col-md-1"> เวลา </div>
						<div class="col-md-3">
							<input type="text" class="form-control" name="o_time" value="<?php echo $rowb['order_time_rev'];?>" readonly>
						</div>
						<div class="col-md-1"> น. </div>
					</div>
					
					<div class="form-group row">
						<div class="col-md-2 control-label"> ผู้สั่ง </div>
						<div class="col-md-3">
							<input type="text" class="form-control" name="m_name"  readonly value="<?php echo $rowb['m_name'];?>"  required>
						</div>
						<div class="col-md-1 control-label"> โทร </div>
						<div class="col-md-3">
							<input type="text" class="form-control" name="m_phone"  readonly value="<?php echo $rowb['m_phone'];?>"  required>
						</div>
						
					</div>
					
					<table  align="center" class="table table-hover">
						<tr bgcolor="#EAEAEA">
							<td align="center">ลำดับ</td>
							<td align="center"><strong>image</strong></td>
							<td>สินค้า</td>
							<td align="right">ราคา</td>
							<td align="center">จำนวน</td>
							<td align="right">รวม/รายการ</td>
						</tr>
						<?php
						$queryb = "
						SELECT * FROM tbl_order_detail as o
						INNER JOIN tbl_product_option  as p ON o.ref_op_id=p.op_id
						INNER JOIN tbl_product  as d ON p.ref_p_id=d.p_id
						INNER JOIN tbl_orders  as r  ON o.ref_order_id=r.order_id
						WHERE o.ref_order_id = $order_id
						ORDER BY p.op_id DESC" or die("Error:" . mysqli_error());
						$result = mysqli_query($con, $queryb);
						while($row = mysqli_fetch_array($result)) {
					    $p_promotion = $row['p_promotion'];
						if($p_promotion==1){
						$disc =	$row['op_price'] * $row['p_discount']/100;
						$mprice = $row['op_price']-$disc;
						}else{
						$mprice = $row['op_price'];
						}
											
													echo "<tr>";
															echo "<td align='center'>". $i += 1 ."</td>";
																echo "<td width='100'>"."<img src='../p_img/$row[p_img]'  width='100%'/>"."</td>";
																echo "<td>"." "; 

		if($row['ref_t_id']==1){
	    echo $row["p_name"]; 
		echo " ".$row["op_name"] ." ";
		}else{
		echo $row["p_name"];  	
		}

		echo "</td>";
																echo "<td align='right'>" .number_format($mprice,2) ."</td>";
																echo "<td align='center'>$row[d_qty]</td>";
																echo "<td align='right'>".number_format($row[d_price_total],2)."</td>";
											echo "</tr>";
											$total +=$row[d_price_total];
											}
												echo "<tr bgcolor='#e0d0d0'>";
																echo "<td  align='right' colspan='5'><b>รวม</b></td>";
																echo "<td align='right'>"."<b>".number_format($total,2)."</b>"."</td>";
											echo "</tr>";
						?>
					</table>
				</form>
			</div>
		</div>
	</div>
</section>
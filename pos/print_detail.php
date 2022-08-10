<?php
$order_id = mysqli_real_escape_string($con,$_GET['order_id']);
$sqlb = "
SELECT * FROM tbl_orders as o
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
				<div class="title text-center">
					<h1 class="mb-10">ใบเสร็จรับเงิน</h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-8">
				<center>
				<button  id="hd" class="btn btn-primary" onclick="window.print();"> Print </button>
				</center>
				<p> <b> Bill ID 000<?php echo $_GET['order_id'];?>
					ว/ด/ป  <?php echo date('d/m/Y H:i:s',strtotime($rowb['order_date']));?>
				</b> </p>
				
				<table  align="center" class="table table-hover">
					<tr bgcolor="#EAEAEA">
						<td align="center">ลำดับ</td>
						<td>สินค้า</td>
						<td align="right">ราคา</td>
						<td align="center">จำนวน</td>
						<td align="right">รวม/รายการ</td>
					</tr>
					<?php
					$queryb = "
					SELECT * FROM tbl_order_detail as o
					INNER JOIN tbl_product  as d ON o.ref_op_id=d.p_id
					INNER JOIN tbl_orders  as r  ON o.ref_order_id=r.order_id
					WHERE o.ref_order_id = $order_id
					ORDER BY d.p_id DESC" or die("Error:" . mysqli_error());
					$result = mysqli_query($con, $queryb);
					while($row = mysqli_fetch_array($result)) {
						$mprice = $row['p_price'];
						echo "<tr>";
							echo "<td align='center'>". $i += 1 ."</td>";								
							echo "<td>"." ";
							 
							echo $row["p_name"];
						echo "</td>";
						echo "<td align='right'>" .number_format($mprice,2) ."</td>";
						echo "<td align='center'>$row[d_qty]</td>";
						echo "<td align='right'>".number_format($row['d_price_total'],2)."</td>";
						echo "</tr>";
						$total +=$row['d_price_total'];
						}
							echo "<tr bgcolor='#e0d0d0'>";
							echo "<td  align='right' colspan='4'><b>รวม</b></td>";
							echo "<td align='right'>"."<b>".number_format($total,2)."</b>"."</td>";
										echo "</tr>";
					?>
				</table>
				<p align="right">
					<b> ผู้รับเงิน/แคชเชียร์ :  <?php echo $m_name;?> </b>
				</p>
				
			</div>
		</div>
	</div>
</section>
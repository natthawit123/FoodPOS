<?php
			$query = "
			SELECT * FROM tbl_product";
			//  or die("Error:" . mysqli_error());
			$result1 = mysqli_query($con, $query);
			while($rowp = mysqli_fetch_array($result1)) {
			$mprice = $rowp['p_price'];
?>
<div class="col-lg-3">
		<div style="width: 100%; padding: 15px;" data-toggle="tooltip" data-placement="top"
			title="<?php echo $rowp['p_name'];?>">
			<img style="width: 100%; height: 135px; border-radius: 10px;" src="../p_img/<?php echo $rowp['p_img']; ?>">
			<div class="title-food">
				<b>
                <?php
						echo $rowp['p_name'];
					?>
				</b>
			</div>
			<p class="text-right">ราคา <?php echo $mprice; ?> บาท</p>
			<a href="pos.php?p_id=<?php echo $rowp['p_id']; ?>&act=add" class="btn btn-danger btn-block btn-ms"> สั่ง </a>
		</div>
		<!-- <img src="../p_img/<?php echo $rowp['p_img'];?>" width="190px" height="107px">
		<h5><b><?php echo $rowp['p_name'];?></b></h5>
		<p class="price float-right">
		</p>
		<p class="price float-right">
								ราคา <?php echo $mprice;?> บาท
							</p>
		<p>
		<a href="pos.php?p_id=<?php echo $rowp['p_id'];?>&act=add" class="btn btn-success" style="width: 100%">  สั่ง </a>
	</p> -->
</div>
<?php } ?>

<?php include('h.php');?>
<body class="hold-transition skin-red sidebar-mini sidebar-collapse">
	<div class="wrapper">
		<header class="main-header">
			<?php include('navbar.php');?>
		</header>
		<?php include('menu_left.php');?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>
				ระบบสั่งอาหาร/รับออเดอร์
				</h1>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-body">
								<div class="col-sm-12">
									<div class="row">
										<!-- <div class="col-xs-8"> -->
											<?php
											// echo '<div class="row">';
											include('food.php');
											// echo '</div>';
											?>
										<!-- </div> -->
									</div>
								</div>
								<div class="col-xs-12" style="margin-top: 25px; margin-bottom: 25px; border: 2px solid #f0f0f0; border-radius: 15px;">
											<h3>รายการสั่งซื้อ ว/ด/ป <?php echo date('d/m/Y');?></h3>
											<?php include('cart_detail.php');?>
											<p align="right">
											แคชเชียร์ : <?php echo $m_name;?>
										</p>
										</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> -->
</body>
<?php include('footer.php');?>

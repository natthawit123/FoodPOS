<?php include('h.php');?>
<style type="text/css">
          @media print{
            #hdd{
              display: none;
            }
          }
        </style>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<header class="main-header">
			<?php include('navbar.php');?>
		</header>
		<?php include('menu_left.php');?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>
				หน้าแรก
				</h1>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-body">
								<div class="col-sm-12">
									<hr>
									<p id="hdd">
										<a href="index.php?act=sum" class="btn btn-success"> ยอดขายตามวันที่ </a>
										<a href="index.php" class="btn btn-info"> รายงานยอดขาย </a>

										<a href="index.php?act=all" class="btn btn-success">
											ประวัติการขาย
										</a>
									</p>
									<?php
									$act = $_GET['act'];
									if ($act=='stock1') {
										include('r_stock.php');
									}elseif ($act=='stock1d') {
										include('r_stock_d.php');
									}elseif ($act=='stock2') {
										include('r_stock2.php');
									}elseif ($act=='stock2d') {
										include('r_stock2_d.php');
									 }elseif ($act=='all') {
											 include('order_close.php');
									  }elseif ($act=='alld') {
											 include('order_close_d.php');
									}elseif ($act=='sum') {
											 include('r_stock_sum.php');
									}elseif ($act=='sum2') {
											 include('r_stock_sum_d.php');
									}else{
										include('r_d.php');
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<?php include('footer.php');?>

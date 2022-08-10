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
				ระบบขายหน้าร้าน
				</h1>
			</section>
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
							<div class="box-body">
								<div class="col-sm-12">
									<div class="row">
										<div class="col-xs-12">
											<?php
											// //quer member
											// $mphone = $_GET['mphone'];
											// if($mphone!=''){
											// $sqlmp = "SELECT * FROM tbl_member WHERE m_phone='$mphone'";
											// $resultmp = mysqli_query($con, $sqlmp) or die ("Error in query: $sqlmp " . mysqli_error());
											// $rowmp = mysqli_fetch_array($resultmp);
											// 	}
											// //@extract($rowmp);
											// $m_phoneq=$rowmp['m_phone'];
											// $m_nameq=$rowmp['m_name'];
											// $m_idq = $rowmp['m_id'];
											include('confirm_detail.php');
										
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
	<?php include('footer.php');?>
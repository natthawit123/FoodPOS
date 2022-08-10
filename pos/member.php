<?php include('h.php');?>
<body class="hold-transition skin-red sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <?php include('navbar.php');?>
    </header>
    <?php include('menu_left.php');?>
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
        จัดการโปรไฟล์ส่วนตัว
        </h1>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
              <!--   <h3 class="box-title"> -
               </h3> -->
              </div>
              
              <div class="box-body">
                <div class="col-sm-12">
                  <?php
                  $act = $_GET['act'];
                  if ($act == 'edit') {
                  include('member_form_edit.php');
                  }elseif($act=='pwd'){
                  include('member_form_rwd.php');
                  }else {
                   include('member_form_edit.php');
                  }
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  <?php include('footer.php');?>
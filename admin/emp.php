<?php include('h.php');?>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <?php include('navbar.php');?>
    </header>
    <?php include('menu_left.php');?>
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
        ระบบจัดการพนักงาน/ผู้จัดการ
        </h1>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">รายการ>>>พนักงาน/ผู้จัดการ
                <a href="emp.php?act=add" class="btn-info btn-sm">+ เพิ่มข้อมูล +</a> </h3>
              </div>

              <div class="box-body">
                <div class="col-sm-">
                  <?php
                  $act = $_GET['act'];
                  if($act == 'add'){
                  include('emp_form_add.php');
                  }elseif ($act == 'edit') {
                  include('emp_form_edit.php');
                  }elseif($act=='rwd'){
                  include('emp_form_rwd.php');
                  }else {
                  include('emp_list.php');
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

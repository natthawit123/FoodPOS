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
        จัดการข้อมูลเมนูอาหาร
        </h1>
      </section>

      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">รายการเมนูอร่อย
                <a href="food.php?act=add" class="btn-info btn-sm">+เพิ่มข้อมูล</a> </h3>
              </div>

              <div class="box-body">
                <div class="col-sm-12">
                  <?php
                  $act = $_GET['act'];
                    if($act == 'add'){
                    include('food_form_add.php');
                    }elseif ($act == 'edit') {
                    include('food_form_edit.php');
                    }elseif ($act == 'option') {
                    include('food_form_add_option.php');
                    }elseif($act=='dt'){
                    include('food_detail.php');
                    }elseif($act=='pro'){
                    include('food_pro_form_edit.php');
                    }else {
                    include('food_list.php');
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

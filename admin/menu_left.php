<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <br/>
        <center>
        <img src="../people_img/<?php echo $m_img;?>" class="img-circle" width="70%">
        <br><br>
        <font color="#fff">
        คุณ<?php echo $m_name;?>
        </font>
        <br> 
      </center>
      </div>
      <div class="pull-left info">
        <p>ผู้ดูแลระบบ/ผจก.</p>
      </div>
    </div>
    <ul class="sidebar-menu" data-widget="tree">
      <!-- <li class="header">Admin</li> -->
      <li>
        <a href="index.php">
          <i class="fa fa-home"></i>
          <span> -หน้าหลัก</span>
        </a>
      </li>
      <li>
        <a href="emp.php">
          <i class="fa fa-edit"></i>
          <span> -จัดการพนักงาน</span>
        </a>
      </li>
       <li>
        <a href="food.php">
          <i class="fa fa-edit"></i>
          <span> -จัดการเมนูอาหาร</span>
        </a>
      </li>
  
      <li>
        <a href="status.php">
          <i class="fa fa-edit"></i>
          <span> -จัดการสถานะ</span>
        </a>
      </li>
      <li><a href="../logout.php" onclick="return confirm('ย้นยันการออกจากระบบ');"><i class="fa fa-circle-o text-red"></i> <span>ออกจากระบบ</span></a></li>
      
    </section>
    <!-- /.sidebar -->
  </aside>
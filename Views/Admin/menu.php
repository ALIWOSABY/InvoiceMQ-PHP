<?php
if (!defined('base_url')) define('base_url', 'http://localhost/InvoiceMQ-PHP/Views/');
if (!defined('base_app')) define('base_app', str_replace('\\', '/', __DIR__) . '/');
$mm = $ens[0]->getAnalytic_Acc_id();

?>


<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-right image">
        <img src="../../Assets/img/users.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $ens[0]->getSYS_User_name(); ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i></a>
      </div>
    </div>

    <nav class="">
      <ul class="sidebar-menu">
        <!-- <li class="header"></li>
          <li class="active treeview">
          <a href="../Admin/AddBran_conn_controller">Add Branch</a>
          </li> -->
        <li class="treeview">
          <a href="<?php echo base_url ?>Admin/" class="nav-link nav-home">
            <i class="fa fa-dashboard"></i> <span>الرئيسية</span>
          </a>
        </li>

        <?php
        $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =1 and SEC_FREEZE = 'Y'");
        $row = mysqli_fetch_array($stmt);

        if (isset($row['SEC_USE_ID'])) { ?>


          <li class="treeview">
            <a href="<?php echo base_url ?>Admin/?page=page_users_inactive" class="nav-link text-light nav-user"><i class="fa fa-fw fa-users"></i><span> المستخدمين </span></a>
          </li>


          <!-- </li> -->
        <?php
        } else {
        }
        ?>




        <?php
        $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =2 and SEC_FREEZE = 'Y'");
        $row = mysqli_fetch_array($stmt);

        if (isset($row['SEC_USE_ID'])) { ?>
          <li class="treeview">
            <a href="<?php echo base_url ?>Admin/?page=page_privilege" id="all_privilege">
              <i class="fa fa-fw fa-television"></i> <span> البرامج والصلاحيات</span>
            </a>
          </li>
        <?php
        } else {
        }
        ?>

        <?php
        $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =3 and SEC_FREEZE = 'Y'");
        $row = mysqli_fetch_array($stmt);

        if (isset($row['SEC_USE_ID'])) { ?>
          <li class="treeview">
            <a href="<?php echo base_url ?>Admin/?page=page_paramerters">
              <i class="fa fa-fw fa-gears"></i> <span>متغيرات النظام</span>
            </a>
          </li>
        <?php
        } else {
        }
        ?>


      </ul>
    </nav>
  </section>
  <!-- /.sidebar -->
</aside>
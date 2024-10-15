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

        <li class="treeview">
          <a href="<?php echo base_url ?>User/" class="nav-link nav-home">
            <i class="fa fa-dashboard"></i> <span>الرئيسية</span>
          </a>
        </li>



        <?php
        $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =1 and SEC_FREEZE = 'Y'");
        $row = mysqli_fetch_array($stmt);

        if (isset($row['SEC_USE_ID'])) { ?>


          <li class="treeview">
            <a href="<?php echo base_url ?>User/?page=page_users_inactive" class="nav-link text-light nav-user"><i class="fa fa-fw fa-users"></i><span> مستخدمي النظام </span></a>
          </li>


          <!-- </li> -->
        <?php
        } else {
        }
        ?>


        <li class="treeview">
          <a href="<?php echo base_url ?>User/?page=p_s" class="nav-link text-light nav-user"><i class="fa fa-fw fa-users"></i><span> الموردين </span></a>
        </li>


        <li class="treeview">
          <a href="<?php echo base_url ?>User/?page=p_c" class="nav-link text-light nav-user"><i class="fa fa-fw fa-users"></i><span> العملاء </span></a>
        </li>

        <?php
        $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =10 and SEC_FREEZE = 'Y'");
        $row = mysqli_fetch_array($stmt);

        if (isset($row['SEC_USE_ID'])) { ?>

          <li class="treeview">
            <a href="<?php echo base_url ?>User/?page=page_types">
              <i class="fa fa-fw fa-files-o"></i> <span>المستندات</span>
            </a>
          </li>

        <?php
        } else {
        }
        ?>





        <li class="treeview">
          <a href="#">
            <i class="fa fa-fw fa-tasks"></i> <span> الحركة للوكيل (الرعوي) </span>
            <!-- <i class="fa fa-angle-left pull-left"></i> -->
          </a>

          <ul class="treeview-menu">
            <?php
            $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =11 and SEC_FREEZE = 'Y'");
            $row = mysqli_fetch_array($stmt);

            if (isset($row['SEC_USE_ID'])) { ?>
              <li><a href="<?php echo base_url ?>User/?page=p_m_supp"><i class="fa fa-fw fa-tasks"></i> القيود اليومية </a></li>
              <li><a href="<?php echo base_url ?>User/?page=p_rev_supp"><i class="fa fa-fw fa-tasks"></i> مراجعة القيود </a></li>
              <li><a href="<?php echo base_url ?>User/?page=p_fin_supp"><i class="fa fa-fw fa-tasks"></i> القيود المرحلة </a></li>
            <?php
            } else {
            }
            ?>
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-fw fa-file-pdf-o"></i>
            <span>تقارير الموردين</span>
            <i class="fa fa-angle-left pull-left"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url ?>User/?page=p_dlivd_amnt_supp_vt"><i class="fa fa-fw fa-file-pdf-o"></i> توصيل المتبقى </a></li>
            <li><a href="<?php echo base_url ?>User/?page=r_sp_vtd"><i class="fa fa-fw fa-file-pdf-o"></i> تقرير للمورد حسب (التأريخ) </a></li>
            <li><a href="<?php echo base_url ?>User/?page=r_sp_vta"><i class="fa fa-fw fa-file-pdf-o"></i>تقرير اليوم كامل للمورد</a></li>
          </ul>
        </li>

        <!-- شاشة الحركة للعملاء -->

        <li class="treeview">
          <a href="#">
            <i class="fa fa-fw fa-tasks"></i> <span> الحركة للعملاء </span>
            <!-- <i class="fa fa-angle-left pull-left"></i> -->
          </a>

          <ul class="treeview-menu">
            <?php
            $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =11 and SEC_FREEZE = 'Y'");
            $row = mysqli_fetch_array($stmt);

            if (isset($row['SEC_USE_ID'])) { ?>

              <li><a href="<?php echo base_url ?>User/?page=p_m_cust"><i class="fa fa-fw fa-tasks"></i> القيود اليومية </a></li>
              <li><a href="<?php echo base_url ?>User/?page=p_rev_cust"><i class="fa fa-fw fa-tasks"></i> مراجعة القيود </a></li>
              <li><a href="<?php echo base_url ?>User/?page=p_fin_cust"><i class="fa fa-fw fa-tasks"></i> القيود المرحلة </a></li>
            <?php
            } else {
            }
            ?>


          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-fw fa-file-pdf-o"></i>
            <span>تقارير العملاء</span>
            <i class="fa fa-angle-left pull-left"></i>
          </a>
          <ul class="treeview-menu">
          <!-- <li><a href="?php echo base_url ?>User/?page=p_dlivd_amnt_cust_vt"><i class="fa fa-fw fa-file-pdf-o"></i> توصيل المتبقى </a></li> -->
            <li><a href="<?php echo base_url ?>User/?page=r_cust_vtd"><i class="fa fa-fw fa-file-pdf-o"></i> تقرير للعميل حسب (التأريخ) </a></li>
          </ul>
        </li>







      </ul>
      </li>













      </ul>
    </nav>

  </section>
  <!-- /.sidebar -->
</aside>
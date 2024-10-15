<!-- ?php require_once './header.php'; ?>

?php require_once './menu.php'; ?> -->

<?php
// $bran = $_SESSION['branch'];
$ens = unserialize($_SESSION['login']);


?>
<!-- Content Wrapper. Contains page content -->

<!-- <div class="content-wrapper"> -->



<!-- Content Header (Page header) -->



<!-- المستخدمين-->
<!-- <section class="content"> -->

<div class="box box-solid">

    <div class="box-body">
        <a class="btn btn-app">
            <span class="badge bg-purple">

                <?php
                if (count($aff) > 0) {
                    $count1 = count($aff);
                    echo  $count1;
                } else {
                    echo 0;
                }
                ?>

            </span>
            <i class="fa fa-users"></i> عدد المستخدمين
        </a>

    </div><!-- /.box-body -->
</div>



<div class="box box-primary">
    <!-- <div class="box-header with-border">           
          </div> -->
    <div class="box-header">
        <div class="card-header">



            <div class="box-body">



                <?php
                $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =1 and SEC_FREEZE = 'Y' and SEC_INSERT = 'Y'");
                $row = mysqli_fetch_array($stmt);

                if (isset($row['SEC_USE_ID'])) { ?>
                    <button type="button" class="btn btn-primary btn_user_Add" data-toggle="modal"><i class="fa fa-plus"></i>
                        اضافة مستخدم
                    </button>

                <?php
                } else { ?>
                    <button type="button" class="btn btn-primary btn_user_Add" disabled data-toggle="modal"><i class="fa fa-plus"></i>
                        اضافة مستخدم
                    </button>
                <?php
                }
                ?>








            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body" dir="rtl" style="text-align: center;">
            <table id="user_id" class="table table-bordered table-striped" style="text-align: center;">
                <thead>
                    <tr>
                        <th style="text-align: center;">الرقم</th>
                        <th style="text-align: center;">اسم المستخدم(عربي)</th>
                        <th style="text-align: center;">اسم المستخدم(انجليزي)</th>
                        <th style="text-align: center;">الفرع</th>
                        <th style="text-align: center;">الايميل</th>
                        <!-- <th>مدير الإدارة</th> -->
                        <th style="text-align: center;">الحالة</th>
                        <th style="text-align: center;">الوظائف</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($aff); $i++) {
                        if ($ens[0]->getUSE_BRA_ID() == 0) {
                    ?>

                            <tr>
                                <td> <?php echo $aff[$i]->getAnalytic_Acc_id(); ?></td>
                                <td> <?php echo $aff[$i]->getSYS_User_name(); ?></td>
                                <td> <?php echo $aff[$i]->getUSE_NAMEE(); ?></td>
                                <td> <?php echo $aff[$i]->getName_branch(); ?></td>

                                <td><?php echo $aff[$i]->getSYS_User_email(); ?></td>


                                <td>
                                    <?php
                                    switch ($aff[$i]->getSYS_User_status()) {
                                        case 1:
                                            echo '<span class="badge bg-light-blue">مفعل</span>';
                                            break;
                                        case 0:
                                            echo '<span class="badge bg-red">غير مفعل</span>';
                                            break;
                                        default:
                                            echo '<span class="badge bg-green">لا يوجد عناصر تم تجميدها</span>';
                                    }
                                    ?>
                                </td>





                                <td class="box-footer">
                                    <div class="btn-group" style="direction:rtl;">
                                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                            <span class="caret"></span>
                                            <span class="sr-only"></span>
                                        </button>
                                        <button type="button" class="btn btn-info">العمليات</button>
                                        <ul class="dropdown-menu" role="menu">



                                            <?php
                                            switch ($aff[$i]->getSYS_User_status()) {
                                                case 0:

                                                    $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =1 and SEC_FREEZE = 'Y' and SEC_UPDATE = 'Y'");
                                                    $row = mysqli_fetch_array($stmt);
                                                    if (isset($row['SEC_USE_ID'])) {
                                                        echo '                            
                                                                <li>
                                                                <button type="button" id="btn_edit"
                                                                SYS_User_name="' . $aff[$i]->getSYS_User_name() . '"
                                                                USE_NAMEE="' . $aff[$i]->getUSE_NAMEE() . '"
                                                                USE_PARENT_ID="' . $aff[$i]->getUSE_PARENT_ID() . '"
                                                                USE_BRA_ID="' . $aff[$i]->getUSE_BRA_ID() . '"
                                                                SYS_User_email="' . $aff[$i]->getSYS_User_email() . '"
                                                                SYS_User_login="' . $aff[$i]->getSYS_User_login() . '"
                                                                PasswordHash="' . $aff[$i]->getPasswordHash() . '"
                                                                SYS_User_status="' . $aff[$i]->getSYS_User_status() . '"
                                                                Analytic_Acc_id="' . $aff[$i]->getAnalytic_Acc_id() . '"
                                                                class="btn bg-olive" data-toggle="modal"> تعديل البيانات <i class="fa fa-edit"
                                                                    aria-hidden="true">
                                                                </i>
                                                            </button>
                                                            
                                                            </li>
                                                            <li class="divider"></li>
                                                            ';
                                                    } else {
                                                        echo '
                                                        <li>
                                                            <button type="button" id="btn_edit" disabled
                                                            class="btn bg-olive" data-toggle="modal"> تعديل البيانات  <i class="fa fa-edit"
                                                                aria-hidden="true">
                                                            </i>
                                                        </button>                                        
                                                        </li>
                                                        <li class="divider"></li>';
                                                    }

                                                    $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =1 and SEC_FREEZE = 'Y' and SEC_UPDATE = 'Y'");
                                                    $row = mysqli_fetch_array($stmt);
                                                    if (isset($row['SEC_USE_ID'])) {
                                                        echo '                            
                                                                <li>
                                                                <button type="button" id="btn_edit_pwd"
                                                                SYS_User_name="' . $aff[$i]->getPasswordHash() . '"
                                                                Analytic_Acc_id="' . $aff[$i]->getAnalytic_Acc_id() . '"
                                                                class="btn bg-olive" data-toggle="modal"> تعديل كلمة المرور  <i class="fa fa-key"
                                                                    aria-hidden="true">
                                                                </i>
                                                            </button>
                                                            
                                                            </li>
                                                            <li class="divider"></li>
                                                            ';
                                                    } else {
                                                        echo '
                                                        <li>
                                                            <button type="button" id="btn_edit_pwd" disabled
                                                            class="btn bg-olive" data-toggle="modal">  تعديل كلمة المرور   <i class="fa fa-key"
                                                                aria-hidden="true">
                                                            </i>
                                                        </button>                                        
                                                        </li>
                                                        <li class="divider"></li>';
                                                    }



                                                    $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =1 and SEC_FREEZE = 'Y' and SEC_DELETE = 'Y'");
                                                    $row = mysqli_fetch_array($stmt);

                                                    if (isset($row['SEC_USE_ID'])) {

                                                        echo '
                            
                                                            <li>
                                                            <button type="button" id="del_user_inactive"
                                                            Analytic_Acc_id="' . $aff[$i]->getAnalytic_Acc_id() . '"
                                                            class="btn bg-olive" data-toggle="modal"> حـذف السجل <i class="fa fa-trash"
                                                                aria-hidden="true">
                                                            </i>
                                                            </button>
                                                            </li>
                                                            <li class="divider"></li>
                                                            ';
                                                    } else {

                                                        echo '
                            
                                                            <li>
                                                                <button type="button" id="del_user_inactive" disabled
                                                                class="btn bg-olive" data-toggle="modal"> حـذف السجل <i class="fa fa-trash"
                                                                    aria-hidden="true">
                                                                </i>
                                                            </button>
                                                    
                                                            </li>
                                                            <li class="divider"></li>';
                                                    }


                                                    $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =1 and SEC_FREEZE = 'Y' and SEC_10 = 'Y'");
                                                    $row = mysqli_fetch_array($stmt);

                                                    if (isset($row['SEC_USE_ID'])) {
                                                        echo  '
                                                        <li>
                                                        <button type="button" id="active_me" 
                                                                class="btn bg-olive"> تفعيل الحساب <i class="fa fa-user"
                                                                    aria-hidden="true">
                                                                </i>
                                                            </button>
                                                            
                                                            </li>';
                                                    } else {
                                                        echo  '
                                                            <li>
                                                            <button type="button" id="active_me" disabled
                                                                    class="btn bg-olive"> تفعيل الحساب <i class="fa fa-user"
                                                                        aria-hidden="true">
                                                                    </i>
                                                                </button>
                                                                
                                                                </li>';
                                                    }

                                                    break;
                                                case 1:
                                                    $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =1 and SEC_FREEZE = 'Y' and SEC_UPDATE = 'Y'");
                                                    $row = mysqli_fetch_array($stmt);
                                                    if (isset($row['SEC_USE_ID'])) {

                                                        echo   '
                                                            <li>
                                                            <button type="button" id="btn_edit"
                                                            SYS_User_name="' . $aff[$i]->getSYS_User_name() . '"
                                                            USE_NAMEE="' . $aff[$i]->getUSE_NAMEE() . '"
                                                            USE_PARENT_ID="' . $aff[$i]->getUSE_PARENT_ID() . '"
                                                            USE_BRA_ID="' . $aff[$i]->getUSE_BRA_ID() . '"
                                                            SYS_User_email="' . $aff[$i]->getSYS_User_email() . '"
                                                            SYS_User_login="' . $aff[$i]->getSYS_User_login() . '"
                                                            SYS_User_status="' . $aff[$i]->getSYS_User_status() . '"
                                                            Analytic_Acc_id="' . $aff[$i]->getAnalytic_Acc_id() . '"
                                                            class="btn bg-olive" data-toggle="modal"> تعديل البيانات <i class="fa fa-edit"
                                                            aria-hidden="true">
                                                            </i>
                                                            </button>
                                                            
                                                            </li> 
                                                            <li class="divider"></li>                                              
                                                            ';
                                                    } else {

                                                        echo '                            
                                                            <li>
                                                            <button type="button" id="btn_edit" disabled
                                                            class="btn bg-olive" data-toggle="modal"> تعديل البيانات <i class="fa fa-edit" aria-hidden="true">
                                                            </i>
                                                            </button>                                                                
                                                            </li>
                                                            <li class="divider"></li>                                         
                                                            ';
                                                    }


                                                    $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =1 and SEC_FREEZE = 'Y' and SEC_UPDATE = 'Y'");
                                                    $row = mysqli_fetch_array($stmt);
                                                    if (isset($row['SEC_USE_ID'])) {
                                                        echo '                            
                                                                <li>
                                                                <button type="button" id="btn_edit_pwd"
                                                                SYS_User_name="' . $aff[$i]->getPasswordHash() . '"
                                                                Analytic_Acc_id="' . $aff[$i]->getAnalytic_Acc_id() . '"
                                                                class="btn bg-olive" data-toggle="modal"> تعديل كلمة المرور  <i class="fa fa-key"
                                                                    aria-hidden="true">
                                                                </i>
                                                            </button>
                                                            
                                                            </li>
                                                            <li class="divider"></li>
                                                            ';
                                                    } else {
                                                        echo '
                                                        <li>
                                                            <button type="button" id="btn_edit_pwd" disabled
                                                            class="btn bg-olive" data-toggle="modal">  تعديل كلمة المرور   <i class="fa fa-key"
                                                                aria-hidden="true">
                                                            </i>
                                                        </button>                                        
                                                        </li>
                                                        <li class="divider"></li>';
                                                    }




                                                    $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =1 and SEC_FREEZE = 'Y' and SEC_DELETE = 'Y'");
                                                    $row = mysqli_fetch_array($stmt);

                                                    if (isset($row['SEC_USE_ID'])) {

                                                        echo '
                            
                                                            <li>
                                                            <button type="button" id="del_user_inactive"
                                                            Analytic_Acc_id="' . $aff[$i]->getAnalytic_Acc_id() . '"
                                                            class="btn bg-olive" data-toggle="modal"> حـذف السجل <i class="fa fa-trash"
                                                            aria-hidden="true">
                                                            </i>
                                                            </button>
                                                            </li>   
                                                            <li class="divider"></li>                                      
                                                            ';
                                                    } else {

                                                        echo '
                                                            <li>
                                                            <button type="button" id="del_user_inactive" disabled
                                                            class="btn bg-olive" data-toggle="modal"> حـذف السجل <i class="fa fa-trash"
                                                            aria-hidden="true">
                                                            </i>
                                                            </button>
                                                            </li>
                                                            <li class="divider"></li>
                                                            ';
                                                    }

                                                    $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =1 and SEC_FREEZE = 'Y' and SEC_10 = 'Y'");
                                                    $row = mysqli_fetch_array($stmt);

                                                    if (isset($row['SEC_USE_ID'])) {

                                                        echo  '                       
                                                            <a href="?page=page_security&data=' . $aff[$i]->getAnalytic_Acc_id() . ' ">
                                                            <li>
                                                            <button type="button" class="btn bg-olive">  صلاحيات المستخدم <i
                                                            class="glyphicon glyphicon-lock"></i>
                                                            </button>
                                                            </li>
                                                            </a>    
                                                            ';
                                                    } else {
                                                    }
                                                    break;
                                                default:
                                                    echo '
                                                            <li>
                                                            <span class="badge bg-green">لا يوجد عناصر تم تجميدها</span>
                                                            </li>';
                                            }
                                            ?>

                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php   } else {
                            if ($aff[$i]->getUSE_BRA_ID() == $ens[0]->getUSE_BRA_ID()) { ?>
                                <tr>
                                    <td> <?php echo $aff[$i]->getAnalytic_Acc_id(); ?></td>
                                    <td> <?php echo $aff[$i]->getSYS_User_name(); ?></td>
                                    <td> <?php echo $aff[$i]->getUSE_NAMEE(); ?></td>
                                    <td> <?php echo $aff[$i]->getName_branch(); ?></td>


                                    <td><?php echo $aff[$i]->getSYS_User_email(); ?></td>
                                    <td>
                                        <?php
                                        switch ($aff[$i]->getSYS_User_status()) {
                                            case 1:
                                                echo '<span class="badge bg-light-blue">مفعل</span>';
                                                break;
                                            case 0:
                                                echo '<span class="badge bg-red">غير مفعل</span>';
                                                break;
                                            default:
                                                echo '<span class="badge bg-green">لا يوجد عناصر تم تجميدها</span>';
                                        }
                                        ?>
                                    </td>
                                    <td class="box-footer">
                                        <div class="btn-group" style="direction:rtl;">
                                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only"></span>
                                            </button>
                                            <button type="button" class="btn btn-info">العمليات</button>
                                            <ul class="dropdown-menu" role="menu">
                                                <?php
                                                switch ($aff[$i]->getSYS_User_status()) {
                                                    case 0:
                                                        $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =1 and SEC_FREEZE = 'Y' and SEC_UPDATE = 'Y'");
                                                        $row = mysqli_fetch_array($stmt);
                                                        if (isset($row['SEC_USE_ID'])) {
                                                            echo '                            
                                            <li>
                                            <button type="button" id="btn_edit"
                                            SYS_User_name="' . $aff[$i]->getSYS_User_name() . '"
                                            USE_NAMEE="' . $aff[$i]->getUSE_NAMEE() . '"
                                            USE_PARENT_ID="' . $aff[$i]->getUSE_PARENT_ID() . '"
                                            USE_BRA_ID="' . $aff[$i]->getUSE_BRA_ID() . '"
                                            SYS_User_email="' . $aff[$i]->getSYS_User_email() . '"
                                            SYS_User_login="' . $aff[$i]->getSYS_User_login() . '"
                                            PasswordHash="' . $aff[$i]->getPasswordHash() . '"
                                            SYS_User_status="' . $aff[$i]->getSYS_User_status() . '"
                                            Analytic_Acc_id="' . $aff[$i]->getAnalytic_Acc_id() . '"
                                            class="btn bg-olive" data-toggle="modal"> تعديل البيانات <i class="fa fa-edit"
                                            aria-hidden="true">
                                            </i>
                                            </button>        
                                            </li>
                                            <li class="divider"></li>
                                        ';
                                                        } else {

                                                            echo '<li>
                                                                    <button type="button" id="btn_edit" disabled
                                                                    class="btn bg-olive" data-toggle="modal"> تعديل البيانات  <i class="fa fa-edit"
                                                                    aria-hidden="true">
                                                                    </i>
                                                                    </button>                                        
                                                                    </li>
                                                                    <li class="divider"></li>';
                                                        }
                                                        $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =1 and SEC_FREEZE = 'Y' and SEC_UPDATE = 'Y'");
                                                        $row = mysqli_fetch_array($stmt);
                                                        if (isset($row['SEC_USE_ID'])) {
                                                            echo '                            
                                                                    <li>
                                                                    <button type="button" id="btn_edit_pwd"
                                                                    SYS_User_name="' . $aff[$i]->getPasswordHash() . '"
                                                                    Analytic_Acc_id="' . $aff[$i]->getAnalytic_Acc_id() . '"
                                                                    class="btn bg-olive" data-toggle="modal"> تعديل كلمة المرور  <i class="fa fa-key"
                                                                        aria-hidden="true">
                                                                    </i>
                                                                </button>
                                                                
                                                                </li>
                                                                <li class="divider"></li>
                                                                ';
                                                        } else {
                                                            echo '
                                                            <li>
                                                                <button type="button" id="btn_edit_pwd" disabled
                                                                class="btn bg-olive" data-toggle="modal">  تعديل كلمة المرور   <i class="fa fa-key"
                                                                    aria-hidden="true">
                                                                </i>
                                                            </button>                                        
                                                            </li>
                                                            <li class="divider"></li>';
                                                        }

                                                        $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =1 and SEC_FREEZE = 'Y' and SEC_DELETE = 'Y'");
                                                        $row = mysqli_fetch_array($stmt);

                                                        if (isset($row['SEC_USE_ID'])) {

                                                            echo '
                            
                                                                            <li>
                                                                            <button type="button" id="del_user_inactive"
                                                        Analytic_Acc_id="' . $aff[$i]->getAnalytic_Acc_id() . '"
                                                        class="btn bg-olive" data-toggle="modal"> حـذف السجل <i class="fa fa-trash"
                                                            aria-hidden="true">
                                                        </i>
                                                    </button>
                                                    </li>
                                                    <li class="divider"></li>
                                                    ';
                                                        } else {

                                                            echo '
                            
                                                <li>
                                                <button type="button" id="del_user_inactive" disabled
                                                class="btn bg-olive" data-toggle="modal"> حـذف السجل <i class="fa fa-trash"
                                                    aria-hidden="true">
                                                </i>
                                            </button>
                                            
                                            </li>
                                            <li class="divider"></li>';
                                                        }




                                                        echo  '
                                                                <li>
                                                                            <button type="button" id="active_me" 
                                                        class="btn bg-olive"> تفعيل الحساب <i class="fa fa-user"
                                                            aria-hidden="true">
                                                        </i>
                                                    </button>
                                                    
                                                    </li>
                        
                                                      ';

                                                        break;
                                                    case 1:
                                                        $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =1 and SEC_FREEZE = 'Y' and SEC_UPDATE = 'Y'");
                                                        $row = mysqli_fetch_array($stmt);
                                                        if (isset($row['SEC_USE_ID'])) {

                                                            echo   '
                                                                    <li>
                                                                    <button type="button" id="btn_edit"
                                                    SYS_User_name="' . $aff[$i]->getSYS_User_name() . '"
                                                    USE_NAMEE="' . $aff[$i]->getUSE_NAMEE() . '"
                                                    USE_PARENT_ID="' . $aff[$i]->getUSE_PARENT_ID() . '"
                                                    USE_BRA_ID="' . $aff[$i]->getUSE_BRA_ID() . '"
                                                    SYS_User_email="' . $aff[$i]->getSYS_User_email() . '"
                                                    SYS_User_login="' . $aff[$i]->getSYS_User_login() . '"
                                                    SYS_User_status="' . $aff[$i]->getSYS_User_status() . '"
                                                    Analytic_Acc_id="' . $aff[$i]->getAnalytic_Acc_id() . '"
                                                    class="btn bg-olive" data-toggle="modal"> تعديل البيانات <i class="fa fa-edit"
                                                        aria-hidden="true">
                                                    </i>
                                                </button>
                                                
                                                </li> 
                                                <li class="divider"></li>                                              
                                                ';
                                                        } else {

                                                            echo '
                            
                                                                <li>
                                                                <button type="button" id="btn_edit" disabled
                                            class="btn bg-olive" data-toggle="modal"> تعديل البيانات <i class="fa fa-edit"
                                                aria-hidden="true">
                                            </i>
                                        </button>
                                        
                                        </li>
                                        <li class="divider"></li>                                         
                                        ';
                                                        }

                                                        $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =1 and SEC_FREEZE = 'Y' and SEC_UPDATE = 'Y'");
                                                        $row = mysqli_fetch_array($stmt);
                                                        if (isset($row['SEC_USE_ID'])) {
                                                            echo '                            
                                                                    <li>
                                                                    <button type="button" id="btn_edit_pwd"
                                                                    SYS_User_name="' . $aff[$i]->getPasswordHash() . '"
                                                                    Analytic_Acc_id="' . $aff[$i]->getAnalytic_Acc_id() . '"
                                                                    class="btn bg-olive" data-toggle="modal"> تعديل كلمة المرور  <i class="fa fa-key"
                                                                        aria-hidden="true">
                                                                    </i>
                                                                </button>
                                                                
                                                                </li>
                                                                <li class="divider"></li>
                                                                ';
                                                        } else {
                                                            echo '
                                                            <li>
                                                                <button type="button" id="btn_edit_pwd" disabled
                                                                class="btn bg-olive" data-toggle="modal">  تعديل كلمة المرور   <i class="fa fa-key"
                                                                    aria-hidden="true">
                                                                </i>
                                                            </button>                                        
                                                            </li>
                                                            <li class="divider"></li>';
                                                        }


                                                        $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =1 and SEC_FREEZE = 'Y' and SEC_DELETE = 'Y'");
                                                        $row = mysqli_fetch_array($stmt);

                                                        if (isset($row['SEC_USE_ID'])) {

                                                            echo '
                            
                                                                    <li>
                                                                    <button type="button" id="del_user_inactive"
                                                Analytic_Acc_id="' . $aff[$i]->getAnalytic_Acc_id() . '"
                                                class="btn bg-olive" data-toggle="modal"> حـذف السجل <i class="fa fa-trash"
                                                    aria-hidden="true">
                                                </i>
                                            </button>
                                            </li>   
                                            <li class="divider"></li>                                      
                                            ';
                                                        } else {

                                                            echo '
                                                            <li>
                                                            <button type="button" id="del_user_inactive" disabled
                                        class="btn bg-olive" data-toggle="modal"> حـذف السجل <i class="fa fa-trash"
                                            aria-hidden="true">
                                        </i>
                                    </button>
                                    </li>
                                    <li class="divider"></li>
                                    ';
                                                        }
                                                        $stmt = mysqli_query($conn, "select SEC_USE_ID from securities where SEC_USE_ID = $mm and SEC_PRO_ID =1 and SEC_FREEZE = 'Y' and SEC_11 = 'Y'");
                                                        $row = mysqli_fetch_array($stmt);

                                                        if (isset($row['SEC_USE_ID'])) {

                                                            echo  '
                       
                                                    <a href="?page=page_security&data=' . $aff[$i]->getAnalytic_Acc_id() . ' ">
                                                    <li>
                                <button type="button" class="btn bg-olive">  صلاحيات المستخدم <i
                                        class="glyphicon glyphicon-lock"></i>
                                </button>
                                </li>
                                </a>
                                
                                ';
                                                        } else {
                                                        }
                                                        break;
                                                    default:
                                                        echo '
                                                <li>
                                                <span class="badge bg-green">لا يوجد عناصر تم تجميدها</span>
                                                </li>';
                                                }
                                                ?>

                                            </ul>
                                        </div>




                                    </td>
                                </tr>
                    <?php
                            }
                        }
                    } ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div><!-- /.box -->
</div>
<!-- /.col -->


<!-- </div>


</section> -->
<!-- نهاية كود سند صرف شيك-->




<div class="modal" id="modal_default_User" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title">اضافة مستخدم جديد</h4>
            </div>
            <div class="modal-body">

                <form action="#" id="form_usr_add" method="post">
                    <div class="box-body">

                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <input type="text" name="Add_SYS_User_name" id="Add_SYS_User_name" class="form-control" placeholder="الاسم الرباعي (عربي)">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <input type="text" name="Add_USE_NAMEE" id="Add_USE_NAMEE" class="form-control" placeholder="الاسم الرباعي (انجليزي)">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                        </div>

                        <input type="hidden" name="Add_USE_PARENT_ID" id="Add_USE_PARENT_ID" class="form-control" value="0">


                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label> مدير الإدارة :</label>
                                <select name="Add_USE_PARENT_ID" id="Add_USE_PARENT_ID" class="form-control">
                                    <option value="">تحديد</option>
                                    ?php
                                    for ($i = 0; $i < count($u); $i++) {
                                        echo '<option value="' . $u[$i]->getAnalytic_Acc_id() . '">' . $u[$i]->getSYS_User_name() . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div> -->



                        <div class="col-md-6">
                            <div class="form-group">
                                <label> الفرع :</label>
                                <select name="Add_USE_BRA_ID" id="Add_USE_BRA_ID" class="form-control">
                                    <option value="">تحديد </option>
                                    <?php
                                    for ($i = 0; $i < count($bran); $i++) {
                                        if ($bran[$i]->getBRA_FREEZE() == 'Y') {

                                            echo '<option value="' . $bran[$i]->getBranch_id() . '">' . $bran[$i]->getBranch_desc() . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label> الايميل :</label>
                                <input type="email" name="Add_SYS_User_email" id="Add_SYS_User_email" class="form-control" placeholder="ادخل الايميل">

                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="form-group">
                                <label> الاسم الظاهر للدخول :</label>
                                <input type="text" name="Add_SYS_User_login" id="Add_SYS_User_login" class="form-control" placeholder="الاسم الظاهر للدخول">

                            </div>
                        </div>






                        <div class="col-md-6">
                            <div class="form-group">
                                <label> كلمة المرور :</label>
                                <input type="password" name="Add_PasswordHash" id="Add_PasswordHash" class="form-control" placeholder="كلمة المرور">

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label> تأكيد كلمة المرور :</label>
                                <input type="password" name="Add_confirm_etu" id="Add_confirm_etu" class="form-control" placeholder="تأكيد كلمة المرور">

                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" id="cancel_model_user" class="btn btn-primary pull-left" data-dismiss="modal">الغاء</button>
                        <button type="button" id="btn_user_Add" class="btn btn-primary">حفظ</button>
                    </div>

                </form>
            </div>
        </div>

    </div>

</div>
<!-- /.modal -->




<!-- Edit User -->
<div class="modal" id="modal_edit_user_inactive" style="display:none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
                <h4 class="modal-title">تعديل بيانات المستخدم</h4>
            </div>
            <div class="modal-body">

                <form action="" id="form_edit_inactive" method="post" enctype="multipart/form-data">
                    <div class="box-body">

                        <input type="hidden" id="Analytic_Acc_id">


                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <input type="text" name="edit_SYS_User_name" id="edit_SYS_User_name" class="form-control" placeholder="الاسم الرباعي (عربي)">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group has-feedback">
                                <input type="text" name="edit_USE_NAMEE" id="edit_USE_NAMEE" class="form-control" placeholder="الاسم الرباعي (انجليزي)">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                        </div>

                        <input type="hidden" name="edit_USE_PARENT_ID" id="edit_USE_PARENT_ID" class="form-control" value="0">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label> الفرع :</label>
                                <select name="USE_BRA_ID" id="USE_BRA_ID" class="form-control">
                                    <option value="">تحديد </option>
                                    <?php
                                    for ($i = 0; $i < count($bran); $i++) {
                                        if ($bran[$i]->getBRA_FREEZE() == 'Y') {

                                            echo '<option value="' . $bran[$i]->getBranch_id() . '">' . $bran[$i]->getBranch_desc() . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label> الايميل :</label>
                                <input type="email" name="SYS_User_email" id="SYS_User_email" class="form-control" placeholder="ادخل الايميل">

                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>الإسم الظاهر للدخول:</label>
                                <input type="text" name="SYS_User_login" id="SYS_User_login" class="form-control" placeholder="الاسم الظاهر للدخول">

                            </div>
                        </div>


                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label> كلمة المرور :</label>
                                <input type="password" name="PasswordHash" id="PasswordHash" class="form-control" placeholder="كلمة السر">

                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label> تأكيد كلمة المرور :</label>
                                <input type="password" name="confirm_etu" id="confirm_etu" class="form-control" placeholder="تأكيد كلمة السر">

                            </div>
                        </div> -->


                        <div class="col-md-6">
                            <div class="form-group">
                                <label> التجميد :</label>
                                <select name="SYS_User_status" id="SYS_User_status" class="form-control">
                                    <option value="1">مفعل</option>
                                    <option value="0">غير مفعل</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary pull-left" id="cancel_edit_user" data-dismiss="modal">الغاء</button>
                        <button type="button" id="btn_edit_valide_inc" class="btn btn-primary">حفظ</button>
                    </div>



                    <!-- /.box-footer -->
                </form>



            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<!-- Edit User FOR PASSWORD -->
<div class="modal" id="modal_edit_user_inactive_pwd" style="display:none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
                <h4 class="modal-title">تعديل كلمة المرور للمتسخدم</h4>
            </div>
            <div class="modal-body">

                <form action="" id="form_edit_inactive_pwd" method="post" enctype="multipart/form-data">
                    <div class="box-body">

                        <input type="hidden" id="Analytic_Acc_id">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> كلمة المرور :</label>
                                <input type="password" name="PasswordHash" id="PasswordHash" class="form-control" placeholder="كلمة السر">

                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label> تأكيد كلمة المرور :</label>
                                <input type="password" name="confirm_etu" id="confirm_etu" class="form-control" placeholder="تأكيد كلمة السر">

                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary pull-left" id="cancel_edit_user_pwd" data-dismiss="modal">الغاء</button>
                        <button type="button" id="btn_edit_valide_inc_pwd" class="btn btn-primary">حفظ</button>
                    </div>
                </form>



            </div>
        </div>
    </div>
</div>

<!-- End Edit User FOR PASSWORD -->



<!-- delete user -->
<div class="modal" id="modal_del_userinactive" style="display:none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
                <h4 class="modal-title">المستخدمين</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_Analytic_Accdel">
                <p>هل تريد حذف حساب هذاالمستخدم؟</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-left" id="cancel_del_user" data-dismiss="modal">لا</button>
                <button type="button" id="btn_del_inactive" class="btn btn-primary">نعم</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<div class="modal modal-primary" id="modal_success" style="display:none">
    <div class="modal-dialog">
        <div class="modal-body">
            <p style="text-align: center;">تم حفظ البيانات بنجاح&hellip;</p>
        </div>
    </div>
</div>



<div class="modal modal-primary" id="modal_edit_inactive" style="display:none">
    <div class="modal-dialog">
        <div class="modal-body">
            <p style="text-align: center;">تم تعديل البيانات بنجاح&hellip;</p>
        </div>
    </div>

</div>


<div class="modal modal-primary" id="modal_edit_inactive_pwd" style="display:none">
    <div class="modal-dialog">
        <div class="modal-body">
            <p style="text-align: center;">تم تعديل كلمة المرور بنجاح&hellip;</p>
        </div>
    </div>

</div>


<div class="modal modal-primary" id="modal_delete_inactive" style="display:none">
    <div class="modal-dialog">
        <div class="modal-body">
            <p style="text-align: center;">تم حذف البيانات بنجاح&hellip;</p>
        </div>
    </div>

</div>



<!-- ?php require_once './footer.php'; ?> -->
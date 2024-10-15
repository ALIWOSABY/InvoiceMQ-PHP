<?php
require_once '../../Classes/userss.php';
require_once '../../Classes/privilege.class.php';
require_once '../../Classes/securities.class.php';
require_once '../../Classes/paramerters.class.php';
require_once '../../Classes/supp.class.php';
require_once '../../Classes/cust.class.php';
require_once '../../db/config.php';
require_once '../../Models/VTCModel.php';
require_once '../../Models/VTSModel.php';




require_once '../../db/config.php';


session_start();
if (!isset($_SESSION['login']) && $_SESSION['login'] = !null) {
    session_destroy();
    header("Location: /InvoiceMQ-PHP/index.php");
    die();
}

$ens = unserialize($_SESSION['login']);
$aff = $_SESSION['aff'];
$daff = $_SESSION['daff'];
$u = $_SESSION['users'];
$c_u_a =  $_SESSION['count_u_a'];
$c_u_n_a = $_SESSION['count_u_n_a'];
$SP = $_SESSION['supp'];
$CT = $_SESSION['cust'];
$count = 1;

if (get_class($ens[0]) != "userss") {
    header("Location: /InvoiceMQ-PHP/index.php");
    die();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>النظام المحاسبي | لوحة التحكم</title>
    <!-- META TAGS -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <!-- FAV ICON(BROWSER TAB ICON) -->
    <link rel="shortcut icon" href="../../Assets/img/logo.png" type="image/x-icon">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
    <link rel="stylesheet" href="../../Assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../Assets/css/bootstrap-rtl.min.css">
    <link rel="stylesheet" href="../../Assets/css/rtl.css">
    <link rel="stylesheet" href="../../Assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../../Assets/css/ionicons.min.css" />
    <link rel="stylesheet" href="../../Assets/css/daterangepicker-bs3.css" />
    <link rel="stylesheet" href="../../Assets/css/bootstrap-colorpicker.min.css" />
    <link rel="stylesheet" href="../../Assets/css/bootstrap-timepicker.min.css" />
    <link rel="stylesheet" href="../../Assets/css/select2.min.css" />
    <link rel="stylesheet" href="../../Assets/css/AdminLTE.min.css" />
    <link rel="stylesheet" href="../../Assets/css/_all-skins.min.css" />
    <link rel="stylesheet" href="../../Assets/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="../../Assets/css/file-explore.css">
    <link rel="stylesheet" href="../../Assets/css/all.css" />


    <!-- <link rel="stylesheet" href="../../Assets/css/jquery.dataTables.min.css" /> -->
    <link rel="stylesheet" href="../../Assets/css/buttons.dataTables.min.css" />




    <!-- <link rel="stylesheet" href="../../Assets/css/style.css" /> -->



    <style>
        .example-modal .modal {
            position: relative;
            top: auto;
            bottom: auto;
            right: auto;
            left: auto;
            display: block;
            z-index: 1;
        }

        .example-modal .modal {
            background: transparent !important;
        }

        button:disabled {
            cursor: none;
            background-color: rgb(231, 231, 231);
            color: rgb(53, 53, 53);
            pointer-events: none;
            opacity: 0.3;
        }

        /* Important part */
        .modal-dialog {
            overflow-y: initial !important
        }

        .modal-body {
            max-height: calc(100vh - 250px);
            overflow-y: auto;
        }

        .has-error.form-control {
            border-color: #a94442;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075)
        }

        .VOU_TI {
            overflow: scroll;
        }

        .VOU_ACC {
            overflow: scroll;
        }

        .VOU_ACC_REV {
            overflow: scroll;
        }

        .VOU_ACC_INQ {
            overflow: scroll;
        }

        .SCU_ID {
            overflow: scroll;
        }
    </style>
</head>

<body class="skin-blue sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <a href="../Admin/index.php" class="logo">
                <span class="logo-mini"><b>حسابات الرعية</b></span>
                <img src="../../Assets/img/logo.png" class="logo" />
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="../../Controllers/LoginController.php?methode=logout" style="text-align: right;"><i class="fa fa-fw fa-sign-out"></i> تسجيل الخروج </a>
                        </li>
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="../../Assets/img/users.png" class="user-image" alt="User Image">
                                <span class="hidden-xs">
                                    <?php echo $ens[0]->getSYS_User_name(); ?>
                                </span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="../../Assets/img/users.png" class="img-circle" alt="User Image">
                                    <p>
                                        <?php echo $ens[0]->getSYS_User_email(); ?>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="?page=profile" class="btn btn-primary btn-flat"><i class="fa fa-fw fa-gears"></i> الملف الشخصي </a>
                                    </div>
                                    <div class="pull-left">
                                        <a href="../../Controllers/LoginController.php?methode=logout" class="btn btn-primary btn-flat"> <i class="fa fa-fw fa-sign-out"></i> خروج </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- <i class="fa fa-flag-o"></i> -->
                                <span> <?php echo $ens[0]->getName_branch(); ?></span>
                                <i class="fa fa-flag-o"></i>
                                <!-- <p>
                                        ?php echo $ens[0]->getUSE_BRA_ID(); ?>
                                    </p> -->
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
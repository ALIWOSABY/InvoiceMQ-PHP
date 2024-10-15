<?php


session_start();

require_once '../Models/SecuritiyModel.php';
require_once '../Classes/securities.class.php';

if ($_REQUEST['methode'] == "view_all_secrty") {
    $m = new SecuritiyModel();
    $_SESSION['security'] = $m->getallSecerity();
}

//add the security to the securities

if ($_REQUEST['methode'] == "add_ens_security") {
    $e = new securities();
    $m = new SecuritiyModel();
    $e->setSEC_ID(null);
    $e->setSEC_USE_ID($_REQUEST['SEC_USE_ID']);
    $e->setSEC_BRA_ID($_REQUEST['SEC_BRA_ID']);
    $x = $m->insert_securitiy($e);
    print $x;
}

//add the all security to the securities

if ($_REQUEST['methode'] == "add_all_security") {
    $e = new securities();
    $m = new SecuritiyModel();
    $e->setSEC_ID(null);
    $e->setSEC_USE_ID($_REQUEST['SEC_USE_ID']);
    $e->setSEC_BRA_ID($_REQUEST['SEC_BRA_ID']);
   $e->setSEC_PRO_ID(null);
   $e->setSEC_INSERT(null);
   $e->setSEC_UPDATE(null);
   $e->setSEC_DELETE(null);
   $e->setSEC_SHOW(null);
   $e->setSEC_FREEZE(null);

    $x = $m->insert_all_securitiy($e);
    print $x;
}

//Modify user data page active
if ($_REQUEST['methode'] == "Edit_security") {

    $m = new SecuritiyModel();
    $e = new securities();
    $SEC_PRO_ID = $_REQUEST['SEC_PRO_ID'];
    $SEC_INSERT = $_REQUEST['SEC_INSERT'];
    $SEC_UPDATE = $_REQUEST['SEC_UPDATE'];
    $SEC_DELETE = $_REQUEST['SEC_DELETE'];
    $SEC_SHOW = $_REQUEST['SEC_SHOW'];
    $SEC_FREEZE = $_REQUEST['SEC_FREEZE'];
    $SEC_10 = $_REQUEST['SEC_10'];
    $SEC_11 = $_REQUEST['SEC_11'];
    $SEC_12 = $_REQUEST['SEC_12'];
    $SEC_13 = $_REQUEST['SEC_13'];
    $SEC_14 = $_REQUEST['SEC_14'];
    $SEC_15 = $_REQUEST['SEC_15'];
    $SEC_16 = $_REQUEST['SEC_16'];


    $SEC_ID = $_REQUEST['SEC_ID'];
    echo $m->edit_security($SEC_PRO_ID,$SEC_INSERT,$SEC_UPDATE,$SEC_DELETE,$SEC_SHOW,$SEC_FREEZE,$SEC_10,$SEC_11,$SEC_12,$SEC_13,$SEC_14,$SEC_15,$SEC_16,$SEC_ID);
}

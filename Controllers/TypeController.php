<?php


session_start();

require_once '../Models/TypeModel.php';
require_once '../Classes/types.php';


if ($_REQUEST['methode'] == "add_ens_type") {
    $e = new types();
    $m = new TypeModel();

    $TYP_NAME = $_REQUEST['TYP_NAME'];
    $TYP_NAMEE = $_REQUEST['TYP_NAMEE'];
    $TYP_REP_NAME = $_REQUEST['TYP_REP_NAME'];
    $TYP_TYPE = $_REQUEST['TYP_TYPE'];



    $TYP_Sig_one = $_REQUEST['TYP_Sig_one'];
    $TYP_Sig_two = $_REQUEST['TYP_Sig_two'];
    $TYP_Sig_three = $_REQUEST['TYP_Sig_three'];


    $TYP_INS_USER = $_REQUEST['TYP_INS_USER'];
    $TYP_INS_DATE = date("Y-m-d h:i:sa");
    $TYP_FREEZE = $_REQUEST['TYP_FREEZE'];




    $x = $m->insert_type($TYP_NAME, $TYP_NAMEE, $TYP_REP_NAME, $TYP_TYPE, $TYP_Sig_one, $TYP_Sig_two, $TYP_Sig_three,$TYP_INS_USER,$TYP_INS_DATE, $TYP_FREEZE);
    print $x;
}



if ($_REQUEST['methode'] == "view_type") {
    $mt = new TypeModel();
    $_SESSION['type'] = $mt->getalltype();
}


//Modify user data page active
if ($_REQUEST['methode'] == "Edit_type") {

    $m = new TypeModel();
    $e = new types();
    $TYP_NAME = $_REQUEST['TYP_NAME'];
    $TYP_NAMEE = $_REQUEST['TYP_NAMEE'];
    $TYP_REP_NAME = $_REQUEST['TYP_REP_NAME'];
    $TYP_TYPE = $_REQUEST['TYP_TYPE'];


    $TYP_Sig_one = $_REQUEST['TYP_Sig_one'];
    $TYP_Sig_two = $_REQUEST['TYP_Sig_two'];
    $TYP_Sig_three = $_REQUEST['TYP_Sig_three'];
    
    $TYP_UPD_USER = $_REQUEST['TYP_UPD_USER'];
    $TYP_UPD_DATE = date("Y-m-d h:i:sa");

    $TYP_FREEZE = $_REQUEST['TYP_FREEZE'];


    $TYP_ID_edit = $_REQUEST['TYP_ID'];

    echo $m->edit_type($TYP_NAME, $TYP_NAMEE, $TYP_ID_edit, $TYP_REP_NAME, $TYP_TYPE, $TYP_Sig_one, $TYP_Sig_two, $TYP_Sig_three,$TYP_UPD_USER, $TYP_UPD_DATE, $TYP_FREEZE);
}


// // check delete groups
if ($_REQUEST['methode'] == "chk_TYPE") {
    $m = new TypeModel();

    $TYP_ID_del = $_REQUEST['TYP_ID_del'];

    $chktypid = $m->delet_type($TYP_ID_del);
    echo ($chktypid);
}

//Delete user data page inactive
// if ($_REQUEST['methode'] == "delt_record_typ") {
//     $m = new TypeModel();
//     $e = new types();
//     $e->setTYP_ID($_REQUEST['TYP_ID_del']);
//     echo $m->delet_type($e);
// }

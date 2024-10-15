<?php

require_once '../Models/PrivilegeModel.php';
require_once '../Classes/privilege.class.php';
session_start();

if (isset($_POST['method'])) {

  if ($_REQUEST['method'] == "get_id_Privilege") {
    $m = new PrivilegeModel();
    $priv_id = $m->getlastid_privilege();
    echo ($priv_id + 1);
  }

  if ($_POST['method'] == "view_Privilege") {
    $m = new PrivilegeModel();
    //$ens = unserialize($_SESSION['Privilege']);
    $_SESSION['Privilege'] = $m->view_Privilege();
    
    //  print(isset($_SESSION['Privilege']));
    //header('location:../../Views/pages/page_currency.php');

  }
  if ($_POST['method'] == "view_currency") {
  }
  if ($_POST['method'] == "edit_currency") {
  }







// Add new programmes
  if ($_POST['method'] == "add_new_privilege") {
    // $ens = unserialize($_SESSION['login']);
    //$ens = unserialize($_SESSION['login']);
    $m = new PrivilegeModel();
    $e = new Privilege();
    $e->setPRO_ID($_POST['privilege_id']);
    $e->setPRO_NAME($_POST['Privilege_name']);
    $e->setPRO_NAMEE($_POST['Privilege_name2']);
    $e->setPRO_FILE_NAME($_POST['Privilege_file']);
    $e->setPRO_SYS_NAME($_POST['Privilege_sys']);     
    $e->setPRO_INS_USER($_POST['PRO_INS_USER']);
    $e->setPRO_FREEZE($_POST['Privilege_status']);
    
    
     
    // if (isset($_POST['Privilege_status']) && $_POST['Privilege_status'] == 'true') {
    //   $e->setPrivilege_status(1);
    // } else {
    //   $e->setPrivilege_status(0);
    // }
    echo $m->insert($e);
  }



  // Edit record from programmes
  if ($_POST['method'] == "edit_privilege") {
   //$ens = unserialize($_SESSION['login']);

   $m = new PrivilegeModel();
   $e = new Privilege();
   $e->setPRO_ID($_POST['privilege_id']);
   $e->setPRO_NAME($_POST['Privilege_name']);
   $e->setPRO_NAMEE($_POST['Privilege_name2']);
   $e->setPRO_FILE_NAME($_POST['Privilege_file']);
   $e->setPRO_SYS_NAME($_POST['privilege_sys']);
   $e->setPRO_UPD_USER($_POST['PRO_UPD_USER']);
   $e->setPRO_UPD_DATE(date("Y-m-d h:i:sa"));
   $e->setPRO_FREEZE($_POST['privilege_status']);
    // if (isset($_POST['Privilege_status']) && $_POST['Privilege_status'] == 'true') {
    //   $e->setPrivilege_status(1);
    // } else {
    //   $e->setPrivilege_status(0);
    // }
    echo $m->edit_privilege($e);
  }



			// check delete programs
      if ($_REQUEST['method'] == "chk_prog") {
        $m = new PrivilegeModel();
      
        $privilege_id=$_REQUEST['privilege_id'];
     
        $chkproid = $m->chk_progs($privilege_id);
        echo ($chkproid);  
    }

  

  //Delete any record from programmes
  if ($_POST['method'] == "delete_privilege") {
    // echo "hi";
    $m = new PrivilegeModel();
    $e = new Privilege();
    $e->setPRO_ID($_POST['privilege_id']);
    // echo "trying to delete";
    echo $m->delete_privilege($e);
  }

}

<?php


session_start();

require_once '../Models/paramerterModel.php';
require_once '../Classes/paramerters.class.php';
require_once '../Models/LoginModel.php';





if (isset($_REQUEST['methode'])) {

    if ($_REQUEST['methode'] == "view_all_paramerter") {
        $m = new paramerterModel();
        $_SESSION['paramerter'] = $m->getallParamter();
    }
}

if ($_REQUEST['methode'] == "add_photo") {

    // return 1;
     echo "hi";
    $e = new paramerters();
    $m = new paramerterModel();
    $e->setPar_id(null);
    $e->setpar_name($_REQUEST['par_name']);
    $e->setpar_namee($_REQUEST['par_namee']);
    $e->setPar_phone($_REQUEST['Par_phone']);
    $e->setPar_website($_REQUEST['Par_website']);

    $e->setPar_Addr1($_REQUEST['Par_Addr1']);
    $e->setPar_Addr1e($_REQUEST['Par_Addr1e']);



    $e->setPar_Addr2($_REQUEST['Par_Addr2']);
    $e->setPar_Addr2e($_REQUEST['Par_Addr2e']);



    $e->setPar_Addr3($_REQUEST['Par_Addr3']);
    $e->setPar_Addr3e($_REQUEST['Par_Addr3e']);



    $e->setPar_whatsapp($_REQUEST['Par_whatsapp']);
    try {
        $total = count($_FILES['Par_logo']['name']);        
        for ($i = 0; $i < $total; $i++) {     

            $tmpFilePath = $_FILES['Par_logo']['tmp_name']["$i"];
            // echo $tmpFilePath;
            if ($tmpFilePath != "") {

                $newFilePath = "../Piecejointe/" . $_FILES['Par_logo']['name']["$i"];
                    print($newFilePath);    

                if (move_uploaded_file($tmpFilePath, $newFilePath)) {                                      
                    $e->setPar_logo($newFilePath);
                    $x = $m->insert_paramerter($e);
                    print $x;
                //    $_SESSION['paramerter'] = $m->getallParamter();
                   header("Location: /InvoiceMQ-PHP/Views/Admin/page_paramerters.php");
                }
            } else {
              //  $_SESSION['paramerter'] = $m->getallParamter();              
               // header("Location: /InvoiceMQ-PHP/Views/Admin/page_paramerters.php");
               echo 'Error';
            }
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

//Modify user data page active
// if ($_REQUEST['methode'] == "edit_paramerter") {
    
//     $e = new paramerters();
//     $m = new paramerterModel();
//     $par_name = $_REQUEST['par_name'];
//     $par_namee = $_REQUEST['par_namee'];
//     $Par_BSUpdate = $_REQUEST['Par_BSUpdate'];
//     $Par_Fin_Y_End = $_REQUEST['Par_Fin_Y_End'];
//     $Par_Addr1 = $_REQUEST['Par_Addr1'];
//     $Par_Addr2 = $_REQUEST['Par_Addr2'];
//     $Par_Addr3 = $_REQUEST['Par_Addr3'];
//     $Par_id_edite = $_REQUEST['par_id'];
//     echo $m->edit_paramerter($par_name, $par_namee, $Par_id_edite, $Par_BSUpdate, $Par_Fin_Y_End, $Par_Addr1, $Par_Addr2, $Par_Addr3);
// }



if ($_REQUEST['methode'] == "edit_paramerter") {
    
   // echo "Edit parameter";
    $m = new paramerterModel();
    $e = new paramerters();

    $e->setPar_id($_REQUEST['par_id_e']);
    $e->setpar_name($_REQUEST['par_name']);
    $e->setpar_namee($_REQUEST['par_namee']);
    $e->setPar_phone($_REQUEST['Par_phone']);
    $e->setPar_website($_REQUEST['Par_website']);
    $e->setPar_Addr1($_REQUEST['Par_Addr1']);
    $e->setPar_Addr2($_REQUEST['Par_Addr2']);
    $e->setPar_Addr3($_REQUEST['Par_Addr3']);
    $e->setPar_whatsapp($_REQUEST['Par_whatsapp']);
    // $e->setPar_logo($_REQUEST['Par_logo_e']);
    // echo $m->edit_paramerter($e);


    try {
        $total = count($_FILES['Par_logo_e']['name']);        
        for ($i = 0; $i < $total; $i++) {     

            $tmpFilePath = $_FILES['Par_logo_e']['tmp_name']["$i"];
            // echo $tmpFilePath;
            if ($tmpFilePath != "") {

                $newFilePath = "../Piecejointe/" . $_FILES['Par_logo_e']['name']["$i"];
                    print($newFilePath);    

                if (move_uploaded_file($tmpFilePath, $newFilePath)) {                                      
                    $e->setPar_logo($newFilePath);                   
                    echo $m->edit_paramerter($e);
                //    $_SESSION['paramerter'] = $m->getallParamter();
                   header("Location: /InvoiceMQ-PHP/Views/Admin/page_paramerters.php");
                }
            } else {
              //  $_SESSION['paramerter'] = $m->getallParamter();              
               // header("Location: /InvoiceMQ-PHP/Views/Admin/page_paramerters.php");
               echo 'Error';
            }
        }
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}

//Delete user data page pramter
if ($_REQUEST['methode'] == "delt_record_paramerter") {
    $e = new paramerters();
    $m = new paramerterModel();
    $e->setPar_id($_REQUEST['del_prm_id']);
    echo $m->delet_paramerter($e);

    
}
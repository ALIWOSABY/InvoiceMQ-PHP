<?php


session_start();

require_once '../Models/CustModel.php';
require_once '../Classes/cust.class.php';
require_once '../Classes/days.class.php';
require_once '../Classes/amnt_dlivd_cust.class.php';
require_once __DIR__ . '/../Classes/tn_c.class.php';


if ($_REQUEST['methode'] == "V_all_C") {
    $m = new CustModel();
    $_SESSION['cust'] = $m->getallCust();
}


if ($_REQUEST['methode'] == "get_id_Cus") {
    $cm = new CustModel();
    $Cust_id = $cm->getlastid_Cus();
    echo ($Cust_id + 1);
}

if ($_REQUEST['methode'] == "add_contr_cust") {
    $c = new cust();
    $m = new CustModel();
    $c->setCUSTID($_REQUEST['pc0']);
    $c->setCUSTNAME($_REQUEST['pc1']);
    $c->setCUSTPHONE($_REQUEST['pc2']);
    $c->setCUSTEMAIL($_REQUEST['pc3']);
    $c->setCUSTINSUSER($_REQUEST['pc4']);
    $c->setCUSTFREEZE($_REQUEST['pc5']);

    $x = $m->insert_tb_cust($c);
    print $x;
}

//Modify user data page Cust
if ($_REQUEST['methode'] == "Edit_cust") {

    $m = new CustModel();
    $e = new cust();
    $e->setCUSTID($_POST['pc0']);
    $e->setCUSTNAME($_POST['pc1']);
    $e->setCUSTPHONE($_POST['pc2']);
    $e->setCUSTEMAIL($_POST['pc3']);
    $e->setCUSTUPDUSER($_POST['pc4']);
    $e->setCUSTUPDDATE(date("Y-m-d h:i:sa"));
    $e->setCUSTFREEZE($_POST['pc6']);
    echo $m->edit_Custom($e);
}


if (isset($_REQUEST['methode']) && $_REQUEST['methode'] == "VS_TYP_NO") {
    $cus = new CustModel();
    $VS_TYP_NO = $_POST['VS_TYP_NO'];
    $VS_DAT = $_POST['VS_DAT'];
    $cus->voutypid_cust($VS_TYP_NO, $VS_DAT);
}



if ($_REQUEST['methode'] == "get_count_vtc") {
    $cus = new CustModel();
    $_SESSION['cvtc'] = $cus->getcount_AVTC();
}



if ($_REQUEST['methode'] == "trans_recordcust") {
    $n = new CustModel();
    $id = $_REQUEST["vtc_id"];
    $x = $n->dupdatestatus_cust($id);
    echo ($x);
}


 //get all VT cust stat = 0
if ($_REQUEST['methode'] == "check_and_changecust") {
    $n = new CustModel();
    $vtc_id = $_REQUEST["vtc_id"];
    $x = $n->check_and_change_cust($vtc_id);
    echo ($x);
}

 //get all VT cust stat = 1
if ($_REQUEST['methode'] == "get_count_vtcone") {
    $cus = new CustModel();
    $_SESSION['cvtcone'] = $cus->getcount_AVTCOne();
}


 //get all VT cust stat = 2
if ($_REQUEST['methode'] == "get_count_vtctwo") {
    $cus = new CustModel();
    $_SESSION['cvtctwo'] = $cus->getcount_AVTCTwo();
}



if ($_REQUEST['methode'] == "review_cust_record") {
    $cus = new CustModel();
    $id = $_REQUEST["movidcusvt"];
    $x = $cus->updatestatut_cust($id);

    if ($x == "false") {
        echo 'false';
    } else if ($x == "true") {
        echo 'true';
    }
}


if ($_REQUEST['methode'] == "updcust_ref_review") {
    $cus = new CustModel();
    $id = $_REQUEST["upd_ref_idvtc"];
    $x = $cus->updatestcus_refused($id);

    if ($x == "false") {
        echo 'false';
    } else if ($x == "true") {
        echo 'true';
    }
}



if ($_REQUEST['methode'] == "add_mtd_dlivdcust") {
    $amt = new amnt_dlivd_cust();
    $m = new CustModel();
    $amt->setAMNTSIDCust($_REQUEST['AMNTS_ID_cust']);
    $amt->setAMNTSVIDCust($_POST['AMNTS_V_ID_cust']);
    $amt->setAMNTSDATCust($_REQUEST['AMNTS_DAT_cust']);
    $amt->setVOUUSEID($_REQUEST['VOU_USE_ID']);
    $amt->setVCCUSTIDCust($_REQUEST['VC_CUSTID_cust']);
    $amt->setTSTOTSALECust("0");
    $amt->setTSMUSCust("0");
    $amt->setTSHISREMDCust("0");
    $amt->setTSONREMDCust("0");
    $amt->setDLIVAMNTCust($_REQUEST['DLIVAMNT_cust']);

    $x = $m->insert_tb_amntdlivd_cust($amt);
    print $x;
}

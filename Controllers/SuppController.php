<?php


session_start();
require_once '../Models/SuppModel.php';
require_once '../Classes/supp.class.php';
require_once '../Classes/days.class.php';
require_once '../Classes/amnt_dlivd.class.php';

require_once __DIR__ . '/../Classes/v_s.class.php';




if ($_REQUEST['methode'] == "view_days") {
    $m = new SuppModel();
    $_SESSION['days'] = $m->getalldays();
}


if ($_REQUEST['methode'] == "view_all_Supp") {
    $m = new SuppModel();
    $_SESSION['supp'] = $m->getallSupp();
}


if ($_REQUEST['methode'] == "get_count_vts") {
    $m = new SuppModel();
    $_SESSION['cvts'] = $m->getcount_AVTS();
}


if ($_REQUEST['methode'] == "get_count_vtsone") {
    $m = new SuppModel();
    $_SESSION['cvtsone'] = $m->getcount_AVTSOne();
}

if ($_REQUEST['methode'] == "get_count_vtstwo") {
    $m = new SuppModel();
    $_SESSION['cvtstwo'] = $m->getcount_AVTSTwo();
}


if ($_REQUEST['methode'] == "get_id_S") {
    $act = new SuppModel();
    $S_id = $act->getlastid_S();
    echo ($S_id + 1);
}

if ($_REQUEST['methode'] == "A_f_s") {
    $e = new supp();
    $m = new SuppModel();
    $e->setSUPPID($_REQUEST['pc0']);
    $e->setSUPPNAME($_REQUEST['pc1']);
    $e->setSUPPPHONE($_REQUEST['pc2']);
    $e->setSUPPEMAIL($_REQUEST['pc3']);
    $e->setSUPPINSUSER($_REQUEST['pc4']);
    $e->setSUPPFREEZE($_REQUEST['pc5']);
    $x = $m->insert_tb_S($e);
    print $x;
}


//Modify user data page Sup
if ($_REQUEST['methode'] == "Edit_Supp") {

    $m = new SuppModel();
    $e = new supp();
    $e->setSUPPID($_POST['pc0']);
    $e->setSUPPNAME($_POST['pc1']);
    $e->setSUPPPHONE($_POST['pc2']);
    $e->setSUPPEMAIL($_POST['pc3']);
    $e->setSUPPUPDUSER($_POST['pc4']);
    $e->setSUPPUPDDATE(date("Y-m-d h:i:sa"));
    $e->setSUPPFREEZE($_POST['pc6']);
    echo $m->edit_supp($e);
}


if (isset($_REQUEST['methode']) && $_REQUEST['methode'] == "VS_TYP_NO") {
    $m = new SuppModel();
    $VS_TYP_NO = $_POST['VS_TYP_NO'];
    $VS_DAT = $_POST['VS_DAT'];
    $m->voutypid($VS_TYP_NO, $VS_DAT);
}


if ($_REQUEST['methode'] == "trans_record") {
    $n = new SuppModel();
    $id = $_REQUEST["vts_id"];
    $x = $n->dupdatestatus($id);
    echo ($x);
}



if ($_REQUEST['methode'] == "check_and_change") {
    $n = new SuppModel();
    $vts_id = $_REQUEST["vts_id"];
    $x = $n->check_and_change_m($vts_id);
    echo ($x);
}


if ($_REQUEST['methode'] == "review_rest_record") {
    $n = new SuppModel();
    $id = $_REQUEST["movidsupvt"];
    $x = $n->updatestatut_rest($id);

    if ($x == "false") {
        echo 'false';
    } else if ($x == "true") {
        echo 'true';
    }
}



if ($_REQUEST['methode'] == "update_ref_review") {
    $n = new SuppModel();
    $id = $_REQUEST["upd_ref_idvts"];
    $x = $n->updatestatut_refused($id);

    if ($x == "false") {
        echo 'false';
    } else if ($x == "true") {
        echo 'true';
    }
}




if ($_REQUEST['methode'] == "add_mtd_dlivd") {
    $amt = new amnt_dlivd();
    $m = new SuppModel();
    $amt->setAMNTSID($_REQUEST['AMNTS_ID']);
    $amt->setAMNTSVID($_POST['AMNTS_V_ID']);
    $amt->setAMNTSDAT($_REQUEST['AMNTS_DAT']);
    $amt->setVOUUSEID($_REQUEST['VOU_USE_ID']);
    $amt->setAMTSBENF($_REQUEST['AMTS_BENF']);
    $amt->setTSTOTSALE("0");
    $amt->setTSMUS("0");
    $amt->setTSHISREMD("0");
    $amt->setTSONREMD("0");
    $amt->setDLIVAMNT($_REQUEST['DLIVAMNT']);

    $x = $m->insert_tb_amntdlivd($amt);
    print $x;
}




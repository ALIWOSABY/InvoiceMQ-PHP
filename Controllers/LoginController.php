<?php

session_start();
require_once '../Models/LoginModel.php';
include_once '../Classes/userss.php';
require_once '../Models/paramerterModel.php';
require_once '../Models/SecuritiyModel.php';
require_once '../Models/PrivilegeModel.php';
require_once '../Classes/securities.class.php';
require_once '../Classes/paramerters.class.php';
require_once '../Classes/privilege.class.php';
require_once '../Classes/supp.class.php';
require_once '../Classes/days.class.php';
require_once '../Models/SuppModel.php';
require_once '../Classes/cust.class.php';
require_once '../Models/CustModel.php';
require_once '../Models/TypeModel.php';
require_once '../Classes/types.php';
require_once '../Classes/v_s.class.php';
require_once '../Classes/branches.class.php';










if (isset($_REQUEST['methode'])) {
    if ($_REQUEST['methode'] == "login") {
        $n = new LoginModel();
        $login = $_REQUEST["login"];
        $Password = md5($_REQUEST["password"]);


        $x = $n->login($login, $Password);

        if ($x == "false") {
            echo 'false';
        } else if ($x == "non activer") {
            echo 'activefalse';
        } else if ($x == "user") {
            $_SESSION['login'] = serialize($n->getUtilisateur($login));
            $usr = unserialize($_SESSION['login']);
            $a = $usr[0]->getAnalytic_Acc_id();

            $n = new LoginModel();
            $msec = new SecuritiyModel();
            $pr = new paramerterModel();
            $Privileg = new PrivilegeModel();
            $sup = new SuppModel();
            $cust = new CustModel();
            $dy = new SuppModel();
            $t = new TypeModel();
            $vtsup = new SuppModel();
            $vtsupone = new SuppModel();
            $vtsuptwo = new SuppModel();

            $vtcus = new CustModel();
            $vtcusone = new CustModel();
            $vtcustwo = new CustModel();







            $_SESSION['aff'] = $n->affectation();
            $_SESSION['paramerter']  = $prm  = $pr->getallParamter();
            $_SESSION['Privilege'] = $x = $Privileg->view_Privilege();
            $_SESSION['branch'] = $bran = $n->getallbranch();
            $_SESSION['supp'] = $SP =  $sup->getallSupp();
            $_SESSION['cust'] = $CT =  $cust->getallCust();
            $_SESSION['days'] = $day =  $dy->getalldays();
            $_SESSION['type'] = $mt = $t->getalltype();
            $_SESSION['cvts'] = $vtsup =  $vtsup->getcount_AVTS();
            $_SESSION['cvtsone'] = $vtsupo =  $vtsupone->getcount_AVTSOne();
            $_SESSION['cvtstwo'] = $vtsupT =  $vtsuptwo->getcount_AVTSTwo();

            $_SESSION['cvtc'] = $vtcus =  $vtcus->getcount_AVTC();
            $_SESSION['cvtcone'] = $vtcone =  $vtcusone->getcount_AVTCOne();
            $_SESSION['cvtctwo'] = $vtctwo =  $vtcustwo->getcount_AVTCTwo();


            echo 'user';
        } else if ($x == "admin") {
            $_SESSION['login'] = serialize($n->getAdminstrateur($login));

            $n = new LoginModel();


            $msec = new SecuritiyModel();

            $pr = new paramerterModel();
            $Privileg = new PrivilegeModel();
            $sup = new SuppModel();
            $cust = new CustModel();






            $ens = unserialize($_SESSION['login']);
            $_SESSION['aff'] = $n->affectation();
            $_SESSION['daff'] = $n->daffectation($ens[0]->getAnalytic_Acc_id());
            $_SESSION['users'] = $u = $n->uaffectation($ens[0]->getAnalytic_Acc_id());

            $_SESSION['count_u_a'] = $c_u_a = $n->count_users_active();
            $_SESSION['count_u_n_a'] = $c_u_n_a = $n->count_users_not_active();
            $_SESSION['branch'] = $bran = $n->getallbranch();

            $_SESSION['paramerter']  = $prm  = $pr->getallParamter();
            $_SESSION['Privilege'] = $x = $Privileg->view_Privilege();
            $_SESSION['supp'] = $SP =  $sup->getallSupp();
            $_SESSION['cust'] = $CT =  $cust->getallCust();


            echo 'admin';
        }
    }

    //logout
    if ($_REQUEST['methode'] == "logout") {
        $_SESSION["login"] = null;
        header("Location: /../../InvoiceMQ-PHP/index.php");
        die();
    }


    //Funtion check username or if it exists
    if ($_REQUEST['methode'] == "check_username") {
        $n = new LoginModel();
        print json_encode($n->check_username($_REQUEST['SYS_User_login']));
    }


    //Function check Email if right or if it exists
    if ($_REQUEST['methode'] == "check_email") {
        $n = new LoginModel();
        print json_encode($n->check_email($_REQUEST['SYS_User_email']));
    }


    //Adding data to the database
    if ($_REQUEST['methode'] == "ins_etu") {
        $e = new userss();
        $n = new LoginModel();
        $e->setSYS_User_name($_REQUEST['SYS_User_name']);
        $e->setUSE_NAMEE($_REQUEST['USE_NAMEE']);
        $e->setUSE_BRA_ID($_REQUEST['USE_BRA_ID']);
        $e->setSYS_User_email($_REQUEST['SYS_User_email']);
        $e->setSYS_User_login($_REQUEST['SYS_User_login']);
        $e->setPasswordHash(md5($_REQUEST['PasswordHash']));
        $e->setSYS_User_status("0");
        $x = $n->ins_etu($e);
        print $x;
    }


    //َActivate the user account
    if ($_REQUEST['methode'] == "activeUser") {
        $n = new LoginModel();
        $id = $_REQUEST["id"];
        $x = $n->updateEtate($id);
        if ($x == "false") {
            echo 'false';
        } else if ($x == "true") {
            echo 'true';
        }
    }




    //View all user after login 
    if ($_REQUEST['methode'] == "view_all") {
        $n = new LoginModel();
        $pr = new paramerterModel();



        $ens = unserialize($_SESSION['login']);



        $_SESSION['aff'] = $n->affectation();
        $_SESSION['daff'] = $n->daffectation($ens[0]->getAnalytic_Acc_id());
        $_SESSION['users'] = $u = $n->uaffectation($ens[0]->getAnalytic_Acc_id());
        $_SESSION['paramerter']  = $prm  = $pr->getallParamter();

        echo 'ok';
    }


    //view data on page users
    if ($_REQUEST['methode'] == "view") {
        $n = new LoginModel();


        $msec = new SecuritiyModel();
        $pr = new paramerterModel();
        $Privileg = new PrivilegeModel();
        $pr = new paramerterModel();
        $sup = new SuppModel();
        $cust = new CustModel();
        $dy = new SuppModel();
        $tmd = new TypeModel();
        $vtsup = new SuppModel();
        $vtsupone = new SuppModel();
        $vtsuptwo = new SuppModel();


        $vtcus = new CustModel();
        $vtcusone = new CustModel();
        $vtcustwo = new CustModel();




        $ens = unserialize($_SESSION['login']);
        $_SESSION['aff'] = $n->affectation();
        $_SESSION['daff'] = $n->daffectation($ens[0]->getAnalytic_Acc_id());
        $_SESSION['security'] = $sec = $msec->getallSecerity();
        $_SESSION['paramerter']  = $prm  = $pr->getallParamter();
        $_SESSION['Privilege'] = $x = $Privileg->view_Privilege();
        $_SESSION['branch'] = $bran = $n->getallbranch();
        $_SESSION['supp'] = $SP =  $sup->getallSupp();
        $_SESSION['cust'] = $CT =  $cust->getallCust();
        $_SESSION['days'] = $day =  $dy->getalldays();
        $_SESSION['type'] = $mt = $tmd->getalltype();
        $_SESSION['cvts'] = $vtsup =  $vtsup->getcount_AVTS();
        $_SESSION['cvtsone'] = $vtsupo =  $vtsupone->getcount_AVTSOne();
        $_SESSION['cvtstwo'] = $vtsupT =  $vtsuptwo->getcount_AVTSTwo();

        $_SESSION['cvtc'] = $vtcus =  $vtcus->getcount_AVTC();
        $_SESSION['cvtcone'] = $vtcone =  $vtcusone->getcount_AVTCOne();
        $_SESSION['cvtctwo'] = $vtctwo =  $vtcustwo->getcount_AVTCTwo();
    }


    //Deactivate the user account
    if ($_REQUEST['methode'] == "dactiveUser") {
        $n = new LoginModel();
        $id = $_REQUEST["id"];
        $x = $n->dupdateEtate($id);

        if ($x == "false") {
            echo 'false';
        } else if ($x == "true") {
            echo 'true';
        }
    }





    //Modify user data page inactive
    if ($_REQUEST['methode'] == "Edit_inactive") {
        $m = new LoginModel();
        $e = new userss();
        $SYS_User_name = $_REQUEST['SYS_User_name'];
        $USE_NAMEE = $_REQUEST['USE_NAMEE'];
        $USE_BRA_ID = $_REQUEST['USE_BRA_ID'];
        $SYS_User_email = $_REQUEST['SYS_User_email'];
        $SYS_User_login = $_REQUEST['SYS_User_login'];
        $SYS_User_status = $_REQUEST['SYS_User_status'];
        $Analytic_Acc_id = $_REQUEST['Analytic_Acc_id'];
        echo $m->edit_inactive($SYS_User_name,$USE_NAMEE,$USE_BRA_ID, $SYS_User_email, $SYS_User_login, $SYS_User_status, $Analytic_Acc_id);
    }


    //Modify Password for any user you went
    if ($_REQUEST['methode'] == "Edit_inactive_pwd") {

        $m = new LoginModel();
        $e = new userss();

        $PasswordHash = (md5($_REQUEST['PasswordHash']));
        $Analytic_Acc_id = $_REQUEST['Analytic_Acc_id'];
        echo $m->edit_inactive_pwd($PasswordHash, $Analytic_Acc_id);
    }


    //Delete user data page inactive
    if ($_REQUEST['methode'] == "del_userinactive") {
        $m = new LoginModel();
        $e = new userss();
        $e->setAnalytic_Acc_id($_REQUEST['delete_txtid']);
        echo $m->delete_userinact($e);
    }

    //Modify user data page active
    if ($_REQUEST['methode'] == "Edit_user_active") {

        $m = new LoginModel();
        $e = new userss();
        $SYS_User_name = $_REQUEST['SYS_User_name'];
        $USE_NAMEE = $_REQUEST['USE_NAMEE'];
        // $USE_PARENT_ID = $_REQUEST['USE_PARENT_ID'];
        $USE_BRA_ID = $_REQUEST['USE_BRA_ID'];
        $SYS_User_email = $_REQUEST['SYS_User_email'];
        $SYS_User_login = $_REQUEST['SYS_User_login'];
        $PasswordHash = (md5($_REQUEST['PasswordHash']));
        $Analytic_Acc_id = $_REQUEST['Analytic_Acc_id'];
        echo $m->edit_use_ctive($SYS_User_name, $USE_NAMEE, $USE_BRA_ID, $SYS_User_email, $SYS_User_login, $PasswordHash, $Analytic_Acc_id);
    }

    //Delete user data page inactive
    if ($_REQUEST['methode'] == "delt_user_active") {
        $m = new LoginModel();
        $e = new userss();
        $e->setAnalytic_Acc_id($_REQUEST['del_active_id']);
        echo $m->delet_user_act($e);
    }




    if ($_REQUEST['methode'] == "get_idbranchselected") {
        $ma = new LoginModel();
        $USE_BRA_ID = $_REQUEST['USE_BRA_ID'];;
        echo $ma->selected_user_bran($USE_BRA_ID);
    }


    if ($_REQUEST['methode'] == "view_branch") {
        $m = new LoginModel();
        $_SESSION['branch'] = $m->getallbranch();
    }
}

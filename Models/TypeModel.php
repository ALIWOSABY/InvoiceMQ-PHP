<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EnsiegnementModel
 *
 * @author pc
 */

require_once '../db/myPDO.php';
require_once '../Classes/types.php';
class TypeModel
{
    //put your code here
    public $pdo = null;

    function __construct()
    {
        $this->pdo = myPDO::getInstance();
    }

    public function insert_type($TYP_NAME, $TYP_NAMEE, $TYP_REP_NAME, $TYP_TYPE, $TYP_Sig_one, $TYP_Sig_two, $TYP_Sig_three,$TYP_INS_USER,$TYP_INS_DATE, $TYP_FREEZE)
    {
        try {
            // $st = $this->pdo->prepare("INSERT INTO `types`(`TYP_NAME`, `TYP_NAMEE`, `TYP_REP_NAME`, `TYP_TYPE`, `TYP_Sig_one`, `TYP_Sig_two`, `TYP_Sig_three`, `TYP_INS_USER`, `TYP_INS_DATE`,`TYP_FREEZE`) VALUES (:TYP_NAME,:TYP_NAMEE,:TYP_REP_NAME,:TYP_TYPE,:TYP_Sig_one,:TYP_Sig_two,:TYP_Sig_three,:TYP_INS_USER,:TYP_INS_DATE,:TYP_FREEZE)");
            $st = $this->pdo->prepare("SELECT `Ins_T`(:TYP_NAME,:TYP_NAMEE,:TYP_REP_NAME,:TYP_TYPE,:TYP_Sig_one,:TYP_Sig_two,:TYP_Sig_three,:TYP_INS_USER,:TYP_INS_DATE,:TYP_FREEZE) AS `Ins_T`;");
            $st->bindValue(':TYP_NAME', $TYP_NAME, PDO::PARAM_STR);
            $st->bindValue(':TYP_NAMEE', $TYP_NAMEE, PDO::PARAM_STR);
            $st->bindValue(':TYP_REP_NAME', $TYP_REP_NAME, PDO::PARAM_STR);
            $st->bindValue(':TYP_TYPE', $TYP_TYPE, PDO::PARAM_STR);
            $st->bindValue(':TYP_Sig_one', $TYP_Sig_one, PDO::PARAM_STR);
            $st->bindValue(':TYP_Sig_two', $TYP_Sig_two, PDO::PARAM_STR);
            $st->bindValue(':TYP_Sig_three', $TYP_Sig_three, PDO::PARAM_STR);            
            $st->bindValue(':TYP_INS_USER', $TYP_INS_USER, PDO::PARAM_INT);
            $st->bindValue(':TYP_INS_DATE', $TYP_INS_DATE, PDO::PARAM_STR);
            $st->bindValue(':TYP_FREEZE', $TYP_FREEZE, PDO::PARAM_STR);
            if ($st->execute()) {
                return "true";
                $success = "تم تسجيل طلبك بنجاح";
            } else {
                return "false";
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }



    public function getalltype()
    {
        try {
            $st = $this->pdo->prepare("SELECT * FROM types;");

            $st->setFetchMode(PDO::FETCH_CLASS, "types");
            $st->execute();
            $res = $st->fetchAll();

            return $res;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }



    public function edit_type($TYP_NAME, $TYP_NAMEE, $TYP_ID_edit, $TYP_REP_NAME, $TYP_TYPE, $TYP_Sig_one, $TYP_Sig_two, $TYP_Sig_three, $TYP_UPD_USER, $TYP_UPD_DATE, $TYP_FREEZE)
    {
        try {
            $st = $this->pdo->prepare("SELECT `Upd_T`(:TYP_ID,:TYP_NAME,:TYP_NAMEE,:TYP_REP_NAME,:TYP_TYPE,:TYP_Sig_one,:TYP_Sig_two,:TYP_Sig_three,:TYP_UPD_USER,:TYP_UPD_DATE,:TYP_FREEZE) AS `Upd_T`;");
            $myid = (int) $TYP_ID_edit;
            $st->bindValue(':TYP_ID', $myid, PDO::PARAM_INT);
            $st->bindValue(':TYP_NAME', $TYP_NAME, PDO::PARAM_STR);
            $st->bindValue(':TYP_NAMEE', $TYP_NAMEE, PDO::PARAM_STR);
            $st->bindValue(':TYP_REP_NAME', $TYP_REP_NAME, PDO::PARAM_STR);
            $st->bindValue(':TYP_TYPE', $TYP_TYPE, PDO::PARAM_STR);


            $st->bindValue(':TYP_Sig_one', $TYP_Sig_one, PDO::PARAM_STR);
            $st->bindValue(':TYP_Sig_two', $TYP_Sig_two, PDO::PARAM_STR);
            $st->bindValue(':TYP_Sig_three', $TYP_Sig_three, PDO::PARAM_STR);
           

            $st->bindValue(':TYP_UPD_USER', $TYP_UPD_USER, PDO::PARAM_INT);
            $st->bindValue(':TYP_UPD_DATE', $TYP_UPD_DATE, PDO::PARAM_STR);
            $st->bindValue(':TYP_FREEZE', $TYP_FREEZE, PDO::PARAM_STR);


            if ($st->execute()) {
                return "true";
                $success = "تم تسجيل طلبك بنجاح";
            } else {
                return "false";
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }



    public function delet_type(types $e)
    {
        try {
            $st = $this->pdo->prepare(" SELECT `Del_T`(:id) AS `Del_T`;");
            $st->bindValue(':id', $e->getTYP_ID(), PDO::PARAM_INT);


            if ($st->execute()) {
                return "true";
            } else {
                return "false";
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}

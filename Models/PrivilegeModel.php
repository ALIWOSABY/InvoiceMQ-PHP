<?php

require_once '../db/myPDO.php';
require_once '../Classes/privilege.class.php';
require_once '../Classes/securities.class.php';

// header('Content-Type:text/html; charset=utf-8');
class PrivilegeModel
{
    //
    public $pdo = null;

    function __construct()
    {
        $this->pdo = myPDO::getInstance();
    }

    public function getlastid_privilege()
    {
        try {
            $st = $this->pdo->prepare("CALL `Last_priv`();");
            $st->execute();
            $res = $st->fetch();
            if (count($res) === 0) {
                return 0;
            } else {
                return $res['Id_Prog'];
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function insert(privilege $e)
    {
        try {
            // $this->pdo 
            $st = $this->pdo->prepare("SELECT `Ins_priv`(:PRO_ID,:PRO_NAME,:PRO_NAMEE,:PRO_FILE_NAME,
            :PRO_SYS_NAME,:PRO_INS_USER,:PRO_FREEZE) AS `Ins_priv`;");
            $st->bindValue(':PRO_ID', $e->getPRO_ID(), PDO::PARAM_INT);
            $st->bindValue(':PRO_NAME', $e->getPRO_NAME(), PDO::PARAM_STR);
            $st->bindValue(':PRO_NAMEE', $e->getPRO_NAMEE(), PDO::PARAM_STR);
            $st->bindValue(':PRO_FILE_NAME', $e->getPRO_FILE_NAME(), PDO::PARAM_STR);
            $st->bindValue(':PRO_SYS_NAME', $e->getPRO_SYS_NAME(), PDO::PARAM_STR);
            $st->bindValue(':PRO_INS_USER', $e->getPRO_INS_USER(), PDO::PARAM_INT);
            $st->bindValue(':PRO_FREEZE', $e->getPRO_FREEZE(), PDO::PARAM_STR);

            if ($st->execute()) {
                return "true";
                // header('location:../Views/pages/page_currency.php'); 
            } else {
                return "false";
                //  header('location:../Views/pages/add_currency.php'); 
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    public function view_Privilege()
    {
        try {
            $st = $this->pdo->prepare("CALL `A_Priv`();");
            $st->setFetchMode(PDO::FETCH_CLASS, "privilege");
            $st->execute();
            return $st->fetchAll();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function edit_privilege(privilege $e)
    {
        try {

            $st = $this->pdo->prepare("SELECT `Upd_priv`(:id,:name,:name2,:file,
            :sys,:upd_user,:upd_date,:status) AS `Upd_priv`;");
         $st->bindValue(':id', $e->getPRO_ID(), PDO::PARAM_INT);
         $st->bindValue(':name', $e->getPRO_NAME(), PDO::PARAM_STR);
         $st->bindValue(':name2', $e->getPRO_NAMEE(), PDO::PARAM_STR);
         $st->bindValue(':file', $e->getPRO_FILE_NAME(), PDO::PARAM_STR);
         $st->bindValue(':sys', $e->getPRO_SYS_NAME(), PDO::PARAM_STR);
         $st->bindValue(':upd_user', $e->getPRO_UPD_USER(), PDO::PARAM_INT);
         $st->bindValue(':upd_date', $e->getPRO_UPD_DATE(), PDO::PARAM_STR);
         $st->bindValue(':status', $e->getPRO_FREEZE(), PDO::PARAM_STR);
        if ($st->execute()) {
           $CHPROG= $e->getPRO_FREEZE();
           if($CHPROG == 'Y')
           {
            return 'true';
           }
else
{
    $st2 = $this->pdo->prepare("DELETE FROM `securities` WHERE SEC_PRO_ID=:progid");
 $st2->bindValue(':progid', $e->getPRO_ID(), PDO::PARAM_INT);
 if ($st2->execute()) {
    return 'true';
 }
 else
 {
    return "false";
 }
}


               
            } else {
                return "false";
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }





    public function  chk_progs($privilege_id)
    {
        try {

            $st = $this->pdo->prepare("SELECT * from  securities WHERE SEC_PRO_ID=:del");
            $st->bindValue(':del', $privilege_id, PDO::PARAM_INT);
            $st->execute();
            if ($st->rowCount() > 0) {
                return 'false';
            } else {
                return 'true';
              
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }






    public function delete_privilege(privilege $e)
    {
        try {

            $st = $this->pdo->prepare("SELECT `Del_priv`(:id) AS `Del_priv`;");
            $st->bindValue(':id', $e->getPRO_ID(), PDO::PARAM_INT);
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

<?php

require_once '../db/myPDO.php';
require_once '../Classes/securities.class.php';


class SecuritiyModel
{
    //put your code here
    public $pdo = null;

    function __construct()
    {
        $this->pdo = myPDO::getInstance();
    }


    public function getallSecerity()
    {
        try {
            $st = $this->pdo->prepare("CALL `A_Sec`();");

            $st->setFetchMode(PDO::FETCH_CLASS, "securities");
            $st->execute();
            $res = $st->fetchAll();

            return $res;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function insert_securitiy(securities $e)
    {
        try {
            $st = $this->pdo->prepare("insert into securities values(:SEC_ID,:SEC_USE_ID,:SEC_BRA_ID)");
            $st->bindValue(':SEC_ID', $e->getSEC_ID(), PDO::PARAM_NULL);
            $st->bindValue(':SEC_USE_ID', $e->getSEC_USE_ID(), PDO::PARAM_INT);
            $st->bindValue(':SEC_BRA_ID', $e->getSEC_BRA_ID(), PDO::PARAM_INT);
            // $st->bindValue(':SEC_PRO_ID', $e->getSEC_PRO_ID(), PDO::PARAM_INT);
            // $st->bindValue(':SEC_INSERT', $e->getSEC_INSERT(), PDO::PARAM_STR);
            // $st->bindValue(':SEC_UPDATE', $e->getSEC_UPDATE(), PDO::PARAM_STR);
            // $st->bindValue(':SEC_DELETE', $e->getSEC_DELETE(), PDO::PARAM_STR);
            // $st->bindValue(':SEC_SHOW', $e->getSEC_SHOW(), PDO::PARAM_STR);
            // $st->bindValue(':SEC_FREEZE', $e->getSEC_FREEZE(), PDO::PARAM_STR);
        
            if ($st->execute()) {
                return "true";
            } else {
                return "false";
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }






    public function insert_all_securitiy(securities $e)
    {
        try {
            $st = $this->pdo->prepare(" 
            INSERT INTO securities (SEC_ID,SEC_USE_ID,SEC_BRA_ID,SEC_PRO_ID,SEC_INSERT,SEC_UPDATE,SEC_DELETE,SEC_SHOW,SEC_FREEZE) 
            SELECT :SEC_ID,:SEC_USE_ID,:SEC_BRA_ID,P.PRO_ID,'Y','Y','Y','Y','Y' FROM programs P 
            WHERE  PRO_FREEZE='Y' and NOT EXISTS (SELECT 'X' FROM securities WHERE SEC_USE_ID=:SEC_USE_ID AND SEC_BRA_ID=:SEC_BRA_ID AND SEC_PRO_ID=PRO_ID)");

           
            $st->bindValue(':SEC_ID', $e->getSEC_ID(), PDO::PARAM_NULL);
            $st->bindValue(':SEC_USE_ID', $e->getSEC_USE_ID(), PDO::PARAM_INT);
            $st->bindValue(':SEC_BRA_ID', $e->getSEC_BRA_ID(), PDO::PARAM_INT);
        //  $st->bindValue(':SEC_PRO_ID', $e->getSEC_PRO_ID(), PDO::PARAM_NULL);
            // $st->bindValue(':SEC_INSERT', $e->getSEC_INSERT(), PDO::PARAM_STR);
            // $st->bindValue(':SEC_UPDATE', $e->getSEC_UPDATE(), PDO::PARAM_STR);
            // $st->bindValue(':SEC_DELETE', $e->getSEC_DELETE(), PDO::PARAM_STR);
            // $st->bindValue(':SEC_SHOW', $e->getSEC_SHOW(), PDO::PARAM_STR);
            // $st->bindValue(':SEC_FREEZE', $e->getSEC_FREEZE(), PDO::PARAM_STR);
        
            if ($st->execute()) {
                return "true";
            } else {
                return "false";
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function edit_security($SEC_PRO_ID,$SEC_INSERT,$SEC_UPDATE,$SEC_DELETE,$SEC_SHOW,$SEC_FREEZE,$SEC_10,$SEC_11,$SEC_12,$SEC_13,$SEC_14,$SEC_15,$SEC_16,$SEC_ID)
    {
        try {
            $st = $this->pdo->prepare("UPDATE securities SET SEC_PRO_ID = :SEC_PRO_ID,SEC_INSERT = :SEC_INSERT,SEC_UPDATE = :SEC_UPDATE,SEC_DELETE = :SEC_DELETE,SEC_SHOW = :SEC_SHOW,SEC_FREEZE = :SEC_FREEZE,SEC_10=:SEC_10,SEC_11=:SEC_11,SEC_12=:SEC_12,SEC_13=:SEC_13,SEC_14=:SEC_14,SEC_15=:SEC_15,SEC_16=:SEC_16  WHERE SEC_ID = :SEC_ID");
            $myid = (int) $SEC_ID;
            $st->bindValue(':SEC_ID',$myid, PDO::PARAM_INT);
            $st->bindValue(':SEC_PRO_ID', $SEC_PRO_ID, PDO::PARAM_INT);
            $st->bindValue(':SEC_INSERT', $SEC_INSERT, PDO::PARAM_STR);
            $st->bindValue(':SEC_UPDATE', $SEC_UPDATE, PDO::PARAM_STR);
            $st->bindValue(':SEC_DELETE', $SEC_DELETE, PDO::PARAM_STR);
            $st->bindValue(':SEC_SHOW', $SEC_SHOW, PDO::PARAM_STR);
            $st->bindValue(':SEC_FREEZE', $SEC_FREEZE, PDO::PARAM_STR);

            $st->bindValue(':SEC_10', $SEC_10, PDO::PARAM_STR);
            $st->bindValue(':SEC_11', $SEC_11, PDO::PARAM_STR);
            $st->bindValue(':SEC_12', $SEC_12, PDO::PARAM_STR);
            $st->bindValue(':SEC_13', $SEC_13, PDO::PARAM_STR);
            $st->bindValue(':SEC_14', $SEC_14, PDO::PARAM_STR);
            $st->bindValue(':SEC_15', $SEC_15, PDO::PARAM_STR);
            $st->bindValue(':SEC_16', $SEC_16, PDO::PARAM_STR);

            if ($st->execute()) {
                return "true";
            } else {
                return "false";
            }


            return "true";
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}



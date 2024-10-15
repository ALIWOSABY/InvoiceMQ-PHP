<?php

require_once '../db/myPDO.php';
require_once '../Classes/cust.class.php';
require_once '../Classes/days.class.php';
require_once '../Classes/v_s.class.php';
require_once '../Classes/amnt_dlivd_cust.class.php';



$success = "";

class CustModel
{
    //put your code here
    public $pdo = null;

    function __construct()
    {
        $this->pdo = myPDO::getInstance();
    }


    public function getallCust()
    {
        try {
            $st = $this->pdo->prepare("SELECT * FROM `cust`;");

            $st->setFetchMode(PDO::FETCH_CLASS, "cust");
            $st->execute();
            $res = $st->fetchAll();

            return $res;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }


    public function getlastid_Cus()
    {
        try {
            $st = $this->pdo->prepare("SELECT  MAX(`CUST_ID`) as Id_Cust FROM `cust`");
            $st->execute();
            $res = $st->fetch();
            if (count($res) === 0) {
                return 0;
            } else {
                return $res['Id_Cust'];
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }


    public function insert_tb_cust(cust $c)
    {
        try {
            $st = $this->pdo->prepare("INSERT INTO `cust`(`CUST_ID`, `CUST_NAME`, `CUST_PHONE`, `CUST_EMAIL`, `CUST_INS_USER`, `CUST_FREEZE`) VALUES (:pc0, :pc1, :pc2, :pc3, :pc4, :pc5)");
            $st->bindValue(':pc0', $c->getCUSTID(), PDO::PARAM_INT);
            $st->bindValue(':pc1', $c->getCUSTNAME(), PDO::PARAM_STR);
            $st->bindValue(':pc2', $c->getCUSTPHONE(), PDO::PARAM_STR);
            $st->bindValue(':pc3', $c->getCUSTEMAIL(), PDO::PARAM_STR);
            $st->bindValue(':pc4', $c->getCUSTINSUSER(), PDO::PARAM_INT);
            $st->bindValue(':pc5', $c->getCUSTFREEZE(), PDO::PARAM_STR);
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


    public function edit_Custom(cust $e)
    {
        try {
            $st = $this->pdo->prepare("UPDATE `cust` SET `CUST_NAME`=:pc1,`CUST_PHONE`=:pc2,`CUST_EMAIL`=:pc3,`CUST_UPD_USER`=:pc4,`CUST_UPD_DATE`=:pc5,`CUST_FREEZE`=:pc6 WHERE `CUST_ID`=:pc0");
            $st->bindValue(':pc0', $e->getCUSTID(), PDO::PARAM_INT);
            $st->bindValue(':pc1', $e->getCUSTNAME(), PDO::PARAM_STR);
            $st->bindValue(':pc2', $e->getCUSTPHONE(), PDO::PARAM_STR);
            $st->bindValue(':pc3', $e->getCUSTEMAIL(), PDO::PARAM_STR);
            $st->bindValue(':pc4', $e->getCUSTUPDUSER(), PDO::PARAM_INT);
            $st->bindValue(':pc5', $e->getCUSTUPDDATE(), PDO::PARAM_STR);
            $st->bindValue(':pc6', $e->getCUSTFREEZE(), PDO::PARAM_STR);
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




    public function voutypid_cust($voutypno, $vouDate)
    {
        $query = "SELECT * FROM v_s WHERE VS_TYP_ID = " . $voutypno . " and year(VS_DAT) = " . $vouDate . "  order by VS_ID desc limit 1";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    }


    public function getcount_AVTC()
    {
        try {
            $st = $this->pdo->prepare("SELECT * FROM `v_s` WHERE VS_ST = 0;");

            $st->setFetchMode(PDO::FETCH_CLASS, "v_s");
            $st->execute();
            $res = $st->fetchAll();

            return $res;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
	


    
    public function check_and_change_cust($vtc_id)
    {
        try {
            $st = $this->pdo->prepare("SELECT SUM(TCTOTSALE) AS 'TCTOTSALE',SUM(TCMUS) AS TCMUS FROM v_s WHERE VS_ID=$vtc_id");
           
            // $st->bindValue(':id', $myid, PDO::PARAM_INT);
            if ($st->execute()) {
                $res = $st->fetch();
              $total= $res['TCTOTSALE']-$res['TCMUS'];
              if($total == 0){
                return 'true';
              }
              else{
                return "false";
              }
            } else {
                return "false";
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function dupdatestatus_cust($e)
    {
        try {
            $st = $this->pdo->prepare("update v_s set VS_ST = 1  where VS_ID = :id");
            $myid = (int) $e;
            $st->bindValue(':id', $myid, PDO::PARAM_INT);
            if ($st->execute()) {
                return "true";
            } else {
                return "false";
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }



    public function getcount_AVTCOne()
    {
        try {
            $st = $this->pdo->prepare("SELECT * FROM `v_s` WHERE VS_ST = 1;");

            $st->setFetchMode(PDO::FETCH_CLASS, "v_s");
            $st->execute();
            $res = $st->fetchAll();

            return $res;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getcount_AVTCTwo()
    {
        try {
            $st = $this->pdo->prepare("SELECT * FROM `v_s` WHERE VS_ST = 2;");

            $st->setFetchMode(PDO::FETCH_CLASS, "v_s");
            $st->execute();
            $res = $st->fetchAll();

            return $res;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }



    public function updatestatut_cust($e)
    {
        try {
            $st = $this->pdo->prepare("update v_s set VS_ST = 2  where VS_ID = :id");
            $myid = (int) $e;
            $st->bindValue(':id', $myid, PDO::PARAM_INT);
            if ($st->execute()) {
                return "true";
            } else {
                return "false";
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function updatestcus_refused($e)
    {
        try {
            $st = $this->pdo->prepare("update v_s set VS_ST = 0  where VS_ID = :id");
            $myid = (int) $e;
            $st->bindValue(':id', $myid, PDO::PARAM_INT);
            if ($st->execute()) {
                return "true";
            } else {
                return "false";
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }


    public function get_prin_VT_Cust($vou_id)
    {
        try {
            $st = $this->pdo->prepare("select * from v_s where VS_ID =:id");
            $st->bindValue(':id', $vou_id, PDO::PARAM_INT);
            $st->setFetchMode(PDO::FETCH_CLASS, "v_s");
            $st->execute();
            return $st->fetchAll();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }



    public function insert_tb_amntdlivd_cust(amnt_dlivd_cust $amt)
    {
        try {
            $st = $this->pdo->prepare("INSERT INTO `amnt_dlivd_cust`(`AMNTS_ID_cust`, `AMNTS_V_ID_cust`, `AMNTS_DAT_cust`, `VOU_USE_ID`, `VC_CUSTID_cust`, `TSTOTSALE_cust`, `TSMUS_cust`, `TSHISREMD_cust`, `TSONREMD_cust`, `DLIVAMNT_cust`)VALUES (:AMNTS_ID_cust,:AMNTS_V_ID_cust ,:AMNTS_DAT_cust, :VOU_USE_ID, :VC_CUSTID_cust, :TSTOTSALE_cust, :TSMUS_cust, :TSHISREMD_cust, :TSONREMD_cust, :DLIVAMNT_cust)");
            $st->bindValue(':AMNTS_ID_cust', $amt->getAMNTSIDCust(), PDO::PARAM_INT);
            $st->bindValue(':AMNTS_V_ID_cust', $amt->getAMNTSVIDCust(), PDO::PARAM_INT);
            $st->bindValue(':AMNTS_DAT_cust', $amt->getAMNTSDATCust(), PDO::PARAM_STR);
            $st->bindValue(':VOU_USE_ID', $amt->getVOUUSEID(), PDO::PARAM_INT);
            $st->bindValue(':VC_CUSTID_cust', $amt->getVCCUSTIDCust(), PDO::PARAM_INT);
            $st->bindValue(':TSTOTSALE_cust', $amt->getTSTOTSALECust(), PDO::PARAM_STR);
            $st->bindValue(':TSMUS_cust', $amt->getTSMUSCust(), PDO::PARAM_STR);
            $st->bindValue(':TSHISREMD_cust', $amt->getTSHISREMDCust(), PDO::PARAM_STR);
            $st->bindValue(':TSONREMD_cust', $amt->getTSONREMDCust(), PDO::PARAM_STR);
            $st->bindValue(':DLIVAMNT_cust', $amt->getDLIVAMNTCust(), PDO::PARAM_STR);

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




}

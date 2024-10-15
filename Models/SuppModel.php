<?php

require_once '../db/myPDO.php';
require_once '../Classes/supp.class.php';
require_once '../Classes/days.class.php';
require_once '../Classes/v_s.class.php';
require_once '../Classes/amnt_dlivd.class.php';


$success = "";

class SuppModel
{
    //put your code here
    public $pdo = null;

    function __construct()
    {
        $this->pdo = myPDO::getInstance();
    }


    public function getalldays()
    {
        try {
            $st = $this->pdo->prepare("SELECT * FROM days;");

            $st->setFetchMode(PDO::FETCH_CLASS, "days");
            $st->execute();
            $res = $st->fetchAll();

            return $res;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }


    public function getallSupp()
    {
        try {
            $st = $this->pdo->prepare("SELECT * FROM supp;");

            $st->setFetchMode(PDO::FETCH_CLASS, "supp");
            $st->execute();
            $res = $st->fetchAll();

            return $res;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }


    public function getcount_AVTS()
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


    public function getcount_AVTSOne()
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


    public function getcount_AVTSTwo()
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



    public function getlastid_S()
    {
        try {
            $st = $this->pdo->prepare("SELECT  MAX(`SUPP_ID`) as Id_S FROM `supp`");
            $st->execute();
            $res = $st->fetch();
            if (count($res) === 0) {
                return 0;
            } else {
                return $res['Id_S'];
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }


    public function insert_tb_S(supp $e)
    {
        try {
            $st = $this->pdo->prepare("INSERT INTO `supp`(`SUPP_ID`, `SUPP_NAME`, `SUPP_PHONE`, `SUPP_EMAIL`, `SUPP_INS_USER`, `SUPP_FREEZE`) VALUES (:pc0, :pc1, :pc2, :pc3, :pc4, :pc5)");
            $st->bindValue(':pc0', $e->getSUPPID(), PDO::PARAM_INT);
            $st->bindValue(':pc1', $e->getSUPPNAME(), PDO::PARAM_STR);
            $st->bindValue(':pc2', $e->getSUPPPHONE(), PDO::PARAM_STR);
            $st->bindValue(':pc3', $e->getSUPPEMAIL(), PDO::PARAM_STR);
            $st->bindValue(':pc4', $e->getSUPPINSUSER(), PDO::PARAM_INT);
            $st->bindValue(':pc5', $e->getSUPPFREEZE(), PDO::PARAM_STR);
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


    public function edit_supp(supp $e)
    {
        try {
            $st = $this->pdo->prepare("UPDATE `supp` SET `SUPP_NAME`=:pc1,`SUPP_PHONE`=:pc2,`SUPP_EMAIL`=:pc3,`SUPP_UPD_USER`=:pc4,`SUPP_UPD_DATE`=:pc5,`SUPP_FREEZE`=:pc6 WHERE `SUPP_ID`=:pc0");
            $st->bindValue(':pc0', $e->getSUPPID(), PDO::PARAM_INT);
            $st->bindValue(':pc1', $e->getSUPPNAME(), PDO::PARAM_STR);
            $st->bindValue(':pc2', $e->getSUPPPHONE(), PDO::PARAM_STR);
            $st->bindValue(':pc3', $e->getSUPPEMAIL(), PDO::PARAM_STR);
            $st->bindValue(':pc4', $e->getSUPPUPDUSER(), PDO::PARAM_INT);
            $st->bindValue(':pc5', $e->getSUPPUPDDATE(), PDO::PARAM_STR);
            $st->bindValue(':pc6', $e->getSUPPFREEZE(), PDO::PARAM_STR);
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


    public function voutypid($voutypno, $vouDate)
    {
        $query = "SELECT * FROM v_s WHERE VS_TYP_ID = " . $voutypno . " and year(VS_DAT) = " . $vouDate . "  order by VS_ID desc limit 1";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    }


    public function get_prin_VT_Supp($vou_id)
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




    public function check_and_change_m($vts_id)
    {
        try {
            $st = $this->pdo->prepare("SELECT SUM(TSTOTSALE) AS 'TSTOTSALE',SUM(TSMUS) AS TSMUS FROM v_s WHERE VS_ID=$vts_id");
           
            // $st->bindValue(':id', $myid, PDO::PARAM_INT);
            if ($st->execute()) {
                $res = $st->fetch();
              $total= $res['TSTOTSALE']-$res['TSMUS'];
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

    public function dupdatestatus($e)
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




    public function updatestatut_rest($e)
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


    public function updatestatut_refused($e)
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



    

    public function insert_tb_amntdlivd(amnt_dlivd $amt)
    {
        try {
            $st = $this->pdo->prepare("INSERT INTO `amnt_dlivd`(`AMNTS_ID`, `AMNTS_V_ID`, `AMNTS_DAT`, `VOU_USE_ID`, `AMTS_BENF`, `TSTOTSALE`, `TSMUS`, `TSHISREMD`, `TSONREMD`, `DLIVAMNT`)VALUES (:AMNTS_ID,:AMNTS_V_ID ,:AMNTS_DAT, :VOU_USE_ID, :AMTS_BENF, :TSTOTSALE, :TSMUS, :TSHISREMD, :TSONREMD, :DLIVAMNT)");
            $st->bindValue(':AMNTS_ID', $amt->getAMNTSID(), PDO::PARAM_INT);
            $st->bindValue(':AMNTS_V_ID', $amt->getAMNTSVID(), PDO::PARAM_INT);
            $st->bindValue(':AMNTS_DAT', $amt->getAMNTSDAT(), PDO::PARAM_STR);
            $st->bindValue(':VOU_USE_ID', $amt->getVOUUSEID(), PDO::PARAM_INT);
            $st->bindValue(':AMTS_BENF', $amt->getAMTSBENF(), PDO::PARAM_INT);
            $st->bindValue(':TSTOTSALE', $amt->getTSTOTSALE(), PDO::PARAM_STR);
            $st->bindValue(':TSMUS', $amt->getTSMUS(), PDO::PARAM_STR);
            $st->bindValue(':TSHISREMD', $amt->getTSHISREMD(), PDO::PARAM_STR);
            $st->bindValue(':TSONREMD', $amt->getTSONREMD(), PDO::PARAM_STR);
            $st->bindValue(':DLIVAMNT', $amt->getDLIVAMNT(), PDO::PARAM_STR);

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




    // public function get_get_all_supp_id($sup_id)
    // {
    //     try {
    //         $st = $this->pdo->prepare("SELECT * FROM `v_s` WHERE `VS_BENF` LIKE '$sup_id'");
    //         $st->bindValue(':id', $sup_id, PDO::PARAM_INT);
    //         $st->setFetchMode(PDO::FETCH_CLASS, "v_s");
    //         $st->execute();
    //         return $st->fetchAll();
    //     } catch (Exception $ex) {
    //         echo $ex->getMessage();
    //     }
    // }


    
}

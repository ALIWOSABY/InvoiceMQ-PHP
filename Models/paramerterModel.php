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
require_once '../Classes/paramerters.class.php';


class paramerterModel
{
    //put your code here
    public $pdo = null;

    function __construct()
    {
        $this->pdo = myPDO::getInstance();
    }

    public function getallParamter()
    {
        try {
            $st = $this->pdo->prepare("CALL `A_paramerters`();");

            $st->setFetchMode(PDO::FETCH_CLASS, "paramerters");
            $st->execute();
            $res = $st->fetchAll();

            return $res;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

 
    public function insert_paramerter(paramerters $e)
    {
        try {
           // $st = $this->pdo->prepare("insert into paramerters values(:Par_id,:par_name,:par_namee,:Par_BSUpdate,:Par_Fin_Y_End,:Par_Addr1,:Par_Addr2,:Par_Addr3)");
            $st = $this->pdo->prepare("SELECT `Ins_P`(:Par_id,:par_name,:par_namee,:Par_phone,:Par_website,:Par_Addr1,:Par_Addr1e,:Par_Addr2,:Par_Addr2e,:Par_Addr3,:Par_Addr3e,:Par_whatsapp,:Par_logo) AS `Ins_P`;");
            $st->bindValue(':Par_id', $e->getPar_id(), PDO::PARAM_NULL);
            $st->bindValue(':par_name', $e->getPar_name(), PDO::PARAM_STR);
            $st->bindValue(':par_namee', $e->getPar_namee(), PDO::PARAM_STR);
            $st->bindValue(':Par_phone', $e->getPar_phone(), PDO::PARAM_STR);
            $st->bindValue(':Par_website', $e->getPar_website(), PDO::PARAM_STR);


            $st->bindValue(':Par_Addr1', $e->getPar_Addr1(), PDO::PARAM_STR);
            $st->bindValue(':Par_Addr1e', $e->getPar_Addr1e(), PDO::PARAM_STR);


            $st->bindValue(':Par_Addr2', $e->getPar_Addr2(), PDO::PARAM_STR);
            $st->bindValue(':Par_Addr2e', $e->getPar_Addr2e(), PDO::PARAM_STR);


            $st->bindValue(':Par_Addr3', $e->getPar_Addr3(), PDO::PARAM_STR);
            $st->bindValue(':Par_Addr3e', $e->getPar_Addr3e(), PDO::PARAM_STR);


            $st->bindValue(':Par_whatsapp', $e->getPar_whatsapp(), PDO::PARAM_STR);
            $st->bindValue(':Par_logo', $e->getPar_logo(), PDO::PARAM_STR);



            if ($st->execute()) {
                return "true";
            } else {
                return "false";
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }


    public function edit_paramerter(paramerters $e)
    {
        try {
            $st = $this->pdo->prepare("SELECT `Upd_P`(:Par_id,:par_name,:par_namee,:Par_phone,:Par_website,:Par_Addr1,:Par_Addr2,:Par_Addr3,:Par_whatsapp,:Par_logo) AS `Upd_P`;");
            $st->bindValue(':Par_id', $e->getPar_id(), PDO::PARAM_INT);
            $st->bindValue(':par_name', $e->getPar_name(), PDO::PARAM_STR);
            $st->bindValue(':par_namee', $e->getPar_namee(), PDO::PARAM_STR);
            $st->bindValue(':Par_phone', $e->getPar_phone(), PDO::PARAM_STR);
            $st->bindValue(':Par_website', $e->getPar_website(), PDO::PARAM_STR);
            $st->bindValue(':Par_Addr1', $e->getPar_Addr1(), PDO::PARAM_STR);
            $st->bindValue(':Par_Addr2', $e->getPar_Addr2(), PDO::PARAM_STR);
            $st->bindValue(':Par_Addr3', $e->getPar_Addr3(), PDO::PARAM_STR);

            $st->bindValue(':Par_whatsapp', $e->getPar_whatsapp(), PDO::PARAM_STR);
            $st->bindValue(':Par_logo', $e->getPar_logo(), PDO::PARAM_STR);


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




    public function delet_paramerter(paramerters $e)
    {
        try {
            $st = $this->pdo->prepare("SELECT `Del_p`(:id) AS `Del_p`;");
            $st->bindValue(':id', $e->getPar_id(), PDO::PARAM_INT);


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
   



<?php

require_once '../db/myPDO.php';
require_once '../Classes/userss.php';
require_once '../Classes/branches.class.php';

$success = "";
class LoginModel
{

    //put your code here
    public $pdo = null;

    function __construct()
    {
        $this->pdo = myPDO::getInstance();
    }

    public function check_username($username)
    {
        try {
            $st = $this->pdo->prepare("SELECT `username_check`(fu0) AS `$username`;");
            $st->bindValue(':login', $username, PDO::PARAM_STR);
            $result = $st->execute();
            if ($st->rowCount() > 0) {
                return 'exesite deja';
            } else {
                return 'true';
            }
        } catch (Exception $ex) {
        }
    }

    public function check_email($email)
    {
        try {
            $st = $this->pdo->prepare("select * from userss where SYS_User_email = :email");
            $st->bindValue(':email', $email, PDO::PARAM_STR);
            $result = $st->execute();
            if ($st->rowCount() > 0) {
                return 'exesite deja';
            } else {
                return 'true';
            }
        } catch (Exception $ex) {
        }
    }

    public function login($login, $password)
    {
        try {
            $st = $this->pdo->prepare("select Analytic_Acc_id,SYS_User_status from userss where (SYS_User_login = :login or SYS_User_email = :email) and PasswordHash = :pass");
            $st->bindValue(':login', $login, PDO::PARAM_STR);
            $st->bindValue(':email', $login, PDO::PARAM_STR);
            $st->bindValue(':pass', $password, PDO::PARAM_STR);
            $result = $st->execute();
            $row = $st->fetch();
            if ($st->rowCount() > 0) {
                if ($row["SYS_User_status"] == "0") {
                    return "non activer";
                } else {


                    $st2 = $this->pdo->prepare("select u.Analytic_Acc_id as id,u.SYS_User_name,u.USE_NAMEE,u.USE_BRA_ID,u.SYS_User_email,u.SYS_User_login,u.PasswordHash,u.SYS_User_status from userss u  where u.SYS_User_status = 2 and u.Analytic_Acc_id = :id");
                    $st2->bindValue(':id', $row["Analytic_Acc_id"], PDO::PARAM_INT);
                    $st2->execute();
                    if ($st2->rowCount() > 0) {
                        return "admin";
                    } else
                        return "user";
                }
            } else {
                return 'false';
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }






    //Connexion Admin avec id
    public function getAdminstrateur($login)
    {

        try {
            $st = $this->pdo->prepare("select u.Analytic_Acc_id,u.SYS_User_name,u.USE_NAMEE,u.USE_BRA_ID,u.SYS_User_email,u.SYS_User_login,u.PasswordHash,u.SYS_User_status,b.Branch_desc as name_branch from userss u INNER JOIN branches b ON u.USE_BRA_ID=b.Branch_id where u.Analytic_Acc_id = Analytic_Acc_id and u.SYS_User_status = 2 and (u.SYS_User_login = :login or u.SYS_User_email = :logine)");
            $st->bindValue(':login', $login, PDO::PARAM_STR);
            $st->bindValue(':logine', $login, PDO::PARAM_STR);
            $st->setFetchMode(PDO::FETCH_CLASS, "userss");
            $result = $st->execute();
            $row = $st->fetchAll();
            return $row;
        } catch (Exception $ex) {
        }
    }

    //Connexion utilisateur avec id
    public function getUtilisateur($login)
    {

        try {
            $st = $this->pdo->prepare("select u.Analytic_Acc_id,u.SYS_User_name,u.USE_NAMEE,u.USE_BRA_ID,u.SYS_User_email,u.SYS_User_login,u.PasswordHash,u.SYS_User_status,b.Branch_desc as name_branch from userss u INNER JOIN branches b ON u.USE_BRA_ID=b.Branch_id where u.Analytic_Acc_id = Analytic_Acc_id and u.SYS_User_status = 1 and (u.SYS_User_login = :login or u.SYS_User_email = :logine)");
            $st->bindValue(':login', $login, PDO::PARAM_STR);
            $st->bindValue(':logine', $login, PDO::PARAM_STR);
            $st->setFetchMode(PDO::FETCH_CLASS, "userss");
            $result = $st->execute();
            $row = $st->fetchAll();
            return $row;
        } catch (Exception $ex) {
        }
    }

    //Voir sa page utilisateur seulement
    public function uaffectation($id)
    {
        try {

            $st = $this->pdo->prepare("select u.Analytic_Acc_id,u.SYS_User_name,u.USE_NAMEE,u.USE_BRA_ID,u.SYS_User_email,u.SYS_User_login,u.PasswordHash,u.SYS_User_status  from userss u where u.SYS_User_status=1 and Analytic_Acc_id = :id");
            $myid = (int) $id;
            $st->bindValue(':id', $myid, PDO::PARAM_INT);
            $st->setFetchMode(PDO::FETCH_CLASS, "userss");
            $st->execute();
            return $st->fetchAll();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function ins_etu(userss $e)
    {
        try {
            $st = $this->pdo->prepare("INSERT into userss (`SYS_User_name`, `USE_NAMEE`,`USE_BRA_ID`, `SYS_User_email`, `SYS_User_login`, `PasswordHash`, `SYS_User_status`) values(:SYS_User_name,:USE_NAMEE,:USE_BRA_ID,:SYS_User_email,:SYS_User_login,:PasswordHash,:SYS_User_status)");

            // $st->bindValue(':Analytic_Acc_id', $e->getAnalytic_Acc_id(), PDO::PARAM_INT);
            $st->bindValue(':SYS_User_name', $e->getSYS_User_name(), PDO::PARAM_STR);
            $st->bindValue(':USE_NAMEE', $e->getUSE_NAMEE(), PDO::PARAM_STR);
            // $st->bindValue(':USE_PARENT_ID', $e->getUSE_PARENT_ID(), PDO::PARAM_INT);
            $st->bindValue(':USE_BRA_ID', $e->getUSE_BRA_ID(), PDO::PARAM_INT);
            $st->bindValue(':SYS_User_email', $e->getSYS_User_email(), PDO::PARAM_STR);
            $st->bindValue(':SYS_User_login', $e->getSYS_User_login(), PDO::PARAM_STR);
            $st->bindValue(':PasswordHash', $e->getPasswordHash(), PDO::PARAM_STR);
            $st->bindValue(':SYS_User_status', $e->getSYS_User_status(), PDO::PARAM_INT);

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

    public function updateEtate($e)
    {
        try {
            $st = $this->pdo->prepare("update userss set SYS_User_status = 1  where Analytic_Acc_id = :id");
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

    public function affectation()
    {
        try {

            $st = $this->pdo->prepare("select u.Analytic_Acc_id,u.SYS_User_name,u.USE_NAMEE,u.USE_BRA_ID,u.SYS_User_email,u.SYS_User_login,u.PasswordHash,u.SYS_User_status  from userss u where u.SYS_User_status !=2;
            ");
            $st->setFetchMode(PDO::FETCH_CLASS, "userss");
            $st->execute();
            return $st->fetchAll();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }







    public function dupdateEtate($e)
    {
        try {
            $st = $this->pdo->prepare("update userss set SYS_User_status = 0  where Analytic_Acc_id = :id");
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


    public function daffectation($id)
    {
        try {

            $st = $this->pdo->prepare("select u.Analytic_Acc_id,u.SYS_User_name,u.USE_NAMEE,u.USE_BRA_ID,u.SYS_User_email,u.SYS_User_login,u.PasswordHash,u.SYS_User_status,b.Branch_id,b.Branch_desc as name_branch  from userss u INNER JOIN branches b ON u.USE_BRA_ID=b.Branch_id where u.SYS_User_status=1 and u.Analytic_Acc_id = :id");
            $myid = (int) $id;
            $st->bindValue(':id', $myid, PDO::PARAM_INT);
            $st->setFetchMode(PDO::FETCH_CLASS, "userss");
            $st->execute();
            return $st->fetchAll();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }


    //َAfficher les Utilisateurs Activs
    public function count_users_active()
    {
        try {

            $st = $this->pdo->prepare("select u.Analytic_Acc_id,u.SYS_User_name,u.USE_NAMEE,u.USE_BRA_ID,u.SYS_User_email,u.SYS_User_login,u.PasswordHash,u.SYS_User_status,b.Branch_id,b.Branch_desc as name_branch  from userss u INNER JOIN branches b ON u.USE_BRA_ID=b.Branch_id where u.SYS_User_status=1");
            $st->setFetchMode(PDO::FETCH_CLASS, "userss");
            $st->execute();
            return $st->fetchAll();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }


    //َAfficher les Utilisateurs Not Acitves
    public function count_users_not_active()
    {
        try {
            $st = $this->pdo->prepare("select u.Analytic_Acc_id,u.SYS_User_name,u.USE_NAMEE,u.USE_BRA_ID,u.SYS_User_email,u.SYS_User_login,u.PasswordHash,u.SYS_User_status,b.Branch_id,b.Branch_desc as name_branch  from userss u INNER JOIN branches b ON u.USE_BRA_ID=b.Branch_id where u.SYS_User_status=0");
            $st->setFetchMode(PDO::FETCH_CLASS, "userss");
            $st->execute();
            return $st->fetchAll();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }







    public function edit_inactive($SYS_User_name, $USE_NAMEE, $USE_BRA_ID, $SYS_User_email, $SYS_User_login, $SYS_User_status, $Analytic_Acc_id)
    {

        try {
            $st = $this->pdo->prepare("update userss set SYS_User_name = :SYS_User_name,USE_NAMEE = :USE_NAMEE,USE_BRA_ID = :USE_BRA_ID,SYS_User_email = :SYS_User_email,SYS_User_login = :SYS_User_login,SYS_User_status= :SYS_User_status where Analytic_Acc_id = :Analytic_Acc_id");
            $myid = (int) $Analytic_Acc_id;
            $st->bindValue(':Analytic_Acc_id', $myid, PDO::PARAM_INT);
            $st->bindValue(':SYS_User_name', $SYS_User_name, PDO::PARAM_STR);
            $st->bindValue(':USE_NAMEE', $USE_NAMEE, PDO::PARAM_STR);
            // $st->bindValue(':USE_PARENT_ID', $USE_PARENT_ID, PDO::PARAM_INT);
            $st->bindValue(':USE_BRA_ID', $USE_BRA_ID, PDO::PARAM_INT);
            $st->bindValue(':SYS_User_email', $SYS_User_email, PDO::PARAM_STR);
            $st->bindValue(':SYS_User_login', $SYS_User_login, PDO::PARAM_STR);
            $st->bindValue(':SYS_User_status', $SYS_User_status, PDO::PARAM_INT);
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



    public function edit_inactive_pwd($PasswordHash, $Analytic_Acc_id)
    {

        try {
            $st = $this->pdo->prepare("update userss set PasswordHash= :PasswordHash where Analytic_Acc_id = :Analytic_Acc_id");
            $myid = (int) $Analytic_Acc_id;
            $st->bindValue(':Analytic_Acc_id', $myid, PDO::PARAM_INT);
            $st->bindValue(':PasswordHash', $PasswordHash, PDO::PARAM_STR);
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


    public function delete_userinact(userss $e)
    {
        try {
            $st = $this->pdo->prepare("delete from userss where Analytic_Acc_id = :id");
            $st->bindValue(':id', $e->getAnalytic_Acc_id(), PDO::PARAM_INT);


            if ($st->execute()) {
                return "true";
            } else {
                return "false";
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }


    public function edit_use_ctive($SYS_User_name, $USE_NAMEE, $USE_BRA_ID, $SYS_User_email, $SYS_User_login, $PasswordHash, $Analytic_Acc_id)
    {
        try {
            $st = $this->pdo->prepare("update userss set SYS_User_name = :SYS_User_name,USE_NAMEE = :USE_NAMEE,USE_BRA_ID = :USE_BRA_ID,SYS_User_email = :SYS_User_email,SYS_User_login = :SYS_User_login,PasswordHash= :PasswordHash where Analytic_Acc_id = :Analytic_Acc_id");
            $myid = (int) $Analytic_Acc_id;
            $st->bindValue(':Analytic_Acc_id', $myid, PDO::PARAM_INT);
            $st->bindValue(':SYS_User_name', $SYS_User_name, PDO::PARAM_STR);
            $st->bindValue(':USE_NAMEE', $USE_NAMEE, PDO::PARAM_STR);
            // $st->bindValue(':USE_PARENT_ID', $USE_PARENT_ID, PDO::PARAM_INT);
            $st->bindValue(':USE_BRA_ID', $USE_BRA_ID, PDO::PARAM_INT);
            $st->bindValue(':SYS_User_email', $SYS_User_email, PDO::PARAM_STR);
            $st->bindValue(':SYS_User_login', $SYS_User_login, PDO::PARAM_STR);
            $st->bindValue(':PasswordHash', $PasswordHash, PDO::PARAM_STR);


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


    public function delet_user_act(userss $e)
    {
        try {
            $st = $this->pdo->prepare("delete from userss where Analytic_Acc_id = :id");
            $st->bindValue(':id', $e->getAnalytic_Acc_id(), PDO::PARAM_INT);


            if ($st->execute()) {
                return "true";
            } else {
                return "false";
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }






    public function selected_user_bran($USE_BRA_ID)
    {

        try {
            $st = $this->pdo->prepare("SELECT u.Analytic_Acc_id,u.USE_NAMEE,u.USE_BRA_ID FROM userss u WHERE  u.USE_BRA_ID = :USE_BRA_ID AND u.Analytic_Acc_id=u.Analytic_Acc_id ORDER BY u.Analytic_Acc_id");

            //$st->bindValue(':CUS_ID', $CUS_ID, PDO::PARAM_STR);
            $st->bindValue(':USE_BRA_ID', $USE_BRA_ID, PDO::PARAM_STR);
            $st->execute();
            $CUS_GRP = $st->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($CUS_GRP);

        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }


    public function getallbranch()
    {
        try {
            $st = $this->pdo->prepare("SELECT * FROM `branches`");
            $st->setFetchMode(PDO::FETCH_CLASS, "branches");
            $st->execute();
            $res = $st->fetchAll();

            return $res;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}

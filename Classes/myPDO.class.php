<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of myPDO
 *
 * @author pc
 */
class myPDO {
    private static $_DSN = null;
    private static $_PDOinstance = null;
    private static $_username = null;
    private static $_password = null;
    private static $_driver_option = array(
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );
    
    private function __construct() {
        
    }
    public static function hasConfiguration()
    {
        return self::$_DSN !== null;
    }
    public static function getInstance()
    {
        if(is_null(self::$_PDOinstance))
        {
            if(self::hasConfiguration())
            {
                try {
                    self::$_PDOinstance = new PDO(self::$_DSN, self::$_username, self::$_password, self::$_driver_option);
                } catch (PDOException $exc) {
                    echo $exc->getMessage();
                }

                
            }
            else
            {
                throw new Exception(__CLASS__."please se Configuration");
            }
        }
        return self::$_PDOinstance;
    }
    public static function setConfiguration($dsn,$username,$password, array $driver_option = array())
    {
        self::$_DSN = $dsn;
        self::$_username = $username;
        self::$_password = $password;
        self::$_driver_option = $driver_option + self::$_driver_option;
    }
}

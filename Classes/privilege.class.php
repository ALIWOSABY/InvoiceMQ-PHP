<?php

class  privilege{
    private  $PRO_ID  ;
    private  $PRO_NAME;
    private  $PRO_NAMEE ;
    private  $PRO_FILE_NAME ;
    private  $PRO_SYS_NAME;
    private  $PRO_INS_USER;
    private  $PRO_INS_DATE;
    private  $PRO_UPD_USER;
    private  $PRO_UPD_DATE;
    private  $PRO_FREEZE;
    

    public function __construct(){

    }
    public function getPRO_ID()
    {
        return $this->PRO_ID;
    }
    public function setPRO_ID($PRO_ID)
    {
        $this->PRO_ID = $PRO_ID;

        return $this;
    }
    public function getPRO_NAME()
    {
        return $this->PRO_NAME;
    }
    public function setPRO_NAME($PRO_NAME)
    {
        $this->PRO_NAME = $PRO_NAME;

        return $this;
    }
    public function getPRO_NAMEE()
    {
        return $this->PRO_NAMEE;
    }
    public function setPRO_NAMEE($PRO_NAMEE)
    {
        $this->PRO_NAMEE = $PRO_NAMEE;

        return $this;
    }
    public function getPRO_FILE_NAME()
    {
        return $this->PRO_FILE_NAME;
    }
    public function setPRO_FILE_NAME($PRO_FILE_NAME)
    {
        $this->PRO_FILE_NAME = $PRO_FILE_NAME;

        return $this;
    }
    public function getPRO_SYS_NAME()
    {
        return $this->PRO_SYS_NAME;
    }
    public function setPRO_SYS_NAME($PRO_SYS_NAME)
    {
        $this->PRO_SYS_NAME = $PRO_SYS_NAME;

        return $this;
    }
    public function getPRO_INS_USER()
    {
        return $this->PRO_INS_USER;
    }
    public function setPRO_INS_USER($PRO_INS_USER)
    {
        $this->PRO_INS_USER = $PRO_INS_USER;

        return $this;
    }
    public function getPRO_INS_DATE()
    {
        return $this->PRO_INS_DATE;
    } 
    public function setPRO_INS_DATE($PRO_INS_DATE)
    {
        $this->PRO_INS_DATE = $PRO_INS_DATE;

        return $this;
    }
    public function getPRO_UPD_USER()
    {
        return $this->PRO_UPD_USER;
    }
    public function setPRO_UPD_USER($PRO_UPD_USER)
    {
        $this->PRO_UPD_USER = $PRO_UPD_USER;

        return $this;
    }
    public function getPRO_UPD_DATE()
    {
        return $this->PRO_UPD_DATE;
    }
    public function setPRO_UPD_DATE($PRO_UPD_DATE)
    {
        $this->PRO_UPD_DATE = $PRO_UPD_DATE;

        return $this;
    }
    public function getPRO_FREEZE()
    {
        return $this->PRO_FREEZE;
    }
    public function setPRO_FREEZE($PRO_FREEZE)
    {
        $this->PRO_FREEZE = $PRO_FREEZE;

        return $this;
    }
}
?>
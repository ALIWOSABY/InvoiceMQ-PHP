<?php


class branches{
 
    private $Branch_id;
    private $Branch_desc;
    private $prn_id;
    private $Parent_id;
    private $BRA_NAMEE;
    private $BRA_ADDRESS1;
    private $BRA_ADDRESS2;
    private $BRA_ADDRESS3;
    private $BRA_TEL_NO;
    private $BRA_FAX_NO;
    private $BRA_MAIL;
    private $BRA_CUS_RANGE1;
    private $BRA_CUS_RANGE2;


    private $BRA_INS_USER;
    private $BRA_INS_DATE;
    private $BRA_UPD_USER;
    private $BRA_UPD_DATE;
    private $BRA_FREEZE;


    

    public function __construct()
    {
        
    }

    

    



    /**
     * Get the value of Branch_id
     */ 
    public function getBranch_id()
    {
        return $this->Branch_id;
    }

    /**
     * Set the value of Branch_id
     *
     * @return  self
     */ 
    public function setBranch_id($Branch_id)
    {
        $this->Branch_id = $Branch_id;

        return $this;
    }

    /**
     * Get the value of Branch_desc
     */ 
    public function getBranch_desc()
    {
        return $this->Branch_desc;
    }

    /**
     * Set the value of Branch_desc
     *
     * @return  self
     */ 
    public function setBranch_desc($Branch_desc)
    {
        $this->Branch_desc = $Branch_desc;

        return $this;
    }

    /**
     * Get the value of Parent_id
     */ 
    public function getParent_id()
    {
        return $this->Parent_id;
    }

    /**
     * Set the value of Parent_id
     *
     * @return  self
     */ 
    public function setParent_id($Parent_id)
    {
        $this->Parent_id = $Parent_id;

        return $this;
    }

    /**
     * Get the value of BRA_NAMEE
     */ 
    public function getBRA_NAMEE()
    {
        return $this->BRA_NAMEE;
    }

    /**
     * Set the value of BRA_NAMEE
     *
     * @return  self
     */ 
    public function setBRA_NAMEE($BRA_NAMEE)
    {
        $this->BRA_NAMEE = $BRA_NAMEE;

        return $this;
    }

    /**
     * Get the value of BRA_ADDRESS1
     */ 
    public function getBRA_ADDRESS1()
    {
        return $this->BRA_ADDRESS1;
    }

    /**
     * Set the value of BRA_ADDRESS1
     *
     * @return  self
     */ 
    public function setBRA_ADDRESS1($BRA_ADDRESS1)
    {
        $this->BRA_ADDRESS1 = $BRA_ADDRESS1;

        return $this;
    }

    /**
     * Get the value of BRA_ADDRESS2
     */ 
    public function getBRA_ADDRESS2()
    {
        return $this->BRA_ADDRESS2;
    }

    /**
     * Set the value of BRA_ADDRESS2
     *
     * @return  self
     */ 
    public function setBRA_ADDRESS2($BRA_ADDRESS2)
    {
        $this->BRA_ADDRESS2 = $BRA_ADDRESS2;

        return $this;
    }

    /**
     * Get the value of BRA_TEL_NO
     */ 
    public function getBRA_TEL_NO()
    {
        return $this->BRA_TEL_NO;
    }

    /**
     * Set the value of BRA_TEL_NO
     *
     * @return  self
     */ 
    public function setBRA_TEL_NO($BRA_TEL_NO)
    {
        $this->BRA_TEL_NO = $BRA_TEL_NO;

        return $this;
    }





    /**
     * Get the value of BRA_FAX_NO
     */ 
    public function getBRA_FAX_NO()
    {
        return $this->BRA_FAX_NO;
    }

    /**
     * Set the value of BRA_FAX_NO
     *
     * @return  self
     */ 
    public function setBRA_FAX_NO($BRA_FAX_NO)
    {
        $this->BRA_FAX_NO = $BRA_FAX_NO;

        return $this;
    }

    /**
     * Get the value of BRA_MAIL
     */ 
    public function getBRA_MAIL()
    {
        return $this->BRA_MAIL;
    }

    /**
     * Set the value of BRA_MAIL
     *
     * @return  self
     */ 
    public function setBRA_MAIL($BRA_MAIL)
    {
        $this->BRA_MAIL = $BRA_MAIL;

        return $this;
    }

    /**
     * Get the value of BRA_CUS_RANGE1
     */ 
    public function getBRA_CUS_RANGE1()
    {
        return $this->BRA_CUS_RANGE1;
    }

    /**
     * Set the value of BRA_CUS_RANGE1
     *
     * @return  self
     */ 
    public function setBRA_CUS_RANGE1($BRA_CUS_RANGE1)
    {
        $this->BRA_CUS_RANGE1 = $BRA_CUS_RANGE1;

        return $this;
    }

    /**
     * Get the value of BRA_CUS_RANGE2
     */ 
    public function getBRA_CUS_RANGE2()
    {
        return $this->BRA_CUS_RANGE2;
    }

    /**
     * Set the value of BRA_CUS_RANGE2
     *
     * @return  self
     */ 
    public function setBRA_CUS_RANGE2($BRA_CUS_RANGE2)
    {
        $this->BRA_CUS_RANGE2 = $BRA_CUS_RANGE2;

        return $this;
    }




    /**
     * Get the value of prn_id
     */ 
    public function getPrn_id()
    {
        return $this->prn_id;
    }

    /**
     * Set the value of prn_id
     *
     * @return  self
     */ 
    public function setPrn_id($prn_id)
    {
        $this->prn_id = $prn_id;

        return $this;
    }

    /**
     * Get the value of BRA_ADDRESS3
     */ 
    public function getBRA_ADDRESS3()
    {
        return $this->BRA_ADDRESS3;
    }

    /**
     * Set the value of BRA_ADDRESS3
     *
     * @return  self
     */ 
    public function setBRA_ADDRESS3($BRA_ADDRESS3)
    {
        $this->BRA_ADDRESS3 = $BRA_ADDRESS3;

        return $this;
    }

    /**
     * Get the value of BRA_INS_USER
     */ 
    public function getBRA_INS_USER()
    {
        return $this->BRA_INS_USER;
    }

    /**
     * Set the value of BRA_INS_USER
     *
     * @return  self
     */ 
    public function setBRA_INS_USER($BRA_INS_USER)
    {
        $this->BRA_INS_USER = $BRA_INS_USER;

        return $this;
    }

    /**
     * Get the value of BRA_INS_DATE
     */ 
    public function getBRA_INS_DATE()
    {
        return $this->BRA_INS_DATE;
    }

    /**
     * Set the value of BRA_INS_DATE
     *
     * @return  self
     */ 
    public function setBRA_INS_DATE($BRA_INS_DATE)
    {
        $this->BRA_INS_DATE = $BRA_INS_DATE;

        return $this;
    }

    /**
     * Get the value of BRA_UPD_USER
     */ 
    public function getBRA_UPD_USER()
    {
        return $this->BRA_UPD_USER;
    }

    /**
     * Set the value of BRA_UPD_USER
     *
     * @return  self
     */ 
    public function setBRA_UPD_USER($BRA_UPD_USER)
    {
        $this->BRA_UPD_USER = $BRA_UPD_USER;

        return $this;
    }

    /**
     * Get the value of BRA_UPD_DATE
     */ 
    public function getBRA_UPD_DATE()
    {
        return $this->BRA_UPD_DATE;
    }

    /**
     * Set the value of BRA_UPD_DATE
     *
     * @return  self
     */ 
    public function setBRA_UPD_DATE($BRA_UPD_DATE)
    {
        $this->BRA_UPD_DATE = $BRA_UPD_DATE;

        return $this;
    }

    /**
     * Get the value of BRA_FREEZE
     */ 
    public function getBRA_FREEZE()
    {
        return $this->BRA_FREEZE;
    }

    /**
     * Set the value of BRA_FREEZE
     *
     * @return  self
     */ 
    public function setBRA_FREEZE($BRA_FREEZE)
    {
        $this->BRA_FREEZE = $BRA_FREEZE;

        return $this;
    }
}
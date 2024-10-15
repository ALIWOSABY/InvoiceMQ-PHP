<?php
class cust
{

    private $CUST_ID;
    private $CUST_NAME;
    private $CUST_PHONE;
    private $CUST_EMAIL;
    private $CUST_INS_USER;
    private  $CUST_INS_DATE;
    private  $CUST_UPD_USER;
    private  $CUST_UPD_DATE;
    private  $CUST_FREEZE;


    public function __construct()
    {
    }


    /**
     * Get the value of CUST_ID
     */
    public function getCUSTID()
    {
        return $this->CUST_ID;
    }

    /**
     * Set the value of CUST_ID
     */
    public function setCUSTID($CUST_ID): self
    {
        $this->CUST_ID = $CUST_ID;

        return $this;
    }

    /**
     * Get the value of CUST_NAME
     */
    public function getCUSTNAME()
    {
        return $this->CUST_NAME;
    }

    /**
     * Set the value of CUST_NAME
     */
    public function setCUSTNAME($CUST_NAME): self
    {
        $this->CUST_NAME = $CUST_NAME;

        return $this;
    }

    /**
     * Get the value of CUST_PHONE
     */
    public function getCUSTPHONE()
    {
        return $this->CUST_PHONE;
    }

    /**
     * Set the value of CUST_PHONE
     */
    public function setCUSTPHONE($CUST_PHONE): self
    {
        $this->CUST_PHONE = $CUST_PHONE;

        return $this;
    }

    /**
     * Get the value of CUST_EMAIL
     */
    public function getCUSTEMAIL()
    {
        return $this->CUST_EMAIL;
    }

    /**
     * Set the value of CUST_EMAIL
     */
    public function setCUSTEMAIL($CUST_EMAIL): self
    {
        $this->CUST_EMAIL = $CUST_EMAIL;

        return $this;
    }

    /**
     * Get the value of CUST_INS_USER
     */
    public function getCUSTINSUSER()
    {
        return $this->CUST_INS_USER;
    }

    /**
     * Set the value of CUST_INS_USER
     */
    public function setCUSTINSUSER($CUST_INS_USER): self
    {
        $this->CUST_INS_USER = $CUST_INS_USER;

        return $this;
    }

    /**
     * Get the value of CUST_INS_DATE
     */
    public function getCUSTINSDATE()
    {
        return $this->CUST_INS_DATE;
    }

    /**
     * Set the value of CUST_INS_DATE
     */
    public function setCUSTINSDATE($CUST_INS_DATE): self
    {
        $this->CUST_INS_DATE = $CUST_INS_DATE;

        return $this;
    }

    /**
     * Get the value of CUST_UPD_USER
     */
    public function getCUSTUPDUSER()
    {
        return $this->CUST_UPD_USER;
    }

    /**
     * Set the value of CUST_UPD_USER
     */
    public function setCUSTUPDUSER($CUST_UPD_USER): self
    {
        $this->CUST_UPD_USER = $CUST_UPD_USER;

        return $this;
    }

    /**
     * Get the value of CUST_UPD_DATE
     */
    public function getCUSTUPDDATE()
    {
        return $this->CUST_UPD_DATE;
    }

    /**
     * Set the value of CUST_UPD_DATE
     */
    public function setCUSTUPDDATE($CUST_UPD_DATE): self
    {
        $this->CUST_UPD_DATE = $CUST_UPD_DATE;

        return $this;
    }

    /**
     * Get the value of CUST_FREEZE
     */
    public function getCUSTFREEZE()
    {
        return $this->CUST_FREEZE;
    }

    /**
     * Set the value of CUST_FREEZE
     */
    public function setCUSTFREEZE($CUST_FREEZE): self
    {
        $this->CUST_FREEZE = $CUST_FREEZE;

        return $this;
    }
}

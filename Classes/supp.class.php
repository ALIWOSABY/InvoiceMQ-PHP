<?php
class  supp
{

    private $SUPP_ID;
    private $SUPP_NAME;
    private $SUPP_PHONE;
    private $SUPP_EMAIL;
    private $SUPP_INS_USER;
    private  $SUPP_INS_DATE;
    private  $SUPP_UPD_USER;
    private  $SUPP_UPD_DATE;
    private  $SUPP_FREEZE;


    public function __construct()
    {
    }



    /**
     * Get the value of SUPP_ID
     */
    public function getSUPPID()
    {
        return $this->SUPP_ID;
    }

    /**
     * Set the value of SUPP_ID
     */
    public function setSUPPID($SUPP_ID): self
    {
        $this->SUPP_ID = $SUPP_ID;

        return $this;
    }

    /**
     * Get the value of SUPP_NAME
     */
    public function getSUPPNAME()
    {
        return $this->SUPP_NAME;
    }

    /**
     * Set the value of SUPP_NAME
     */
    public function setSUPPNAME($SUPP_NAME): self
    {
        $this->SUPP_NAME = $SUPP_NAME;

        return $this;
    }

    /**
     * Get the value of SUPP_PHONE
     */
    public function getSUPPPHONE()
    {
        return $this->SUPP_PHONE;
    }

    /**
     * Set the value of SUPP_PHONE
     */
    public function setSUPPPHONE($SUPP_PHONE): self
    {
        $this->SUPP_PHONE = $SUPP_PHONE;

        return $this;
    }

    /**
     * Get the value of SUPP_EMAIL
     */
    public function getSUPPEMAIL()
    {
        return $this->SUPP_EMAIL;
    }

    /**
     * Set the value of SUPP_EMAIL
     */
    public function setSUPPEMAIL($SUPP_EMAIL): self
    {
        $this->SUPP_EMAIL = $SUPP_EMAIL;

        return $this;
    }

    /**
     * Get the value of SUPP_INS_USER
     */
    public function getSUPPINSUSER()
    {
        return $this->SUPP_INS_USER;
    }

    /**
     * Set the value of SUPP_INS_USER
     */
    public function setSUPPINSUSER($SUPP_INS_USER): self
    {
        $this->SUPP_INS_USER = $SUPP_INS_USER;

        return $this;
    }

    /**
     * Get the value of SUPP_INS_DATE
     */
    public function getSUPPINSDATE()
    {
        return $this->SUPP_INS_DATE;
    }

    /**
     * Set the value of SUPP_INS_DATE
     */
    public function setSUPPINSDATE($SUPP_INS_DATE): self
    {
        $this->SUPP_INS_DATE = $SUPP_INS_DATE;

        return $this;
    }

    /**
     * Get the value of SUPP_UPD_USER
     */
    public function getSUPPUPDUSER()
    {
        return $this->SUPP_UPD_USER;
    }

    /**
     * Set the value of SUPP_UPD_USER
     */
    public function setSUPPUPDUSER($SUPP_UPD_USER): self
    {
        $this->SUPP_UPD_USER = $SUPP_UPD_USER;

        return $this;
    }

    /**
     * Get the value of SUPP_UPD_DATE
     */
    public function getSUPPUPDDATE()
    {
        return $this->SUPP_UPD_DATE;
    }

    /**
     * Set the value of SUPP_UPD_DATE
     */
    public function setSUPPUPDDATE($SUPP_UPD_DATE): self
    {
        $this->SUPP_UPD_DATE = $SUPP_UPD_DATE;

        return $this;
    }

    /**
     * Get the value of SUPP_FREEZE
     */
    public function getSUPPFREEZE()
    {
        return $this->SUPP_FREEZE;
    }

    /**
     * Set the value of SUPP_FREEZE
     */
    public function setSUPPFREEZE($SUPP_FREEZE): self
    {
        $this->SUPP_FREEZE = $SUPP_FREEZE;

        return $this;
    }
}

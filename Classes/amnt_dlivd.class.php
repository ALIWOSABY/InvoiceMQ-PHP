<?php
class amnt_dlivd
{

    private $AMNTS_ID;
    private $AMNTS_V_ID;
    private $AMNTS_DAT;
    private $VOU_USE_ID;
    private $AMTS_BENF;
    private  $TSTOTSALE;
    private  $TSMUS;
    private  $TSHISREMD;
    private  $TSONREMD;
    private  $DLIVAMNT;



    public function __construct()
    {
    }





    /**
     * Get the value of AMNTS_ID
     */
    public function getAMNTSID()
    {
        return $this->AMNTS_ID;
    }

    /**
     * Set the value of AMNTS_ID
     */
    public function setAMNTSID($AMNTS_ID): self
    {
        $this->AMNTS_ID = $AMNTS_ID;

        return $this;
    }

    /**
     * Get the value of AMNTS_V_ID
     */
    public function getAMNTSVID()
    {
        return $this->AMNTS_V_ID;
    }

    /**
     * Set the value of AMNTS_V_ID
     */
    public function setAMNTSVID($AMNTS_V_ID): self
    {
        $this->AMNTS_V_ID = $AMNTS_V_ID;

        return $this;
    }

    /**
     * Get the value of AMNTS_DAT
     */
    public function getAMNTSDAT()
    {
        return $this->AMNTS_DAT;
    }

    /**
     * Set the value of AMNTS_DAT
     */
    public function setAMNTSDAT($AMNTS_DAT): self
    {
        $this->AMNTS_DAT = $AMNTS_DAT;

        return $this;
    }

    /**
     * Get the value of VOU_USE_ID
     */
    public function getVOUUSEID()
    {
        return $this->VOU_USE_ID;
    }

    /**
     * Set the value of VOU_USE_ID
     */
    public function setVOUUSEID($VOU_USE_ID): self
    {
        $this->VOU_USE_ID = $VOU_USE_ID;

        return $this;
    }

    /**
     * Get the value of AMTS_BENF
     */
    public function getAMTSBENF()
    {
        return $this->AMTS_BENF;
    }

    /**
     * Set the value of AMTS_BENF
     */
    public function setAMTSBENF($AMTS_BENF): self
    {
        $this->AMTS_BENF = $AMTS_BENF;

        return $this;
    }

    /**
     * Get the value of TSTOTSALE
     */
    public function getTSTOTSALE()
    {
        return $this->TSTOTSALE;
    }

    /**
     * Set the value of TSTOTSALE
     */
    public function setTSTOTSALE($TSTOTSALE): self
    {
        $this->TSTOTSALE = $TSTOTSALE;

        return $this;
    }

    /**
     * Get the value of TSMUS
     */
    public function getTSMUS()
    {
        return $this->TSMUS;
    }

    /**
     * Set the value of TSMUS
     */
    public function setTSMUS($TSMUS): self
    {
        $this->TSMUS = $TSMUS;

        return $this;
    }

    /**
     * Get the value of TSHISREMD
     */
    public function getTSHISREMD()
    {
        return $this->TSHISREMD;
    }

    /**
     * Set the value of TSHISREMD
     */
    public function setTSHISREMD($TSHISREMD): self
    {
        $this->TSHISREMD = $TSHISREMD;

        return $this;
    }

    /**
     * Get the value of TSONREMD
     */
    public function getTSONREMD()
    {
        return $this->TSONREMD;
    }

    /**
     * Set the value of TSONREMD
     */
    public function setTSONREMD($TSONREMD): self
    {
        $this->TSONREMD = $TSONREMD;

        return $this;
    }

    /**
     * Get the value of DLIVAMNT
     */
    public function getDLIVAMNT()
    {
        return $this->DLIVAMNT;
    }

    /**
     * Set the value of DLIVAMNT
     */
    public function setDLIVAMNT($DLIVAMNT): self
    {
        $this->DLIVAMNT = $DLIVAMNT;

        return $this;
    }
}

<?php
class cust
{

    private $TS_V_ID;
    private $TS_SER;
    private $TS_DY;
    private $TS_NUM;
    private $TS_PRC;
    private  $TS_TOT;
    private  $TS_DISC;
    private  $TSTOTDISC;
    private  $TSNT;
    private  $TSDAT;


    public function __construct()
    {
    }






    /**
     * Get the value of TS_V_ID
     */
    public function getTSVID()
    {
        return $this->TS_V_ID;
    }

    /**
     * Set the value of TS_V_ID
     */
    public function setTSVID($TS_V_ID): self
    {
        $this->TS_V_ID = $TS_V_ID;

        return $this;
    }

    /**
     * Get the value of TS_SER
     */
    public function getTSSER()
    {
        return $this->TS_SER;
    }

    /**
     * Set the value of TS_SER
     */
    public function setTSSER($TS_SER): self
    {
        $this->TS_SER = $TS_SER;

        return $this;
    }

    /**
     * Get the value of TS_DY
     */
    public function getTSDY()
    {
        return $this->TS_DY;
    }

    /**
     * Set the value of TS_DY
     */
    public function setTSDY($TS_DY): self
    {
        $this->TS_DY = $TS_DY;

        return $this;
    }

    /**
     * Get the value of TS_NUM
     */
    public function getTSNUM()
    {
        return $this->TS_NUM;
    }

    /**
     * Set the value of TS_NUM
     */
    public function setTSNUM($TS_NUM): self
    {
        $this->TS_NUM = $TS_NUM;

        return $this;
    }

    /**
     * Get the value of TS_PRC
     */
    public function getTSPRC()
    {
        return $this->TS_PRC;
    }

    /**
     * Set the value of TS_PRC
     */
    public function setTSPRC($TS_PRC): self
    {
        $this->TS_PRC = $TS_PRC;

        return $this;
    }

    /**
     * Get the value of TS_TOT
     */
    public function getTSTOT()
    {
        return $this->TS_TOT;
    }

    /**
     * Set the value of TS_TOT
     */
    public function setTSTOT($TS_TOT): self
    {
        $this->TS_TOT = $TS_TOT;

        return $this;
    }

    /**
     * Get the value of TS_DISC
     */
    public function getTSDISC()
    {
        return $this->TS_DISC;
    }

    /**
     * Set the value of TS_DISC
     */
    public function setTSDISC($TS_DISC): self
    {
        $this->TS_DISC = $TS_DISC;

        return $this;
    }

    /**
     * Get the value of TSTOTDISC
     */
    public function getTSTOTDISC()
    {
        return $this->TSTOTDISC;
    }

    /**
     * Set the value of TSTOTDISC
     */
    public function setTSTOTDISC($TSTOTDISC): self
    {
        $this->TSTOTDISC = $TSTOTDISC;

        return $this;
    }

    
    /**
     * Get the value of TSNT
     */
    public function getTSNT()
    {
        return $this->TSNT;
    }

    /**
     * Set the value of TSNT
     */
    public function setTSNT($TSNT): self
    {
        $this->TSNT = $TSNT;

        return $this;
    }

    /**
     * Get the value of TSDAT
     */
    public function getTSDAT()
    {
        return $this->TSDAT;
    }

    /**
     * Set the value of TSDAT
     */
    public function setTSDAT($TSDAT): self
    {
        $this->TSDAT = $TSDAT;

        return $this;
    }
}

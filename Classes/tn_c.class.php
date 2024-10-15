<?php
class tn_c
{

    private $TC_V_ID;
    private $TC_SER;
    private $TC_DY;
    private $TCNUM;
    private $TC_PRC;
    private  $TC_TOT;
    private  $TCCOMIS;
    private  $TCTOTDISC	;
    private  $TCPST;
    private  $TCNT;
    private  $TC_DAT;


    public function __construct()
    {
    }

    /**
     * Get the value of TC_V_ID
     */
    public function getTCVID()
    {
        return $this->TC_V_ID;
    }

    /**
     * Set the value of TC_V_ID
     */
    public function setTCVID($TC_V_ID): self
    {
        $this->TC_V_ID = $TC_V_ID;

        return $this;
    }

    /**
     * Get the value of TC_SER
     */
    public function getTCSER()
    {
        return $this->TC_SER;
    }

    /**
     * Set the value of TC_SER
     */
    public function setTCSER($TC_SER): self
    {
        $this->TC_SER = $TC_SER;

        return $this;
    }

    /**
     * Get the value of TC_DY
     */
    public function getTCDY()
    {
        return $this->TC_DY;
    }

    /**
     * Set the value of TC_DY
     */
    public function setTCDY($TC_DY): self
    {
        $this->TC_DY = $TC_DY;

        return $this;
    }

    /**
     * Get the value of TCNUM
     */
    public function getTCNUM()
    {
        return $this->TCNUM;
    }

    /**
     * Set the value of TCNUM
     */
    public function setTCNUM($TCNUM): self
    {
        $this->TCNUM = $TCNUM;

        return $this;
    }

    /**
     * Get the value of TC_PRC
     */
    public function getTCPRC()
    {
        return $this->TC_PRC;
    }

    /**
     * Set the value of TC_PRC
     */
    public function setTCPRC($TC_PRC): self
    {
        $this->TC_PRC = $TC_PRC;

        return $this;
    }

    /**
     * Get the value of TC_TOT
     */
    public function getTCTOT()
    {
        return $this->TC_TOT;
    }

    /**
     * Set the value of TC_TOT
     */
    public function setTCTOT($TC_TOT): self
    {
        $this->TC_TOT = $TC_TOT;

        return $this;
    }

    /**
     * Get the value of TCCOMIS
     */
    public function getTCCOMIS()
    {
        return $this->TCCOMIS;
    }

    /**
     * Set the value of TCCOMIS
     */
    public function setTCCOMIS($TCCOMIS): self
    {
        $this->TCCOMIS = $TCCOMIS;

        return $this;
    }

    /**
     * Get the value of TCTOTDISC
     */
    public function getTCTOTDISC()
    {
        return $this->TCTOTDISC;
    }

    /**
     * Set the value of TCTOTDISC
     */
    public function setTCTOTDISC($TCTOTDISC): self
    {
        $this->TCTOTDISC = $TCTOTDISC;

        return $this;
    }

    /**
     * Get the value of TCPST
     */
    public function getTCPST()
    {
        return $this->TCPST;
    }

    /**
     * Set the value of TCPST
     */
    public function setTCPST($TCPST): self
    {
        $this->TCPST = $TCPST;

        return $this;
    }
    /**
     * Get the value of TCNT
     */
    public function getTCNT()
    {
        return $this->TCNT;
    }

    /**
     * Set the value of TCNT
     */
    public function setTCNT($TCNT): self
    {
        $this->TCNT = $TCNT;

        return $this;
    }

    /**
     * Get the value of TC_DAT
     */
    public function getTCDAT()
    {
        return $this->TC_DAT;
    }

    /**
     * Set the value of TC_DAT
     */
    public function setTCDAT($TC_DAT): self
    {
        $this->TC_DAT = $TC_DAT;

        return $this;
    }
}

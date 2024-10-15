<?php
class days
{

    private $DY_ID;
    private $DY_name;

    public function __construct()
    {
        
    }






    /**
     * Get the value of DY_ID
     */
    public function getDYID()
    {
        return $this->DY_ID;
    }

    /**
     * Set the value of DY_ID
     */
    public function setDYID($DY_ID): self
    {
        $this->DY_ID = $DY_ID;

        return $this;
    }

    /**
     * Get the value of DY_name
     */
    public function getDYName()
    {
        return $this->DY_name;
    }

    /**
     * Set the value of DY_name
     */
    public function setDYName($DY_name): self
    {
        $this->DY_name = $DY_name;

        return $this;
    }
}

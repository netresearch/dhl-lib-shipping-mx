<?php

namespace Dhl\Shipping\Bcs;

class ServiceconfigurationISR
{
    /**
     * @var anonymous136
     */
    protected $active = null;

    /**
     * @var anonymous137
     */
    protected $details = null;

    /**
     * @param anonymous136 $active
     * @param anonymous137 $details
     */
    public function __construct($active, $details)
    {
        $this->active = $active;
        $this->details = $details;
    }

    /**
     * @return anonymous136
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param anonymous136 $active
     *
     * @return \Dhl\Shipping\Bcs\ServiceconfigurationISR
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return anonymous137
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param anonymous137 $details
     *
     * @return \Dhl\Shipping\Bcs\ServiceconfigurationISR
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }
}

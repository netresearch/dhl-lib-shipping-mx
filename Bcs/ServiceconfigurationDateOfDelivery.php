<?php

namespace Dhl\Shipping\Bcs;

class ServiceconfigurationDateOfDelivery
{
    /**
     * @var anonymous148
     */
    protected $active = null;

    /**
     * @var anonymous149
     */
    protected $details = null;

    /**
     * @param anonymous148 $active
     * @param anonymous149 $details
     */
    public function __construct($active, $details)
    {
        $this->active = $active;
        $this->details = $details;
    }

    /**
     * @return anonymous148
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param anonymous148 $active
     *
     * @return \Dhl\Shipping\Bcs\ServiceconfigurationDateOfDelivery
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return anonymous149
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param anonymous149 $details
     *
     * @return \Dhl\Shipping\Bcs\ServiceconfigurationDateOfDelivery
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }
}

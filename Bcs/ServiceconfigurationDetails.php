<?php

namespace Dhl\Shipping\Bcs;

class ServiceconfigurationDetails
{
    /**
     * @var anonymous127
     */
    protected $active = null;

    /**
     * @var anonymous128
     */
    protected $details = null;

    /**
     * @param anonymous127 $active
     * @param anonymous128 $details
     */
    public function __construct($active, $details)
    {
        $this->active = $active;
        $this->details = $details;
    }

    /**
     * @return anonymous127
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param anonymous127 $active
     *
     * @return \Dhl\Shipping\Bcs\ServiceconfigurationDetails
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return anonymous128
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param anonymous128 $details
     *
     * @return \Dhl\Shipping\Bcs\ServiceconfigurationDetails
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }
}

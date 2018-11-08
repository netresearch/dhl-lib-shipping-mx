<?php

namespace Dhl\Shipping\Webservice\Schema\Bcs;

/**
 * Class ServiceconfigurationDetails
 */
class ServiceconfigurationDetails
{

    /**
     * @var anonymous127 $active
     */
    protected $active;

    /**
     * @var anonymous128 $details
     */
    protected $details;

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
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\ServiceconfigurationDetails
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
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\ServiceconfigurationDetails
     */
    public function setDetails($details)
    {
        $this->details = $details;
        return $this;
    }

}

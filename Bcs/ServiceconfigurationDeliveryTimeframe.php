<?php

namespace Dhl\Shipping\Bcs;

class ServiceconfigurationDeliveryTimeframe
{
    /**
     * @var anonymous145
     */
    protected $active = null;

    /**
     * @var anonymous146
     */
    protected $type = null;

    /**
     * @param anonymous145 $active
     * @param anonymous146 $type
     */
    public function __construct($active, $type)
    {
        $this->active = $active;
        $this->type = $type;
    }

    /**
     * @return anonymous145
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param anonymous145 $active
     *
     * @return \Dhl\Shipping\Bcs\ServiceconfigurationDeliveryTimeframe
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return anonymous146
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param anonymous146 $type
     *
     * @return \Dhl\Shipping\Bcs\ServiceconfigurationDeliveryTimeframe
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}

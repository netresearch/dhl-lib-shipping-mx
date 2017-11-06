<?php

namespace Dhl\Shipping\Bcs;

class ServiceconfigurationShipmentHandling
{
    /**
     * @var anonymous158
     */
    protected $active = null;

    /**
     * @var anonymous159
     */
    protected $type = null;

    /**
     * @param anonymous158 $active
     * @param anonymous159 $type
     */
    public function __construct($active, $type)
    {
        $this->active = $active;
        $this->type = $type;
    }

    /**
     * @return anonymous158
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param anonymous158 $active
     *
     * @return \Dhl\Shipping\Bcs\ServiceconfigurationShipmentHandling
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return anonymous159
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param anonymous159 $type
     *
     * @return \Dhl\Shipping\Bcs\ServiceconfigurationShipmentHandling
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}

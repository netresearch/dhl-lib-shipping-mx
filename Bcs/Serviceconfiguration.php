<?php

namespace Dhl\Shipping\Bcs;

class Serviceconfiguration
{
    /**
     * @var anonymous125
     */
    protected $active = null;

    /**
     * @param anonymous125 $active
     */
    public function __construct($active)
    {
        $this->active = $active;
    }

    /**
     * @return anonymous125
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param anonymous125 $active
     *
     * @return \Dhl\Shipping\Bcs\Serviceconfiguration
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }
}

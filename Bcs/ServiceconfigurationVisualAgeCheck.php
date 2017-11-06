<?php

namespace Dhl\Shipping\Bcs;

class ServiceconfigurationVisualAgeCheck
{
    /**
     * @var anonymous142
     */
    protected $active = null;

    /**
     * @var anonymous143
     */
    protected $type = null;

    /**
     * @param anonymous142 $active
     * @param anonymous143 $type
     */
    public function __construct($active, $type)
    {
        $this->active = $active;
        $this->type = $type;
    }

    /**
     * @return anonymous142
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param anonymous142 $active
     *
     * @return \Dhl\Shipping\Bcs\ServiceconfigurationVisualAgeCheck
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return anonymous143
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param anonymous143 $type
     *
     * @return \Dhl\Shipping\Bcs\ServiceconfigurationVisualAgeCheck
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}

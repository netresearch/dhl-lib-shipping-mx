<?php

namespace Dhl\Shipping\Bcs;

class ServiceconfigurationEndorsement
{
    /**
     * @var anonymous133
     */
    protected $active = null;

    /**
     * @var anonymous134
     */
    protected $type = null;

    /**
     * @param anonymous133 $active
     * @param anonymous134 $type
     */
    public function __construct($active, $type)
    {
        $this->active = $active;
        $this->type = $type;
    }

    /**
     * @return anonymous133
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param anonymous133 $active
     *
     * @return \Dhl\Shipping\Bcs\ServiceconfigurationEndorsement
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return anonymous134
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param anonymous134 $type
     *
     * @return \Dhl\Shipping\Bcs\ServiceconfigurationEndorsement
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }
}

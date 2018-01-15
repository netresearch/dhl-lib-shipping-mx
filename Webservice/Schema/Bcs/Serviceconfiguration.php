<?php

namespace Dhl\Shipping\Webservice\Schema\Bcs;

class Serviceconfiguration
{

    /**
     * @var anonymous125 $active
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
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\Serviceconfiguration
     */
    public function setActive($active)
    {
      $this->active = $active;
      return $this;
    }

}

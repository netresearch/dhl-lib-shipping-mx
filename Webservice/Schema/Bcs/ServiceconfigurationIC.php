<?php

namespace Dhl\Shipping\Webservice\Schema\Bcs;

/**
 * Class ServiceconfigurationIC
 */
class ServiceconfigurationIC
{

    /**
     * @var Ident $Ident
     */
    protected $Ident = null;

    /**
     * @var anonymous170 $active
     */
    protected $active = null;

    /**
     * @param Ident        $Ident
     * @param anonymous170 $active
     */
    public function __construct($Ident, $active)
    {
        $this->Ident = $Ident;
        $this->active = $active;
    }

    /**
     * @return Ident
     */
    public function getIdent()
    {
        return $this->Ident;
    }

    /**
     * @param Ident $Ident
     *
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\ServiceconfigurationIC
     */
    public function setIdent($Ident)
    {
        $this->Ident = $Ident;
        return $this;
    }

    /**
     * @return anonymous170
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param anonymous170 $active
     *
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\ServiceconfigurationIC
     */
    public function setActive($active)
    {
        $this->active = $active;
        return $this;
    }

}

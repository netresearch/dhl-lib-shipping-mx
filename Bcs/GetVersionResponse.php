<?php

namespace Dhl\Shipping\Bcs;

class GetVersionResponse
{
    /**
     * @var Version
     */
    protected $Version = null;

    /**
     * @param Version $Version
     */
    public function __construct($Version)
    {
        $this->Version = $Version;
    }

    /**
     * @return Version
     */
    public function getVersion()
    {
        return $this->Version;
    }

    /**
     * @param Version $Version
     *
     * @return \Dhl\Shipping\Bcs\GetVersionResponse
     */
    public function setVersion($Version)
    {
        $this->Version = $Version;

        return $this;
    }
}

<?php

namespace Dhl\Versenden\Bcs;

class GetVersionResponse
{

    /**
     * @var Version $Version
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
     * @return \Dhl\Versenden\Bcs\GetVersionResponse
     */
    public function setVersion($Version)
    {
      $this->Version = $Version;
      return $this;
    }

}

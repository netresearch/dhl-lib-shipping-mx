<?php

namespace Dhl\Shipping\Bcs;

class CreateShipmentOrderResponse
{
    /**
     * @var Version
     */
    protected $Version = null;

    /**
     * @var Statusinformation
     */
    protected $Status = null;

    /**
     * @var CreationState
     */
    protected $CreationState = null;

    /**
     * @param Version           $Version
     * @param Statusinformation $Status
     * @param CreationState     $CreationState
     */
    public function __construct($Version, $Status, $CreationState)
    {
        $this->Version = $Version;
        $this->Status = $Status;
        $this->CreationState = $CreationState;
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
     * @return \Dhl\Shipping\Bcs\CreateShipmentOrderResponse
     */
    public function setVersion($Version)
    {
        $this->Version = $Version;

        return $this;
    }

    /**
     * @return Statusinformation
     */
    public function getStatus()
    {
        return $this->Status;
    }

    /**
     * @param Statusinformation $Status
     *
     * @return \Dhl\Shipping\Bcs\CreateShipmentOrderResponse
     */
    public function setStatus($Status)
    {
        $this->Status = $Status;

        return $this;
    }

    /**
     * @return CreationState
     */
    public function getCreationState()
    {
        return $this->CreationState;
    }

    /**
     * @param CreationState $CreationState
     *
     * @return \Dhl\Shipping\Bcs\CreateShipmentOrderResponse
     */
    public function setCreationState($CreationState)
    {
        $this->CreationState = $CreationState;

        return $this;
    }
}

<?php

namespace Dhl\Shipping\Bcs;

class DeleteShipmentOrderResponse
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
     * @var DeletionState
     */
    protected $DeletionState = null;

    /**
     * @param Version           $Version
     * @param Statusinformation $Status
     * @param DeletionState     $DeletionState
     */
    public function __construct($Version, $Status, $DeletionState)
    {
        $this->Version = $Version;
        $this->Status = $Status;
        $this->DeletionState = $DeletionState;
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
     * @return \Dhl\Shipping\Bcs\DeleteShipmentOrderResponse
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
     * @return \Dhl\Shipping\Bcs\DeleteShipmentOrderResponse
     */
    public function setStatus($Status)
    {
        $this->Status = $Status;

        return $this;
    }

    /**
     * @return DeletionState
     */
    public function getDeletionState()
    {
        return $this->DeletionState;
    }

    /**
     * @param DeletionState $DeletionState
     *
     * @return \Dhl\Shipping\Bcs\DeleteShipmentOrderResponse
     */
    public function setDeletionState($DeletionState)
    {
        $this->DeletionState = $DeletionState;

        return $this;
    }
}

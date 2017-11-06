<?php

namespace Dhl\Shipping\Bcs;

class DeletionState
{
    /**
     * @var shipmentNumber
     */
    protected $shipmentNumber = null;

    /**
     * @var Statusinformation
     */
    protected $Status = null;

    /**
     * @param shipmentNumber    $shipmentNumber
     * @param Statusinformation $Status
     */
    public function __construct($shipmentNumber, $Status)
    {
        $this->shipmentNumber = $shipmentNumber;
        $this->Status = $Status;
    }

    /**
     * @return shipmentNumber
     */
    public function getShipmentNumber()
    {
        return $this->shipmentNumber;
    }

    /**
     * @param shipmentNumber $shipmentNumber
     *
     * @return \Dhl\Shipping\Bcs\DeletionState
     */
    public function setShipmentNumber($shipmentNumber)
    {
        $this->shipmentNumber = $shipmentNumber;

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
     * @return \Dhl\Shipping\Bcs\DeletionState
     */
    public function setStatus($Status)
    {
        $this->Status = $Status;

        return $this;
    }
}

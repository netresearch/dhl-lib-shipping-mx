<?php

namespace Dhl\Shipping\Bcs;

class DeleteShipmentOrderRequest
{
    /**
     * @var Version
     */
    protected $Version = null;

    /**
     * @var shipmentNumber
     */
    protected $shipmentNumber = null;

    /**
     * @param Version        $Version
     * @param shipmentNumber $shipmentNumber
     */
    public function __construct($Version, $shipmentNumber)
    {
        $this->Version = $Version;
        $this->shipmentNumber = $shipmentNumber;
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
     * @return \Dhl\Shipping\Bcs\DeleteShipmentOrderRequest
     */
    public function setVersion($Version)
    {
        $this->Version = $Version;

        return $this;
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
     * @return \Dhl\Shipping\Bcs\DeleteShipmentOrderRequest
     */
    public function setShipmentNumber($shipmentNumber)
    {
        $this->shipmentNumber = $shipmentNumber;

        return $this;
    }
}

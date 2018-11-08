<?php

namespace Dhl\Shipping\Webservice\Schema\Bcs;

/**
 * Class DeleteShipmentOrderRequest
 */
class DeleteShipmentOrderRequest
{

    /**
     * @var Version $Version
     */
    protected $Version = null;

    /**
     * @var shipmentNumber $shipmentNumber
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
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\DeleteShipmentOrderRequest
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
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\DeleteShipmentOrderRequest
     */
    public function setShipmentNumber($shipmentNumber)
    {
        $this->shipmentNumber = $shipmentNumber;
        return $this;
    }

}

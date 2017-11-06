<?php

namespace Dhl\Shipping\Bcs;

class ShipmentOrderType
{
    /**
     * @var SequenceNumber
     */
    protected $sequenceNumber = null;

    /**
     * @var Shipment
     */
    protected $Shipment = null;

    /**
     * @var Serviceconfiguration
     */
    protected $PrintOnlyIfCodeable = null;

    /**
     * @var labelResponseType
     */
    protected $labelResponseType = null;

    /**
     * @param SequenceNumber $sequenceNumber
     * @param Shipment       $Shipment
     */
    public function __construct($sequenceNumber, $Shipment)
    {
        $this->sequenceNumber = $sequenceNumber;
        $this->Shipment = $Shipment;
    }

    /**
     * @return SequenceNumber
     */
    public function getSequenceNumber()
    {
        return $this->sequenceNumber;
    }

    /**
     * @param SequenceNumber $sequenceNumber
     *
     * @return \Dhl\Shipping\Bcs\ShipmentOrderType
     */
    public function setSequenceNumber($sequenceNumber)
    {
        $this->sequenceNumber = $sequenceNumber;

        return $this;
    }

    /**
     * @return Shipment
     */
    public function getShipment()
    {
        return $this->Shipment;
    }

    /**
     * @param Shipment $Shipment
     *
     * @return \Dhl\Shipping\Bcs\ShipmentOrderType
     */
    public function setShipment($Shipment)
    {
        $this->Shipment = $Shipment;

        return $this;
    }

    /**
     * @return Serviceconfiguration
     */
    public function getPrintOnlyIfCodeable()
    {
        return $this->PrintOnlyIfCodeable;
    }

    /**
     * @param Serviceconfiguration $PrintOnlyIfCodeable
     *
     * @return \Dhl\Shipping\Bcs\ShipmentOrderType
     */
    public function setPrintOnlyIfCodeable($PrintOnlyIfCodeable)
    {
        $this->PrintOnlyIfCodeable = $PrintOnlyIfCodeable;

        return $this;
    }

    /**
     * @return labelResponseType
     */
    public function getLabelResponseType()
    {
        return $this->labelResponseType;
    }

    /**
     * @param labelResponseType $labelResponseType
     *
     * @return \Dhl\Shipping\Bcs\ShipmentOrderType
     */
    public function setLabelResponseType($labelResponseType)
    {
        $this->labelResponseType = $labelResponseType;

        return $this;
    }
}

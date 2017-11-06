<?php

namespace Dhl\Shipping\Bcs;

class LabelData
{
    /**
     * @var Statusinformation
     */
    protected $Status = null;

    /**
     * @var shipmentNumber
     */
    protected $shipmentNumber = null;

    /**
     * @var string
     */
    protected $labelUrl = null;

    /**
     * @var base64Binary
     */
    protected $labelData = null;

    /**
     * @var string
     */
    protected $returnLabelUrl = null;

    /**
     * @var base64Binary
     */
    protected $returnLabelData = null;

    /**
     * @var string
     */
    protected $exportLabelUrl = null;

    /**
     * @var base64Binary
     */
    protected $exportLabelData = null;

    /**
     * @var string
     */
    protected $codLabelUrl = null;

    /**
     * @var base64Binary
     */
    protected $codLabelData = null;

    /**
     * @param Statusinformation $Status
     * @param shipmentNumber    $shipmentNumber
     */
    public function __construct($Status, $shipmentNumber)
    {
        $this->Status = $Status;
        $this->shipmentNumber = $shipmentNumber;
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
     * @return \Dhl\Shipping\Bcs\LabelData
     */
    public function setStatus($Status)
    {
        $this->Status = $Status;

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
     * @return \Dhl\Shipping\Bcs\LabelData
     */
    public function setShipmentNumber($shipmentNumber)
    {
        $this->shipmentNumber = $shipmentNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getLabelUrl()
    {
        return $this->labelUrl;
    }

    /**
     * @param string $labelUrl
     *
     * @return \Dhl\Shipping\Bcs\LabelData
     */
    public function setLabelUrl($labelUrl)
    {
        $this->labelUrl = $labelUrl;

        return $this;
    }

    /**
     * @return base64Binary
     */
    public function getLabelData()
    {
        return $this->labelData;
    }

    /**
     * @param base64Binary $labelData
     *
     * @return \Dhl\Shipping\Bcs\LabelData
     */
    public function setLabelData($labelData)
    {
        $this->labelData = $labelData;

        return $this;
    }

    /**
     * @return string
     */
    public function getReturnLabelUrl()
    {
        return $this->returnLabelUrl;
    }

    /**
     * @param string $returnLabelUrl
     *
     * @return \Dhl\Shipping\Bcs\LabelData
     */
    public function setReturnLabelUrl($returnLabelUrl)
    {
        $this->returnLabelUrl = $returnLabelUrl;

        return $this;
    }

    /**
     * @return base64Binary
     */
    public function getReturnLabelData()
    {
        return $this->returnLabelData;
    }

    /**
     * @param base64Binary $returnLabelData
     *
     * @return \Dhl\Shipping\Bcs\LabelData
     */
    public function setReturnLabelData($returnLabelData)
    {
        $this->returnLabelData = $returnLabelData;

        return $this;
    }

    /**
     * @return string
     */
    public function getExportLabelUrl()
    {
        return $this->exportLabelUrl;
    }

    /**
     * @param string $exportLabelUrl
     *
     * @return \Dhl\Shipping\Bcs\LabelData
     */
    public function setExportLabelUrl($exportLabelUrl)
    {
        $this->exportLabelUrl = $exportLabelUrl;

        return $this;
    }

    /**
     * @return base64Binary
     */
    public function getExportLabelData()
    {
        return $this->exportLabelData;
    }

    /**
     * @param base64Binary $exportLabelData
     *
     * @return \Dhl\Shipping\Bcs\LabelData
     */
    public function setExportLabelData($exportLabelData)
    {
        $this->exportLabelData = $exportLabelData;

        return $this;
    }

    /**
     * @return string
     */
    public function getCodLabelUrl()
    {
        return $this->codLabelUrl;
    }

    /**
     * @param string $codLabelUrl
     *
     * @return \Dhl\Shipping\Bcs\LabelData
     */
    public function setCodLabelUrl($codLabelUrl)
    {
        $this->codLabelUrl = $codLabelUrl;

        return $this;
    }

    /**
     * @return base64Binary
     */
    public function getCodLabelData()
    {
        return $this->codLabelData;
    }

    /**
     * @param base64Binary $codLabelData
     *
     * @return \Dhl\Shipping\Bcs\LabelData
     */
    public function setCodLabelData($codLabelData)
    {
        $this->codLabelData = $codLabelData;

        return $this;
    }
}

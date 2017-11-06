<?php

namespace Dhl\Shipping\Bcs;

class ShipmentDetailsTypeType extends ShipmentDetailsType
{
    /**
     * @var ShipmentItemType
     */
    protected $ShipmentItem = null;

    /**
     * @var ShipmentService
     */
    protected $Service = null;

    /**
     * @var ShipmentNotificationType
     */
    protected $Notification = null;

    /**
     * @var BankType
     */
    protected $BankData = null;

    /**
     * @param string           $product
     * @param accountNumber    $accountNumber
     * @param shipmentDate     $shipmentDate
     * @param ShipmentItemType $ShipmentItem
     */
    public function __construct($product, $accountNumber, $shipmentDate, $ShipmentItem)
    {
        parent::__construct($product, $accountNumber, $shipmentDate);
        $this->ShipmentItem = $ShipmentItem;
    }

    /**
     * @return ShipmentItemType
     */
    public function getShipmentItem()
    {
        return $this->ShipmentItem;
    }

    /**
     * @param ShipmentItemType $ShipmentItem
     *
     * @return \Dhl\Shipping\Bcs\ShipmentDetailsTypeType
     */
    public function setShipmentItem($ShipmentItem)
    {
        $this->ShipmentItem = $ShipmentItem;

        return $this;
    }

    /**
     * @return ShipmentService
     */
    public function getService()
    {
        return $this->Service;
    }

    /**
     * @param ShipmentService $Service
     *
     * @return \Dhl\Shipping\Bcs\ShipmentDetailsTypeType
     */
    public function setService($Service)
    {
        $this->Service = $Service;

        return $this;
    }

    /**
     * @return ShipmentNotificationType
     */
    public function getNotification()
    {
        return $this->Notification;
    }

    /**
     * @param ShipmentNotificationType $Notification
     *
     * @return \Dhl\Shipping\Bcs\ShipmentDetailsTypeType
     */
    public function setNotification($Notification)
    {
        $this->Notification = $Notification;

        return $this;
    }

    /**
     * @return BankType
     */
    public function getBankData()
    {
        return $this->BankData;
    }

    /**
     * @param BankType $BankData
     *
     * @return \Dhl\Shipping\Bcs\ShipmentDetailsTypeType
     */
    public function setBankData($BankData)
    {
        $this->BankData = $BankData;

        return $this;
    }
}

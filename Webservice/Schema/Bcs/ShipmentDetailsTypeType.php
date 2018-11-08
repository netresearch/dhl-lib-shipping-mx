<?php

namespace Dhl\Shipping\Webservice\Schema\Bcs;

/**
 * Class ShipmentDetailsTypeType
 */
class ShipmentDetailsTypeType extends ShipmentDetailsType
{

    /**
     * @var ShipmentItemType $ShipmentItem
     */
    protected $ShipmentItem;

    /**
     * @var ShipmentService $Service
     */
    protected $Service;

    /**
     * @var ShipmentNotificationType $Notification
     */
    protected $Notification;

    /**
     * @var BankType $BankData
     */
    protected $BankData;

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
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\ShipmentDetailsTypeType
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
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\ShipmentDetailsTypeType
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
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\ShipmentDetailsTypeType
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
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\ShipmentDetailsTypeType
     */
    public function setBankData($BankData)
    {
        $this->BankData = $BankData;
        return $this;
    }

}

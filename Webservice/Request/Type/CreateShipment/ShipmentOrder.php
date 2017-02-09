<?php
/**
 * Dhl Versenden
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to
 * newer versions in the future.
 *
 * PHP version 7
 *
 * @category  Dhl
 * @package   Dhl\Versenden\Api
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Versenden\Webservice\Request\Type\CreateShipment;

use \Dhl\Versenden\Api\Data\Webservice\Request\Type\CreateShipment\ShipmentOrder\CustomsDetailsInterface;
use \Dhl\Versenden\Api\Data\Webservice\Request\Type\CreateShipment\ShipmentOrder\PackageInterface;
use \Dhl\Versenden\Api\Data\Webservice\Request\Type\CreateShipment\ShipmentOrder\ReceiverInterface;
use \Dhl\Versenden\Api\Data\Webservice\Request\Type\CreateShipment\ShipmentOrder\ReturnReceiverInterface;
use \Dhl\Versenden\Api\Data\Webservice\Request\Type\CreateShipment\ShipmentOrder\ShipmentDetailsInterface;
use \Dhl\Versenden\Api\Data\Webservice\Request\Type\CreateShipment\ShipmentOrder\ShipperInterface;
use \Dhl\Versenden\Api\Data\Webservice\Request\Type\CreateShipment\ShipmentOrderInterface;

/**
 * Platform independent shipment order
 *
 * @category Dhl
 * @package  Dhl\Versenden\Api
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class ShipmentOrder implements ShipmentOrderInterface
{
    /**
     * @var string
     */
    private $sequenceNumber;

    /**
     * @var ShipmentDetailsInterface
     */
    private $shipmentDetails;

    /**
     * @var ShipperInterface
     */
    private $shipper;

    /**
     * @var ReceiverInterface
     */
    private $receiver;

    /**
     * @var ReturnReceiverInterface
     */
    private $returnReceiver;

    /**
     * @var CustomsDetailsInterface
     */
    private $customsDetails;

    /**
     * @var PackageInterface[]
     */
    private $packages;

    /**
     * @var array
     */
    private $services;

    /**
     * ShipmentOrder constructor.
     * @param $sequenceNumber
     * @param ShipmentDetailsInterface $shipmentDetails
     * @param ShipperInterface $shipper
     * @param ReceiverInterface $receiver
     * @param ReturnReceiverInterface $returnReceiver
     * @param CustomsDetailsInterface $customsDetails
     * @param PackageInterface[] $packages
     * @param array $services
     */
    public function __construct(
        $sequenceNumber,
        ShipmentDetailsInterface $shipmentDetails,
        ShipperInterface $shipper,
        ReceiverInterface $receiver,
        ReturnReceiverInterface $returnReceiver,
        CustomsDetailsInterface $customsDetails,
        array $packages,
        array $services
    ) {
        $this->sequenceNumber = $sequenceNumber;
        $this->shipmentDetails = $shipmentDetails;
        $this->shipper = $shipper;
        $this->receiver = $receiver;
        $this->returnReceiver = $returnReceiver;
        $this->customsDetails = $customsDetails;
        $this->packages = $packages;
        $this->services = $services;
    }

    /**
     * @return string
     */
    public function getSequenceNumber()
    {
        return $this->sequenceNumber;
    }

    /**
     * @return ShipmentDetailsInterface
     */
    public function getShipmentDetails()
    {
        return $this->shipmentDetails;
    }

    /**
     * @return ShipperInterface
     */
    public function getShipper()
    {
        return $this->shipper;
    }

    /**
     * @return ReceiverInterface
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * @return ReturnReceiverInterface
     */
    public function getReturnReceiver()
    {
        return $this->returnReceiver;
    }

    /**
     * @return CustomsDetailsInterface
     */
    public function getCustomsDetails()
    {
        return $this->customsDetails;
    }

    /**
     * @return PackageInterface[]
     */
    public function getPackages()
    {
        return $this->packages;
    }

    /**
     * TODO(nr): support services
     * @return mixed[]
     */
    public function getServices()
    {
        return $this->services;
    }
}

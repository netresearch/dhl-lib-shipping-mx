<?php
/**
 * Dhl Shipping
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
 * @package   Dhl\Shipping
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2018 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */

namespace Dhl\Shipping\Webservice\RequestType\CreateShipment;

use Dhl\Shipping\Api\ServiceCollectionInterface;
use Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrder\Contact\ReceiverInterface;
use Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrder\Contact\ReturnReceiverInterface;
use Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrder\Contact\ShipperInterface;
use Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrder\PackageInterface;
use Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrder\ShipmentDetails\ShipmentDetailsInterface;

/**
 * Platform independent shipment order
 *
 * @package  Dhl\Shipping
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @author   Max Melzer <max.melzer@netresearch.de>
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
     * @var ServiceCollectionInterface
     */
    private $services;

    /**
     * @var PackageInterface[]
     */
    private $packages;

    /**
     * ShipmentOrder constructor.
     *
     * @param                            $sequenceNumber
     * @param ShipmentDetailsInterface   $shipmentDetails
     * @param ShipperInterface           $shipper
     * @param ReceiverInterface          $receiver
     * @param ReturnReceiverInterface    $returnReceiver
     * @param ServiceCollectionInterface $services
     * @param array                      $packages
     */
    public function __construct(
        $sequenceNumber,
        ShipmentDetailsInterface $shipmentDetails,
        ShipperInterface $shipper,
        ReceiverInterface $receiver,
        ReturnReceiverInterface $returnReceiver,
        ServiceCollectionInterface $services,
        array $packages
    ) {
        $this->sequenceNumber = $sequenceNumber;
        $this->shipmentDetails = $shipmentDetails;
        $this->shipper = $shipper;
        $this->receiver = $receiver;
        $this->returnReceiver = $returnReceiver;
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
     * @return ServiceCollectionInterface
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * @return PackageInterface[]
     */
    public function getPackages()
    {
        return $this->packages;
    }
}

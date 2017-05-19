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
 * @category  Dhl
 * @package   Dhl\Shipping\Api
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrder\ShipmentDetails;

use \Dhl\Shipping\Api\Data\Webservice\RequestType\CreateShipment\ShipmentOrder\ShipmentDetails\BankDataInterface;
use \Dhl\Shipping\Api\Data\Webservice\RequestType\CreateShipment\ShipmentOrder\ShipmentDetails\ShipmentDetailsInterface;

/**
 * Platform independent shipment order details
 *
 * @category Dhl
 * @package  Dhl\Shipping\Api
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class ShipmentDetails implements ShipmentDetailsInterface
{
    /**
     * @var bool
     */
    private $isPrintOnlyIfCodeable;

    /**
     * @var bool
     */
    private $isPartialShipment;

    /**
     * @var string
     */
    private $product;

    /**
     * @var string
     */
    private $accountNumber;

    /**
     * @var string
     */
    private $returnShipmentAccountNumber;

    /**
     * @var string
     */
    private $pickupAccountNumber;

    /**
     * @var string
     */
    private $distributionCenter;

    /**
     * @var string
     */
    private $reference;

    /**
     * @var string
     */
    private $returnShipmentReference;

    /**
     * @var string
     */
    private $shipmentDate;

    /**
     * @var BankDataInterface
     */
    private $bankData;

    /**
     * ShipmentDetails constructor.
     * @param bool $isPrintOnlyIfCodeable
     * @param bool $isPartialShipment
     * @param string $product
     * @param string $accountNumber
     * @param string $returnShipmentAccountNumber
     * @param string $pickupAccountNumber
     * @param string $distributionCenter
     * @param string $reference
     * @param string $returnShipmentReference
     * @param string $shipmentDate
     * @param BankDataInterface $bankData
     */
    public function __construct(
        $isPrintOnlyIfCodeable,
        $isPartialShipment,
        $product,
        $accountNumber,
        $returnShipmentAccountNumber,
        $pickupAccountNumber,
        $distributionCenter,
        $reference,
        $returnShipmentReference,
        $shipmentDate,
        BankDataInterface $bankData
    ) {
        $this->isPrintOnlyIfCodeable = $isPrintOnlyIfCodeable;
        $this->isPartialShipment = $isPartialShipment;
        $this->product = $product;
        $this->accountNumber = $accountNumber;
        $this->returnShipmentAccountNumber = $returnShipmentAccountNumber;
        $this->pickupAccountNumber = $pickupAccountNumber;
        $this->distributionCenter = $distributionCenter;
        $this->reference = $reference;
        $this->returnShipmentReference = $returnShipmentReference;
        $this->shipmentDate = $shipmentDate;
        $this->bankData = $bankData;
    }

    /**
     * @return bool
     */
    public function isPrintOnlyIfCodeable()
    {
        return $this->isPrintOnlyIfCodeable;
    }

    /**
     * Check if the current shipment order includes all ordered items.
     * Some services cannot be booked with partial shipments (cod, insurance).
     *
     * @return bool
     */
    public function isPartialShipment()
    {
        return $this->isPartialShipment;
    }

    /**
     * Obtain the product to be booked for the current shipment order, e.g.
     * - DHL Paket
     * - DHL Paket International
     * - DHL GM Business Priority
     *
     * @return string
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Obtain the DHL account number for the current shipment.
     *
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * Obtain the DHL account number for returning the current shipment.
     *
     * @return string
     */
    public function getReturnShipmentAccountNumber()
    {
        return $this->returnShipmentAccountNumber;
    }

    /**
     * Obtain the DHL account number for parcel pickup.
     *
     * @return string
     */
    public function getPickupAccountNumber()
    {
        return $this->pickupAccountNumber;
    }

    /**
     * Obtain the primary DHL eCommerce Distribution center.
     *
     * @return string
     */
    public function getDistributionCenter()
    {
        return $this->distributionCenter;
    }

    /**
     * Obtain the order reference, usually shipment increment ID.
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Obtain the return shipment reference, usually shipment increment ID.
     *
     * @return string
     */
    public function getReturnShipmentReference()
    {
        return $this->returnShipmentReference;
    }

    /**
     * Obtain the date of shipment order creation, usually current date Y-m-d
     *
     * @return string
     */
    public function getShipmentDate()
    {
        return $this->shipmentDate;
    }

    /**
     * @return BankDataInterface
     */
    public function getBankData()
    {
        return $this->bankData;
    }
}

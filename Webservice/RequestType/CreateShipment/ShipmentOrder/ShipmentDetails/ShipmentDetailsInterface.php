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

namespace Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrder\ShipmentDetails;

/**
 * General configuration settings for creating a shipment order.
 *
 * @package  Dhl\Shipping
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
interface ShipmentDetailsInterface
{
    /**
     * @return bool
     */
    public function isPrintOnlyIfCodeable();

    /**
     * Check if the current shipment order includes all ordered items.
     * Some services cannot be booked with partial shipments (cod, insurance).
     *
     * @return bool
     */
    public function isPartialShipment();

    /**
     * Obtain the product to be booked for the current shipment order, e.g.
     * - DHL Paket
     * - DHL Paket International
     * - DHL GM Business Priority
     *
     * @return string
     */
    public function getProduct();

    /**
     * Obtain the DHL account number for the current shipment.
     *
     * @return string
     */
    public function getAccountNumber();

    /**
     * Obtain the DHL account number for returning the current shipment.
     *
     * @return string
     */
    public function getReturnShipmentAccountNumber();

    /**
     * Obtain the DHL account number for parcel pickup.
     *
     * @return string
     */
    public function getPickupAccountNumber();

    /**
     * Obtain the primary DHL eCommerce Distribution center.
     *
     * @return string
     */
    public function getDistributionCenter();

    /**
     * Obtain merchants DHL customer prefix
     *
     * @return string
     */
    public function getCustomerPrefix();

    /**
     * Obtain current consignment number.
     *
     * @return string
     */
    public function getConsignmentNumber();

    /**
     * Obtain the order reference, usually shipment increment ID.
     *
     * @return string
     */
    public function getReference();

    /**
     * Obtain the return shipment reference, usually shipment increment ID.
     *
     * @return string
     */
    public function getReturnShipmentReference();

    /**
     * Obtain the date of shipment order creation, usually current date Y-m-d
     *
     * @return string
     */
    public function getShipmentDate();

    /**
     * @return BankDataInterface
     */
    public function getBankData();
}

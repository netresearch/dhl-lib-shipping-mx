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
 * @package   Dhl\Shipping
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */

namespace Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrder;

use Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrder\Package\PackageItemInterface;

/**
 * Package information for creating a shipment order.
 *
 * @category Dhl
 * @package  Dhl\Shipping
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
interface PackageInterface
{
    /**
     * Customer Confirmation Number, usually composed of increment id and package sequence number
     *
     * @return string
     */
    public function getPackageId();

    /**
     * @return \Dhl\Shipping\Webservice\RequestType\Generic\Package\WeightInterface
     */
    public function getWeight();

    /**
     * @return \Dhl\Shipping\Webservice\RequestType\Generic\Package\DimensionsInterface
     */
    public function getDimensions();

    /**
     * @return \Dhl\Shipping\Webservice\RequestType\Generic\Package\MonetaryValueInterface
     */
    public function getDeclaredValue();

    /**
     * @return string
     */
    public function getExportType();

    /**
     * @return string
     */
    public function getExportTypeDescription();

    /**
     * @return string
     */
    public function getTermsOfTrade();

    /**
     * @return \Dhl\Shipping\Webservice\RequestType\Generic\Package\MonetaryValueInterface
     */
    public function getAdditionalFee();

    /**
     * @return string
     */
    public function getPlaceOfCommittal();

    /**
     * @return string
     */
    public function getPermitNumber();

    /**
     * @return string
     */
    public function getAttestationNumber();

    /**
     * @return int
     */
    public function isWithExportNotification();

    /**
     * @return string
     */
    public function getDangerousGoodsCategory();

    /**
     * @return string
     */
    public function getPackageDescription();

    /**
     * @return PackageItemInterface[]
     */
    public function getItems();
}

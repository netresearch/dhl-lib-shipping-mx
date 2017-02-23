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
namespace Dhl\Versenden\Api\Data\Webservice\RequestType\CreateShipment\ShipmentOrder;

/**
 * Package information for creating a shipment order.
 *
 * @category Dhl
 * @package  Dhl\Versenden\Api
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
     * @return \Dhl\Versenden\Api\Data\Webservice\RequestType\Generic\Package\WeightInterface
     */
    public function getWeight();

    /**
     * @return \Dhl\Versenden\Api\Data\Webservice\RequestType\Generic\Package\DimensionsInterface
     */
    public function getDimensions();

    /**
     * @return \Dhl\Versenden\Api\Data\Webservice\RequestType\Generic\Package\MonetaryValueInterface
     */
    public function getDeclaredValue();
}
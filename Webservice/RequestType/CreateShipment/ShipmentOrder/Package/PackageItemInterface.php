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
 * @author    Sebastian Ertner <sebastian.ertner@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrder\Package;
use Dhl\Shipping\Webservice\RequestType\Generic\Package\MonetaryValueInterface;
use Dhl\Shipping\Webservice\RequestType\Generic\Package\WeightInterface;

/**
 * Package item information for creating a shipment order.
 *
 * @category Dhl
 * @package  Dhl\Shipping
 * @author   Sebastian Ertner <sebastian.ertner@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
interface PackageItemInterface
{

    /**
     * @return string
     */
    public function getQty();

    /**
     * @return MonetaryValueInterface
     */
    public function getCustomsValue();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return MonetaryValueInterface
     */
    public function getPrice();

    /**
     * @return WeightInterface
     */
    public function getWeight();

    /**
     * @return string
     */
    public function getProductId();

    /**
     * @return string
     */
    public function getOrderItemId();

    /**
     * @return string
     */
    public function getCustomsItemDescription();

    /**
     * @return string
     */
    public function getItemOriginCountry();

    /**
     * @return string
     */
    public function getTariffNumber();
}

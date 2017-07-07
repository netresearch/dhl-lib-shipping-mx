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
namespace Dhl\Shipping\Webservice\RequestType\CreateShipment;

/**
 * ShipmentOrderInterface
 *
 * @category Dhl
 * @package  Dhl\Shipping
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
interface ShipmentOrderInterface
{
    /**
     * @return string
     */
    public function getSequenceNumber();

    /**
     * @return \Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrder\ShipmentDetails\ShipmentDetailsInterface
     */
    public function getShipmentDetails();

    /**
     * @return \Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrder\Contact\ShipperInterface
     */
    public function getShipper();

    /**
     * @return \Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrder\Contact\ReceiverInterface
     */
    public function getReceiver();

    /**
     * @return \Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrder\Contact\ReturnReceiverInterface
     */
    public function getReturnReceiver();

    /**
     * @return \Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrder\Service\ServiceCollectionInterface
     */
    public function getServices();

    /**
     * @return \Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrder\PackageInterface[]
     */
    public function getPackages();
}

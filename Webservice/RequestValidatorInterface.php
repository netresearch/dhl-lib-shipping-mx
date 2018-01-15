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
namespace Dhl\Shipping\Webservice;

use Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrderInterface;
use Dhl\Shipping\Webservice\Adapter\AdapterInterface;
use Dhl\Shipping\Webservice\Exception\CreateShipmentValidationException;

/**
 * RequestValidatorInterface
 *
 * @package  Dhl\Shipping
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
interface RequestValidatorInterface
{
    const MSG_PARTIAL_SHIPMENT_NOT_AVAILABLE = 'Can not do partial shipment with COD or Additional Insurance.';

    const MSG_NO_PRODUCT_WEIGHT = 'One or more products do not have a weight configured.';

    /**
     * Validate shipment order before creating labels.
     *
     * @see AdapterInterface::createLabels()
     * @param ShipmentOrderInterface $shipmentOrder
     * @return ShipmentOrderInterface
     * @throws CreateShipmentValidationException
     */
    public function validateShipmentOrder(ShipmentOrderInterface $shipmentOrder);
}

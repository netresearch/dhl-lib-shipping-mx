<?php
/**
 * Dhl Shipping.
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
 *
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 *
 * @link      http://www.netresearch.de/
 */

namespace Dhl\Shipping\Webservice\RequestMapper;

use Dhl\Shipping\Webservice\Exception\CreateShipmentValidationException;

/**
 * AppDataMapperInterface.
 *
 * @category Dhl
 *
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 *
 * @link     http://www.netresearch.de/
 */
interface AppDataMapperInterface
{
    /**
     * Create standardized request object from framework specific object.
     *
     * @param object $request        The M1 or M2 shipment request
     * @param string $sequenceNumber
     *
     * @throws CreateShipmentValidationException
     *
     * @return \Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrderInterface
     */
    public function mapShipmentRequest($request, $sequenceNumber);
}

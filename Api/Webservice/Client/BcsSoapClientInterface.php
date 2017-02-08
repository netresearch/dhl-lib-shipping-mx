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
namespace Dhl\Versenden\Api\Webservice\Client;

/**
 * Business Customer Shipping API SOAP client adapter
 *
 * @category Dhl
 * @package  Dhl\Versenden\Api
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
interface BcsSoapClientInterface
{
    /**
     * Returns the actual version of the implementation of the whole ISService
     *         webservice.
     *
     * @param \Dhl\Versenden\Bcs\Version $part1
     * @return \Dhl\Versenden\Bcs\GetVersionResponse
     */
    public function getVersion(\Dhl\Versenden\Bcs\Version $part1);

    /**
     * Creates shipments.
     *
     * @param \Dhl\Versenden\Bcs\CreateShipmentOrderRequest $part1
     * @return \Dhl\Versenden\Bcs\CreateShipmentOrderResponse
     */
    public function createShipmentOrder(\Dhl\Versenden\Bcs\CreateShipmentOrderRequest $part1);

    /**
     * Deletes the requested shipments.
     *
     * @param \Dhl\Versenden\Bcs\DeleteShipmentOrderRequest $part1
     * @return \Dhl\Versenden\Bcs\DeleteShipmentOrderResponse
     */
    public function deleteShipmentOrder(\Dhl\Versenden\Bcs\DeleteShipmentOrderRequest $part1);
}

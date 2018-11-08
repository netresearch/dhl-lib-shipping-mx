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
namespace Dhl\Shipping\Webservice\Client;

/**
 * Business Customer Shipping API SOAP client adapter
 *
 * @package  Dhl\Shipping
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
interface BcsSoapClientInterface extends HttpClientInterface
{
    /**
     * Returns the actual version of the implementation of the whole ISService
     *         webservice.
     *
     * @param \Dhl\Shipping\Webservice\Schema\Bcs\Version $part1
     *
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\GetVersionResponse
     */
    public function getVersion(\Dhl\Shipping\Webservice\Schema\Bcs\Version $part1);

    /**
     * Creates shipments.
     *
     * @param \Dhl\Shipping\Webservice\Schema\Bcs\CreateShipmentOrderRequest $part1
     *
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\CreateShipmentOrderResponse
     */
    public function createShipmentOrder(\Dhl\Shipping\Webservice\Schema\Bcs\CreateShipmentOrderRequest $part1);

    /**
     * Deletes the requested shipments.
     *
     * @param \Dhl\Shipping\Webservice\Schema\Bcs\DeleteShipmentOrderRequest $part1
     *
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\DeleteShipmentOrderResponse
     */
    public function deleteShipmentOrder(\Dhl\Shipping\Webservice\Schema\Bcs\DeleteShipmentOrderRequest $part1);
}

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
namespace Dhl\Versenden\Api\Webservice\Request\Mapper;

use \Dhl\Versenden\Api\Data\Webservice\Request;

/**
 * BcsDataMapperInterface
 *
 * @category Dhl
 * @package  Dhl\Versenden\Api
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 *
 * @method \Dhl\Versenden\Bcs\ShipmentOrderType mapShipmentOrder(Request\Type\CreateShipment\ShipmentOrderInterface $shipmentOrder)
 */
interface BcsDataMapperInterface extends ApiDataMapperInterface
{
    /**
     * Create api specific request object from framework standardized object.
     *
     * @param \Dhl\Versenden\Api\Data\Webservice\Request\Type\GetVersionRequestInterface $request
     * @return \Dhl\Versenden\Bcs\Version
     */
    public function mapVersion(Request\Type\GetVersionRequestInterface $request);

    /**
     * Create api specific request object from framework standardized object.
     * TODO(nr): shipment numbers are a simple type, no need to convert something?
     *
     * @param \Dhl\Versenden\Api\Data\Webservice\Request\Type\DeleteShipmentRequestInterface[] $numbers
     * @return string[]
     */
    public function mapShipmentNumbers(array $numbers);
}

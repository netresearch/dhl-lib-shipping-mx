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
namespace Dhl\Versenden\Api\Webservice\Adapter;

use \Dhl\Versenden\Api\Data\Webservice\Request;
use \Dhl\Versenden\Api\Data\Webservice\Response;
use Dhl\Versenden\Webservice\Response\Type\CreateShipmentResponseCollection;
use Dhl\Versenden\Webservice\Response\Type\DeleteShipmentResponseCollection;

/**
 * API Adapter Chain
 *
 * @category Dhl
 * @package  Dhl\Versenden\Api
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
interface AdapterChainInterface
{
    const MSG_STATUS_CREATED = 'Shipping labels were created successfully.';
    const MSG_STATUS_PARTIALLY_CREATED = 'Some shipping labels could not be created: %s.';
    const MSG_STATUS_NOT_CREATED = 'Shipping labels could not be created: %s.';

    const MSG_STATUS_DELETED = 'Sihpping labels were cancelled successfully.';
    const MSG_STATUS_PARTIALLY_DELETED = 'Some shipping labels could not be cancelled: %s.';
    const MSG_STATUS_NOT_DELETED = 'Shipping labels could not be cancelled: %s.';

    /**
     * @param Request\Type\CreateShipment\ShipmentOrderInterface[] $shipmentOrders
     * @return Response\Type\CreateShipmentResponseInterface|CreateShipmentResponseCollection
     */
    public function createLabels(array $shipmentOrders);

    /**
     * @param string[] $shipmentNumbers
     * @return Response\Type\DeleteShipmentResponseInterface|DeleteShipmentResponseCollection
     */
    public function cancelLabels(array $shipmentNumbers);
}

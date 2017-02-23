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
 * @package   Dhl\Versenden\Webservice
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */

namespace Dhl\Versenden\Webservice;

use Dhl\Versenden\Api\Data\Webservice\RequestType\CreateShipment\ShipmentOrderInterface;
use Dhl\Versenden\Api\Webservice\RequestValidatorInterface;
use Dhl\Versenden\Webservice\RequestType\CreateShipment\ShipmentOrder\Service\AbstractServiceFactory;

/**
 * RequestValidator
 *
 * @category Dhl
 * @package  Dhl\Versenden\Webservice
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class RequestValidator implements RequestValidatorInterface
{
    /**
     * Validate shipment order before creating labels.
     *
     * @see AdapterInterface::createLabels()
     * @param ShipmentOrderInterface $shipmentOrder
     * @return ShipmentOrderInterface
     * @throws CreateShipmentValidationException
     */
    public function validateShipmentOrder(ShipmentOrderInterface $shipmentOrder)
    {
        $isWithCod = $shipmentOrder->getServices()->getService(AbstractServiceFactory::SERVICE_CODE_COD);
        $canShipPartially = !$isWithCod;
        $isPartial = $shipmentOrder->getShipmentDetails()->isPartialShipment();

        if ($isPartial && !$canShipPartially) {
            throw new CreateShipmentValidationException(self::MSG_PARTIAL_SHIPMENT_NOT_AVAILABLE);
        }

        return $shipmentOrder;
    }
}

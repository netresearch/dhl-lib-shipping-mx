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
namespace Dhl\Shipping\Webservice\Exception;

use Dhl\Shipping\Webservice\Schema\Bcs\CreateShipmentOrderResponse;
use Dhl\Shipping\Webservice\Schema\Bcs\CreationState;

/**
 * Webservice could not create shipment order. Server side validation error, e.g.
 * - hard validation error
 * - login failed
 *
 * @package  Dhl\Shipping
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class CreateShipmentStatusException extends ApiOperationException
{
    /**
     * @param CreateShipmentOrderResponse $response
     *
     * @return static
     */
    public static function create(CreateShipmentOrderResponse $response)
    {
        $messages = [];

        if ($response->getCreationState()) {
            /** @var CreationState $creationState */
            foreach ($response->getCreationState() as $creationState) {
                $status = $creationState->getLabelData()->getStatus();
                $messages[] = sprintf('%s %s', $status->getStatusText(), implode(' ', $status->getStatusMessage()));
            }
        } else {
            $status = $response->getStatus();
            $messages[] = sprintf('%s %s', $status->getStatusText(), implode(' ', $status->getStatusMessage()));
        }

        $message = implode(' ', $messages);
        return new static($message);
    }
}

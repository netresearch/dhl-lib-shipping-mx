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
namespace Dhl\Versenden\Webservice;

use \Dhl\Versenden\Bcs\CreateShipmentOrderResponse;
use \Dhl\Versenden\Bcs\CreationState;
use \Exception;

/**
 * StatusException
 *
 * @category Dhl
 * @package  Dhl\Versenden\Api
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class CreateShipmentStatusException extends \Exception
{
    /**
     * @param CreateShipmentOrderResponse $response
     * @param string $message [optional] The Exception message to throw.
     * @param int $code [optional] The Exception code.
     * @param Exception $previous [optional] The previous exception used for the exception chaining. Since 5.3.0
     */
    public function __construct(
        CreateShipmentOrderResponse $response,
        $message = "",
        $code = 0,
        Exception $previous = null
    ) {
        $messages = [];

        if ($response->getCreationState()) {
            /** @var CreationState $creationState */
            foreach ($response->getCreationState() as $creationState) {
                $status = $creationState->getLabelData()->getStatus();
                $messages[]= sprintf('%s %s', $status->getStatusText(), implode(' ', $status->getStatusMessage()));
            }
        } else {
            $status = $response->getStatus();
            $messages[]= sprintf('%s %s', $status->getStatusText(), implode(' ', $status->getStatusMessage()));
        }

        if ($message) {
            array_unshift($messages, $message);
        }

        parent::__construct(implode(' ', $messages), $code, $previous);
    }
}

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
namespace Dhl\Versenden\Webservice\Response\Parser;

use \Dhl\Versenden\Api\Data\Webservice\Response;
use \Dhl\Versenden\Api\Data\Webservice\Response\Type\Generic\ResponseStatusInterface;
use \Dhl\Versenden\Api\Webservice\Response\Parser\BcsResponseParserInterface;
use \Dhl\Versenden\Bcs\CreationState;
use \Dhl\Versenden\Webservice\Response\Type\CreateShipment\Label;
use \Dhl\Versenden\Webservice\Response\Type\Generic\ItemStatus;

/**
 * Geschäftskunden API response parser
 *
 * @category Dhl
 * @package  Dhl\Versenden\Api
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 *
 * @SuppressWarnings(MEQP2.Classes.ObjectInstantiation)
 */
class BcsResponseParser implements BcsResponseParserInterface
{
    /**
     * @param string $bcsCode
     * @return int
     */
    private function getStatusCode($bcsCode)
    {
        if ($bcsCode == '0') {
            return ResponseStatusInterface::STATUS_SUCCESS;
        }

        return ResponseStatusInterface::STATUS_FAILURE;
    }

    /**
     * Convert BCS SOAP response to list of generic LabelInterface
     *
     * @param \Dhl\Versenden\Bcs\CreateShipmentOrderResponse $response
     * @return Response\Type\CreateShipment\LabelInterface[]
     * @throws \Exception
     */
    public function parseCreateShipmentResponse($response)
    {
        $labels = [];
        $responseStatus = $this->getStatusCode($response->getStatus()->getStatusCode());

        if ($responseStatus !== ResponseStatusInterface::STATUS_SUCCESS) {
            $eMsg = sprintf(
                '%s | %s',
                $response->getStatus()->getStatusText(),
                implode(', ',$response->getStatus()->getStatusMessage())
            );
            //TODO(nr): throw dedicated exception type
            throw new \Exception($eMsg, $response->getStatus()->getStatusCode());
        }

        /** @var CreationState $creationState */
        foreach ($response->getCreationState() as $creationState) {
            $labelStatus = new ItemStatus(
                $creationState->getSequenceNumber(),
                $this->getStatusCode($creationState->getLabelData()->getStatus()->getStatusCode()),
                $creationState->getLabelData()->getStatus()->getStatusText(),
                $creationState->getLabelData()->getStatus()->getStatusMessage()
            );

            $label = new Label(
                $labelStatus,
                $creationState->getSequenceNumber(),
                $creationState->getLabelData()->getShipmentNumber(),
                $creationState->getLabelData()->getLabelData(),
                $creationState->getLabelData()->getReturnLabelData(),
                $creationState->getLabelData()->getExportLabelData(),
                $creationState->getLabelData()->getCodLabelData()
            );

            $labels[(string)$creationState->getSequenceNumber()] = $label;
        }

        return $labels;
    }

    /**
     * Convert BCS SOAP response to generic GetVersionResponse
     *
     * @param \Dhl\Versenden\Bcs\GetVersionResponse $response
     * @return Response\Type\GetVersionResponseInterface
     */
    public function parseGetVersionResponse($response)
    {
        // TODO(nr): Implement parseGetVersionResponse() method.
    }

    /**
     * Convert BCS SOAP response to generic DeleteShipmentResponse
     *
     * @param \Dhl\Versenden\Bcs\DeleteShipmentOrderResponse $response
     * @return Response\Type\DeleteShipmentResponseInterface[]
     */
    public function parseDeleteShipmentResponse($response)
    {
        // TODO(nr): Implement parseDeleteShipmentResponse() method.
    }
}

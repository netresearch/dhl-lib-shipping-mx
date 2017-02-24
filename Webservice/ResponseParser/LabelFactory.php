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
 * @category  Dhl
 * @package   Dhl\Shipping\Api
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Shipping\Webservice\ResponseParser;

use Dhl\Shipping\Webservice\ResponseType\CreateShipment\Label;
use \Dhl\Shipping\Webservice\ResponseType\Generic\ItemStatus;

/**
 * Geschäftskunden API response parser
 *
 * @category Dhl
 * @package  Dhl\Shipping\Api
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 *
 * @SuppressWarnings(MEQP2.Classes.ObjectInstantiation)
 */
class LabelFactory
{
    /**
     * @param string $sequenceNumber
     * @param int $statusCode
     * @param string $statusText
     * @param string $statusMessage
     * @param string $trackingNumber
     * @param string $labelData
     * @param string $returnLabelData
     * @param string $exportLabelData
     * @param string $codLabelData
     * @return Label
     */
    public function create(
        $sequenceNumber,
        $statusCode,
        $statusText,
        $statusMessage,
        $trackingNumber = '',
        $labelData = '',
        $returnLabelData = '',
        $exportLabelData = '',
        $codLabelData = ''
    ) {
        $labelStatus = new ItemStatus(
            $sequenceNumber,
            $statusCode,
            $statusText,
            $statusMessage
        );

        $label = new Label(
            $labelStatus,
            $sequenceNumber,
            $trackingNumber,
            $labelData,
            $returnLabelData,
            $exportLabelData,
            $codLabelData
        );

        return $label;
    }
}

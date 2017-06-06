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

use Dhl\Shipping\Api\Data\Webservice\ResponseType\Generic\ResponseStatusInterface;
use \Dhl\Shipping\Api\Webservice\ResponseParser\GlResponseParserInterface;

/**
 * Global Label API response parser
 *
 * @category Dhl
 * @package  Dhl\Shipping\Api
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class GlResponseParser implements GlResponseParserInterface
{
    /**
     * @var LabelFactory
     */
    private $labelFactory;

    /**
     * GlResponseParser constructor.
     *
     * @param LabelFactory $labelFactory
     */
    public function __construct(LabelFactory $labelFactory)
    {
        $this->labelFactory = $labelFactory;
    }

    /**
     * Convert GLA JSON response to generic CreateShipmentResponse
     *
     * @param \Dhl\Shipping\Gla\Response\LabelResponse $response
     *
     * @return \Dhl\Shipping\Api\Data\Webservice\ResponseType\CreateShipment\LabelInterface[]
     * @throws \Exception
     */
    public function parseCreateShipmentResponse($response)
    {
        $labels = [];

        $shipments = $response->getShipments();

        foreach ($shipments as $shipment) {
            $packages = $shipment->getPackages();
            foreach ($packages as $package) {
                if (!empty($package->getErrors())) {
                    $label = $this->labelFactory->create(
                        $package->getPackageDetails()->getPackageId(),
                        ResponseStatusInterface::STATUS_FAILURE,
                        'Error',
                        'Error occured, while creating Label'
                    );

                    $labels[$package->getPackageDetails()->getPackageId()] = $label;
                } else {
                    $labelDetails = $package->getResponseDetails()->getLabelDetails();
                    foreach ($labelDetails as $labelInfo) {
                        $label = $this->labelFactory->create(
                            $labelInfo->getPackageId(),
                            ResponseStatusInterface::STATUS_SUCCESS,
                            'OK',
                            'OK',
                            $package->getResponseDetails()->getTrackingNumber(),
                            base64_decode($labelInfo->getLabelData())
                        );

                        $labels[$labelInfo->getPackageId()] = $label;
                    }
                }
            }
        }

        return $labels;
    }
}

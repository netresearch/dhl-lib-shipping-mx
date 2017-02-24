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
namespace Dhl\Shipping\Webservice\Adapter;

use \Dhl\Shipping\Api\Webservice\Adapter\GlAdapterInterface;
use \Dhl\Shipping\Api\Webservice\RequestMapper;
use \Dhl\Shipping\Api\Webservice\ResponseParser;
use \Dhl\Shipping\Api\Data\Webservice\RequestType;
use \Dhl\Shipping\Api\Data\Webservice\ResponseType;

/**
 * Global Label API Adapter
 *
 * @category Dhl
 * @package  Dhl\Shipping\Api
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class GlAdapter extends AbstractAdapter implements GlAdapterInterface
{
    /**
     * @var ResponseParser\GlResponseParserInterface
     */
    private $responseParser;

    /**
     * @var RequestMapper\GlDataMapperInterface
     */
    private $requestMapper;

    /**
     * GkAdapter constructor.
     * @param ResponseParser\GlResponseParserInterface $responseParser
     * @param RequestMapper\GlDataMapperInterface $requestMapper
     */
    public function __construct(
        ResponseParser\GlResponseParserInterface $responseParser,
        RequestMapper\GlDataMapperInterface $requestMapper
    ) {
        $this->responseParser = $responseParser;
        $this->requestMapper = $requestMapper;
    }

    /**
     * @param RequestType\CreateShipment\ShipmentOrderInterface $shipmentOrder
     * @return bool
     */
    protected function canHandleShipmentOrder(RequestType\CreateShipment\ShipmentOrderInterface $shipmentOrder)
    {
        $shipperCountries = ['DE', 'AT'];
        return !in_array($shipmentOrder->getShipper()->getAddress()->getCountryCode(), $shipperCountries);
    }

    /**
     * @param RequestType\GetTokenRequestInterface $request
     * @return ResponseType\GetTokenResponseInterface
     */
    public function getAccessToken(RequestType\GetTokenRequestInterface $request)
    {
        //TODO(nr): perform actual request
        $restResponse = new \stdClass($request);
        $response = $this->responseParser->parseGetTokenResponse($restResponse);

        return $response;
    }

    /**
     * @param RequestType\CreateShipment\ShipmentOrderInterface $shipmentOrder
     * @return \Dhl\Shipping\Gla\Rest\GetLabel\Label
     */
    private function createShipmentOrder(RequestType\CreateShipment\ShipmentOrderInterface $shipmentOrder)
    {
        //TODO(nr): perform actual request
        /** @var \Dhl\Shipping\Gla\Rest\GetLabel\Label $restResponse */
        $restResponse = new \stdClass($shipmentOrder);
        return $restResponse;
    }

    /**
     * @param RequestType\CreateShipment\ShipmentOrderInterface[] $shipmentOrders
     * @return ResponseType\CreateShipment\LabelInterface[]
     */
    public function createShipmentOrders(array $shipmentOrders)
    {
        //TODO(nr): create response wrapper entity
        /** @var \Dhl\Shipping\Gla\Rest\GetLabelResponse $restResponse */
        $restResponse = new \ArrayIterator();
        foreach ($shipmentOrders as $request) {
            $labelResponse = $this->createShipmentOrder($request);
            $restResponse['sequenceNumber'] = $labelResponse;
        }

        $response = $this->responseParser->parseCreateShipmentResponse($restResponse);
        return $response;
    }
}

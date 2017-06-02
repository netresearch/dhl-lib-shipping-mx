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

use \Dhl\Shipping\Api\Util\Serializer\SerializerInterface;
use \Dhl\Shipping\Api\Webservice\Adapter\GlAdapterInterface;
use \Dhl\Shipping\Api\Webservice\Client\GlRestClientInterface;
use \Dhl\Shipping\Api\Webservice\RequestMapper;
use \Dhl\Shipping\Api\Webservice\ResponseParser;
use \Dhl\Shipping\Api\Data\Webservice\RequestType;
use \Dhl\Shipping\Api\Data\Webservice\ResponseType;
use \Dhl\Shipping\Gla\Request\LabelRequest;
use \Dhl\Shipping\Gla\Response\ErrorResponse;
use \Dhl\Shipping\Gla\Response\LabelResponse;
use \Dhl\Shipping\Webservice\Exception\ApiAdapterException;
use \Dhl\Shipping\Webservice\Exception\CatchableGlWebserviceException;
use \Dhl\Shipping\Webservice\Exception\FatalGlWebserviceException;

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
     * @var ResponseParser\GlResponseParserInterface
     */
    private $errorResponseParser;

    /**
     * @var RequestMapper\GlDataMapperInterface
     */
    private $requestMapper;

    /**
     * @var GlRestClientInterface
     */
    private $restClient;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * GlAdapter constructor.
     *
     * @param ResponseParser\GlResponseParserInterface      $responseParser
     * @param ResponseParser\GlErrorResponseParserInterface $errorResponseParser
     * @param GlRestClientInterface                         $restClient
     * @param SerializerInterface                           $serializer
     */
    public function __construct(
        ResponseParser\GlResponseParserInterface $responseParser,
        ResponseParser\GlErrorResponseParserInterface $errorResponseParser,
        RequestMapper\GlDataMapperInterface $requestMapper,
        GlRestClientInterface $restClient,
        SerializerInterface $serializer
    ) {
        $this->responseParser      = $responseParser;
        $this->errorResponseParser = $errorResponseParser;
        $this->requestMapper       = $requestMapper;
        $this->restClient          = $restClient;
        $this->serializer          = $serializer;
    }

    /**
     * @param RequestType\CreateShipment\ShipmentOrderInterface $shipmentOrder
     *
     * @return bool
     */
    protected function canHandleShipmentOrder(RequestType\CreateShipment\ShipmentOrderInterface $shipmentOrder)
    {
        $shipperCountries = ['DE', 'AT'];

        return !in_array($shipmentOrder->getShipper()->getAddress()->getCountryCode(), $shipperCountries);
    }

    /**
     * @param RequestType\CreateShipment\ShipmentOrderInterface[] $shipmentOrders
     *
     * @return ResponseType\CreateShipment\LabelInterface[]
     * @throws ApiAdapterException | CatchableGlWebserviceException | FatalGlWebserviceException
     */
    public function createShipmentOrders(array $shipmentOrders)
    {
        // (1) GlApiDataMapper maps shipment orders to json request body
        $shipmentOrders = array_map(
            function ($shipmentOrder) {
                return $this->requestMapper->mapShipmentOrder($shipmentOrder);
            },
            $shipmentOrders
        );

        $labelRequest = new LabelRequest($shipmentOrders);
        $payload      = json_encode($labelRequest);

        try {
            // (2) http client sends payload to API, passes through response
            $restResponse = $this->restClient->generateLabels($payload);
            // (3) deserialize json before passing it to the parser
            /** @var LabelResponse $responseData */
            $responseData = $this->serializer->deserialize($restResponse->getBody(), LabelResponse::class);
            $response = $this->responseParser->parseCreateShipmentResponse($responseData);
        } catch (CatchableGlWebserviceException $e) {
            $restResponse = $this->serializer->deserialize($e->getMessage(), ErrorResponse::class);
            /** @var ErrorResponse $restResponse */
            $response = $this->errorResponseParser->parseErrorResponse($restResponse);
            throw new ApiAdapterException($response);
        } catch (FatalGlWebserviceException $e) {
            throw new ApiAdapterException($e->getMessage());
        }

        return $response;
    }
}

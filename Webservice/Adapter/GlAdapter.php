<?php
/**
 * Dhl Shipping.
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
 *
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 *
 * @link      http://www.netresearch.de/
 */

namespace Dhl\Shipping\Webservice\Adapter;

use Dhl\Shipping\Gla\Request\LabelRequest;
use Dhl\Shipping\Gla\Response\LabelResponse;
use Dhl\Shipping\Util\Serializer\SerializerInterface;
use Dhl\Shipping\Webservice\Client\GlRestClientInterface;
use Dhl\Shipping\Webservice\Exception\ApiCommunicationException;
use Dhl\Shipping\Webservice\Exception\ApiOperationException;
use Dhl\Shipping\Webservice\Exception\GlCommunicationException;
use Dhl\Shipping\Webservice\Exception\GlOperationException;
use Dhl\Shipping\Webservice\RequestMapper;
use Dhl\Shipping\Webservice\RequestType;
use Dhl\Shipping\Webservice\ResponseParser;
use Dhl\Shipping\Webservice\ResponseType;

/**
 * Global Label API Adapter.
 *
 * @category Dhl
 *
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 *
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
     * @param ResponseParser\GlResponseParserInterface $responseParser
     * @param RequestMapper\GlDataMapperInterface      $requestMapper
     * @param GlRestClientInterface                    $restClient
     * @param SerializerInterface                      $serializer
     */
    public function __construct(
        ResponseParser\GlResponseParserInterface $responseParser,
        RequestMapper\GlDataMapperInterface $requestMapper,
        GlRestClientInterface $restClient,
        SerializerInterface $serializer
    ) {
        $this->responseParser = $responseParser;
        $this->requestMapper = $requestMapper;
        $this->restClient = $restClient;
        $this->serializer = $serializer;
    }

    /**
     * @param RequestType\CreateShipment\ShipmentOrderInterface $shipmentOrder
     *
     * @return bool
     */
    protected function canCreateLabel(RequestType\CreateShipment\ShipmentOrderInterface $shipmentOrder)
    {
        $ineligibleCountries = ['DE', 'AT'];
        $shippingOrigin = $shipmentOrder->getShipper()->getAddress()->getCountryCode();

        return !in_array($shippingOrigin, $ineligibleCountries);
    }

    /**
     * Global Label API cannot cancel labels.
     *
     * @param string $shipmentNumber
     *
     * @return bool
     */
    protected function canCancelLabel($shipmentNumber)
    {
        return false;
    }

    /**
     * @param RequestType\CreateShipment\ShipmentOrderInterface[] $shipmentOrders
     *
     * @throws ApiOperationException
     * @throws ApiCommunicationException
     *
     * @return ResponseType\CreateShipment\LabelInterface[]
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
        $payload = json_encode($labelRequest);

        try {
            // (2) http client sends payload to API, passes through response
            $restResponse = $this->restClient->generateLabels($payload);
            // (3) deserialize json before passing it to the parser
            /** @var LabelResponse $responseData */
            $responseData = $this->serializer->deserialize($restResponse->getBody(), LabelResponse::class);
            $response = $this->responseParser->parseCreateShipmentResponse($responseData);
        } catch (GlOperationException $e) {
            throw new ApiOperationException('API operation failed', 0, $e);
        } catch (GlCommunicationException $e) {
            throw new ApiCommunicationException('API communication failed', 0, $e);
        }

        return $response;
    }

    /**
     * @param string[] $shipmentNumbers
     *
     * @throws ApiOperationException
     *
     * @return ResponseType\Generic\ItemStatusInterface[]
     */
    protected function deleteShipmentOrders(array $shipmentNumbers)
    {
        throw new ApiOperationException('Operation not available.');
    }
}

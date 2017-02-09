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
namespace Dhl\Versenden\Webservice\Adapter;

use Dhl\Versenden\Api\Webservice\Client\BcsSoapClientInterface;
use \Dhl\Versenden\Api\Webservice\Request;
use \Dhl\Versenden\Api\Webservice\Response;
use \Dhl\Versenden\Api\Data\Webservice\Request as RequestData;
use \Dhl\Versenden\Api\Data\Webservice\Response as ResponseData;
use \Dhl\Versenden\Api\Webservice\Adapter\BcsAdapterInterface;
use \Dhl\Versenden\Bcs as BcsApi;
use \Dhl\Versenden\Webservice\Response\Type\CreateShipmentResponseCollection;

/**
 * Business Customer Shipping API Adapter
 *
 * @category Dhl
 * @package  Dhl\Versenden\Api
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class BcsAdapter implements BcsAdapterInterface
{
    const WEBSERVICE_VERSION_MAJOR = '2';
    const WEBSERVICE_VERSION_MINOR = '2';
    const WEBSERVICE_VERSION_BUILD = '';

    /**
     * @var Response\Parser\BcsResponseParserInterface
     */
    private $responseParser;

    /**
     * @var Request\Mapper\BcsDataMapperInterface
     */
    private $apiDataMapper;

    /**
     * @var BcsSoapClientInterface
     */
    private $soapClient;

    /**
     * BcsAdapter constructor.
     * @param Response\Parser\BcsResponseParserInterface $responseParser
     * @param Request\Mapper\BcsDataMapperInterface $dataMapper
     * @param BcsSoapClientInterface $soapClient
     */
    public function __construct(
        Response\Parser\BcsResponseParserInterface $responseParser,
        Request\Mapper\BcsDataMapperInterface $dataMapper,
        BcsSoapClientInterface $soapClient
    ) {
        $this->responseParser = $responseParser;
        $this->apiDataMapper = $dataMapper;
        $this->soapClient = $soapClient;
    }

    /**
     * @param RequestData\Type\CreateShipmentRequestInterface[] $shipmentRequests
     * @return ResponseData\Type\CreateShipmentResponseInterface
     */
    public function createShipmentOrder(array $shipmentRequests)
    {
        // TODO(nr): build SOAP types from generic CreateShipmentRequestInterface[]
        $version = new BcsApi\Version(self::WEBSERVICE_VERSION_MAJOR, self::WEBSERVICE_VERSION_MINOR, null);

        $shipmentOrders = [];
        foreach ($shipmentRequests as $shipmentRequest) {
            $shipmentOrders[]= $this->apiDataMapper->mapShipmentRequest($shipmentRequest);
        }

        $request = new BcsApi\CreateShipmentOrderRequest($version, $shipmentOrders);

        //TODO(nr): perform actual request
        $soapResponse = new \stdClass($request);

        /** @var CreateShipmentResponseCollection $response */
        $response = $this->responseParser->parseCreateShipmentResponse($soapResponse);
        return $response;
    }

    public function getVersion(RequestData\Type\GetVersionRequestInterface $versionRequest)
    {
        $request = new BcsApi\Version(
            $versionRequest->getMajorRelease(),
            $versionRequest->getMinorRelease(),
            $versionRequest->getBuild()
        );

        $soapResponse = $this->soapClient->getVersion($request);

        $response = $this->responseParser->parseGetVersionResponse($soapResponse);
        return $response;
    }

    public function deleteShipmentOrder(RequestData\Type\DeleteShipmentRequestInterface $request)
    {
        // TODO: Implement deleteShipmentOrder() method.
    }
}

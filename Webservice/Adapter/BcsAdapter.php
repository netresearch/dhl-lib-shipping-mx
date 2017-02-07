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
     * @var Request\Mapper\BcsRequestMapperInterface
     */
    private $requestMapper;

    /**
     * BcsAdapter constructor.
     * @param Response\Parser\BcsResponseParserInterface $responseParser
     * @param Request\Mapper\BcsRequestMapperInterface $requestMapper
     */
    public function __construct(
        Response\Parser\BcsResponseParserInterface $responseParser,
        Request\Mapper\BcsRequestMapperInterface $requestMapper
    ) {
        $this->responseParser = $responseParser;
        $this->requestMapper = $requestMapper;
    }

    /**
     * @param RequestData\Type\CreateShipmentRequestInterface[] $requests
     * @return CreateShipmentResponseCollection|ResponseData\Type\CreateShipmentResponseInterface[]
     */
    public function createShipmentOrder(array $requests)
    {
        // TODO(nr): build SOAP types from generic CreateShipmentRequestInterface[]
        $version = new BcsApi\Version(self::WEBSERVICE_VERSION_MAJOR, self::WEBSERVICE_VERSION_MINOR, null);
        $shipmentOrders = $this->requestMapper->mapShipmentRequests($requests);

        $request = new BcsApi\CreateShipmentOrderRequest($version, $shipmentOrders);

        //TODO(nr): perform actual request
        $soapResponse = new \stdClass($request);

        /** @var ResponseData\Type\CreateShipmentResponseCollection $response */
        $response = $this->responseParser->parseCreateShipmentResponse($soapResponse);
        return $response;
    }

    public function getVersion(RequestData\Type\GetVersionRequestInterface $request)
    {
        // TODO: Implement getVersion() method.
    }

    public function deleteShipmentOrder(RequestData\Type\DeleteShipmentRequestInterface $request)
    {
        // TODO: Implement deleteShipmentOrder() method.
    }
}

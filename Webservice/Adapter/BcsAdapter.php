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

/**
 * Business Customer Shipping API Adapter
 *
 * @category Dhl
 * @package  Dhl\Versenden\Api
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class BcsAdapter extends AbstractAdapter implements BcsAdapterInterface
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
     * @param RequestData\Type\CreateShipment\ShipmentOrderInterface $shipmentOrder
     * @return bool
     */
    protected function canHandleShipmentOrder(RequestData\Type\CreateShipment\ShipmentOrderInterface $shipmentOrder)
    {
        $shipperCountries = ['DE', 'AT'];
        return in_array($shipmentOrder->getShipper()->getAddress()->getCountryCode(), $shipperCountries);
    }

    /**
     * @param RequestData\Type\CreateShipment\ShipmentOrderInterface[] $shipmentOrders
     * @return ResponseData\Type\CreateShipment\LabelInterface[]
     */
    protected function createShipmentOrders(array $shipmentOrders)
    {
        $version = new BcsApi\Version(self::WEBSERVICE_VERSION_MAJOR, self::WEBSERVICE_VERSION_MINOR, null);

        $shipmentOrders = [];
        foreach ($shipmentOrders as $shipmentRequest) {
            $shipmentOrders[]= $this->apiDataMapper->mapShipmentOrder($shipmentRequest);
        }

        $requestType = new BcsApi\CreateShipmentOrderRequest($version, $shipmentOrders);
        $soapResponse = $this->soapClient->createShipmentOrder($requestType);

        $response = $this->responseParser->parseCreateShipmentResponse($soapResponse);
        return $response;
    }

    /**
     * @param RequestData\Type\GetVersionRequestInterface $versionRequest
     * @return ResponseData\Type\GetVersionResponseInterface
     */
    public function getVersion(RequestData\Type\GetVersionRequestInterface $versionRequest)
    {
        $requestType = new BcsApi\Version(
            $versionRequest->getMajorRelease(),
            $versionRequest->getMinorRelease(),
            $versionRequest->getBuild()
        );
        $soapResponse = $this->soapClient->getVersion($requestType);

        $response = $this->responseParser->parseGetVersionResponse($soapResponse);
        return $response;
    }

    /**
     * @param string[] $shipmentNumbers
     * @return \Dhl\Versenden\Api\Data\Webservice\Response\Type\DeleteShipmentResponseInterface
     * @throws \Exception
     */
    public function cancelLabels(array $shipmentNumbers)
    {
        throw new \Exception('Not yet implemented.');
    }
}

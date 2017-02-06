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
namespace Dhl\Versenden\Api\Webservice\Adapter;

use \Dhl\Versenden\Api\Webservice\Request;
use \Dhl\Versenden\Api\Webservice\Response;

/**
 * Global Label API Adapter
 *
 * @category Dhl
 * @package  Dhl\Versenden\Api
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class GlAdapter implements GlAdapterInterface
{
    /**
     * @var Response\Parser\GlResponseParserInterface
     */
    private $responseParser;

    /**
     * @var Request\Mapper\GlRequestMapperInterface
     */
    private $requestMapper;

    /**
     * GkAdapter constructor.
     * @param Response\Parser\GlResponseParserInterface $responseParser
     * @param Request\Mapper\GlRequestMapperInterface $requestMapper
     */
    public function __construct(
        Response\Parser\GlResponseParserInterface $responseParser,
        Request\Mapper\GlRequestMapperInterface $requestMapper
    ) {
        $this->responseParser = $responseParser;
        $this->requestMapper = $requestMapper;
    }

    /**
     * @param Request\Type\GetTokenRequestInterface $request
     * @return Response\Type\GetTokenResponseInterface
     */
    public function getAccessToken(Request\Type\GetTokenRequestInterface $request)
    {
        //TODO(nr): perform actual request
        $restResponse = new \stdClass($request);
        $response = $this->responseParser->parseGetTokenResponse($restResponse);

        return $response;
    }

    /**
     * @param Request\Type\CreateShipmentRequestInterface $request
     * @return Response\Type\CreateShipmentResponseCollection|Response\Type\CreateShipmentResponseInterface[]
     */
    private function createSingleShipmentOrder(Request\Type\CreateShipmentRequestInterface $request)
    {
        //TODO(nr): perform actual request
        $restResponse = new \stdClass($request);
        $response = $this->responseParser->parseCreateShipmentResponse($restResponse);

        return $response;
    }

    /**
     * @param Request\Type\CreateShipmentRequestInterface[] $requests
     * @return Response\Type\CreateShipmentResponseCollection|Response\Type\CreateShipmentResponseInterface[]
     */
    public function createShipmentOrder(array $requests)
    {
        $responses = [];
        foreach ($requests as $request) {
            $response = $this->createSingleShipmentOrder($request);
            $responses['sequenceNumber'] = $response;
        }

        //TODO(nr) infer overall request status from response(s)
        $status = null;

        return new Response\Type\CreateShipmentResponseCollection(null, $responses);
    }
}

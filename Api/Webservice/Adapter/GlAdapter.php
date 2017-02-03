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
     * Obtain the web service id that the current adapter connects to.
     *
     * @return string
     */
    public function getAdapterType()
    {
        return self::ADAPTER_TYPE_GL;
    }

    public function getAccessToken(Request\Type\GetTokenRequestInterface $request, Response\Parser\GetTokenParserInterface $parser)
    {
        // TODO: Implement getAccessToken() method.
    }

    /**
     * @param Request\Type\CreateShipmentRequestInterface $request
     * @param Response\Parser\CreateShipmentParserInterface $parser
     *
     * @return Response\Type\CreateShipmentResponseInterface
     */
    private function createSingleShipmentOrder(Request\Type\CreateShipmentRequestInterface $request, Response\Parser\CreateShipmentParserInterface $parser)
    {
        //TODO(nr): perform actual request
        $response = new \stdClass($request);
        return $parser->parse($response);
    }

    /**
     * @param Request\Type\CreateShipmentRequestInterface[] $requests
     * @param Response\Parser\CreateShipmentParserInterface $parser
     *
     * @return Response\Type\CreateShipmentResponseCollection|Response\Type\CreateShipmentResponseInterface[]
     */
    public function createShipmentOrder(array $requests, Response\Parser\CreateShipmentParserInterface $parser)
    {
        $responses = [];
        foreach ($requests as $request) {
            $response = $this->createSingleShipmentOrder($request, $parser);
            $responses['sequenceNumber'] = $response;
        }

        //TODO(nr) infer overall request status from response(s)
        $status = null;

        return new Response\Type\CreateShipmentResponseCollection(null, $responses);
    }
}

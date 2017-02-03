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
 * Geschäftskunden API Adapter
 *
 * @category Dhl
 * @package  Dhl\Versenden\Api
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class GkAdapter implements GkAdapterInterface
{
    const WEBSERVICE_VERSION_MAJOR = '2';
    const WEBSERVICE_VERSION_MINOR = '2';
    const WEBSERVICE_VERSION_BUILD = '';

    /**
     * Obtain the web service id that the current adapter connects to.
     *
     * @return string
     */
    public function getAdapterType()
    {
        return self::ADAPTER_TYPE_GK;
    }

    /**
     * @param Request\Type\CreateShipmentRequestInterface[] $requests
     * @param Response\Parser\CreateShipmentParserInterface $parser
     *
     * @return Response\Type\CreateShipmentResponseCollection|Response\Type\CreateShipmentResponseInterface[]
     */
    public function createShipmentOrder(array $requests, Response\Parser\CreateShipmentParserInterface $parser)
    {
        // TODO: Implement createShipmentOrder() method.
        $request = new ShipmentOrder($version, $shipmentRequests);
        $soapResponse = new \stdClass($request);

        /** @var Response\Type\CreateShipmentResponseCollection $response */
        $response = $parser->parse($soapResponse);
        return $response;
    }

    public function getVersion(
        Request\Type\GetVersionRequestInterface $request,
        Response\Parser\GetVersionParserInterface $parser
    ) {
        // TODO: Implement getVersion() method.
    }

    public function deleteShipmentOrder(
        Request\Type\DeleteShipmentRequestInterface $request,
        Response\Parser\DeleteShipmentParserInterface $parser
    ) {
        // TODO: Implement deleteShipmentOrder() method.
    }
}

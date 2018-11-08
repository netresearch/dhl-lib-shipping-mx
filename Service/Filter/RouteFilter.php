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
 * @package   Dhl\Shipping
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2018 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Shipping\Service\Filter;

use Dhl\Shipping\Api\Data\ServiceInterface;
use Dhl\Shipping\Util\ShippingRoutes\RouteValidatorInterface;

/**
 * Check if the service can be booked with the given route.
 *
 * @package  Dhl\Shipping\Service
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class RouteFilter implements FilterInterface
{
    /**
     * @var RouteValidatorInterface
     */
    private $routeValidator;

    /**
     * @var string
     */
    private $originCountryId;

    /**
     * @var string
     */
    private $destinationCountryId;

    /**
     * @var string[]
     */
    private $euCountries;

    /**
     * RouteFilter constructor.
     *
     * @param RouteValidatorInterface $routeValidator
     * @param string                  $originCountryId      Shipper ISO 2 Country Code
     * @param string                  $destinationCountryId Receiver ISO 2 Country Code
     * @param string[]                $euCountries          List of EU Country Codes
     */
    public function __construct(
        RouteValidatorInterface $routeValidator,
        $originCountryId,
        $destinationCountryId,
        array $euCountries
    ) {
        $this->routeValidator = $routeValidator;
        $this->originCountryId = $originCountryId;
        $this->destinationCountryId = $destinationCountryId;
        $this->euCountries = $euCountries;
    }

    /**
     * @param ServiceInterface $service
     *
     * @return bool
     */
    public function isAllowed(ServiceInterface $service)
    {
        $isSupported = $this->routeValidator->isRouteSupported(
            $this->originCountryId,
            $this->destinationCountryId,
            $this->euCountries,
            $service->getRoutes()
        );

        return $isSupported;
    }

    /**
     * @param RouteValidatorInterface $routeValidator
     * @param string                  $originCountryId      Shipper ISO 2 Country Code
     * @param string                  $destinationCountryId Receiver ISO 2 Country Code
     * @param string[]                $euCountries          List of EU Country Codes
     *
     * @return \Closure
     */
    public static function create(
        RouteValidatorInterface $routeValidator,
        $originCountryId,
        $destinationCountryId,
        array $euCountries
    ) {
        $filterFunc = function(ServiceInterface $service) use (
            $routeValidator,
            $originCountryId,
            $destinationCountryId,
            $euCountries
        ) {
            $filter = new static($routeValidator, $originCountryId, $destinationCountryId, $euCountries);
            return $filter->isAllowed($service);
        };

        return $filterFunc;
    }
}

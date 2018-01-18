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
 * @package   Dhl\Shipping\Webservice
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2018 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */

namespace Dhl\Shipping\Util\ShippingRoutes;

/**
 * ShippingRoutes
 *
 * @package  Dhl\Shipping\Webservice
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class Routes implements RoutesInterface
{
    /**
     * @var RouteValidatorInterface
     */
    private $routeValidator;

    /**
     * Routes constructor.
     * @param RouteValidatorInterface $routeValidator
     */
    public function __construct(RouteValidatorInterface $routeValidator)
    {
        $this->routeValidator = $routeValidator;
    }

    /**
     * Obtain all supported origin-destination routes.
     *
     * @return string[]
     */
    private function getRoutes()
    {
        return [
            'DE' => [
                'included' => [self::REGION_INTERNATIONAL],
                'excluded' => [],
            ],
            'AT' => [
                'included' => [self::REGION_INTERNATIONAL],
                'excluded' => [],
            ],
            'US' => [
                'included' => [self::REGION_INTERNATIONAL],
                'excluded' => [],
            ],
            'CL' => [
                'included' => [self::COUNTRY_CODE_CHILE],
                'excluded' => [],
            ],
            'CA' => [
                'included' => [self::REGION_INTERNATIONAL],
                'excluded' => [self::COUNTRY_CODE_CANADA],
            ],
            'SG' => [
                'included' => [self::REGION_INTERNATIONAL],
                'excluded' => [self::COUNTRY_CODE_SINGAPORE],
            ],
            'HK' => [
                'included' => [self::REGION_INTERNATIONAL],
                'excluded' => [self::COUNTRY_CODE_HONGKONG],
            ],
            'TH' => [
                'included' => [self::REGION_INTERNATIONAL],
                'excluded' => [],
            ],
            'JP' => [
                'included' => [self::REGION_INTERNATIONAL],
                'excluded' => [self::COUNTRY_CODE_JAPAN],
            ],
            'CN' => [
                'included' => [self::REGION_INTERNATIONAL],
                'excluded' => [self::COUNTRY_CODE_CHINA],
            ],
            'IN' => [
                'included' => [self::REGION_INTERNATIONAL],
                'excluded' => [self::COUNTRY_CODE_INDIA],
            ],
            'MY' => [
                'included' => [self::REGION_INTERNATIONAL],
                'excluded' => [],
            ],
            'VN' => [
                'included' => [self::COUNTRY_CODE_VIETNAM],
                'excluded' => [],
            ],
            'AU' => [
                'included' => [self::REGION_INTERNATIONAL],
                'excluded' => [self::COUNTRY_CODE_AUSTRALIA],
            ],
            'NZ' => [
                'included' => [self::REGION_INTERNATIONAL],
                'excluded' => [self::COUNTRY_CODE_NEW_ZEALAND],
            ],
        ];
    }

    /**
     * @param string $originCountryId
     * @param string $destinationCountryId
     * @param string[] $euCountries
     * @return bool
     */
    public function canProcessRoute($originCountryId, $destinationCountryId, array $euCountries)
    {
        $canProcess = $this->routeValidator->isRouteSupported(
            $originCountryId,
            $destinationCountryId,
            $euCountries,
            $this->getRoutes()
        );

        return $canProcess;
    }

    /**
     * @param string $originCountryId
     * @param string $destCountryId
     * @param string[] $euCountries
     * @return bool
     */
    public function isCrossBorderRoute($originCountryId, $destCountryId, array $euCountries)
    {
        if ($originCountryId === 'DE') {
            return !in_array($destCountryId, $euCountries);
        }

        if ($originCountryId === 'AT') {
            return !in_array($destCountryId, $euCountries);
        }

        return ($originCountryId !== $destCountryId);
    }
}

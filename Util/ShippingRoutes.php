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
 * @package   Dhl\Shipping\Webservice
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */

namespace Dhl\Shipping\Util;

/**
 * ShippingRoutes
 *
 * @category Dhl
 * @package  Dhl\Shipping\Webservice
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class ShippingRoutes implements ShippingRoutesInterface
{
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
            // Thailand: Domestic only
            'TH' => [
                'included' => [self::COUNTRY_CODE_THAILAND],
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
                'included' => [],
                'excluded' => [],
            ],
            'MY' => [
                'included' => [self::REGION_INTERNATIONAL],
                'excluded' => [],
            ],
            'VN' => [
                'included' => [self::REGION_INTERNATIONAL],
                'excluded' => [],
            ],
            'AU' => [
                'included' => [self::REGION_INTERNATIONAL],
                'excluded' => [self::COUNTRY_CODE_AUSTRALIA],
            ],
        ];
    }

    /**
     * @param string $originCountryId
     * @param string $destCountryId
     * @param string[] $euCountries
     * @return bool
     */
    public function canProcessRoute($originCountryId, $destCountryId, array $euCountries)
    {
        $routes = $this->getRoutes();
        if (!isset($routes[$originCountryId])) {
            // no routes found for origin country, cannot ship with DHL at all
            return false;
        }

        // routes for origin country
        $rules = $routes[$originCountryId];

        // check inclusion of current destination country
        $isIncluded = false;
        $includedCountries = $rules['included'];
        if (in_array(self::REGION_INTERNATIONAL, $includedCountries)) {
            // shipping everywhere
            $isIncluded = true;
        } elseif (in_array(self::REGION_EU, $includedCountries) && in_array($destCountryId, $euCountries)) {
            // shipping to EU, destination is EU
            $isIncluded = true;
        } elseif (in_array($destCountryId, $includedCountries)) {
            // shipping to destination country explicitly
            $isIncluded = true;
        }

        if (!$isIncluded) {
            // destination is not within the supported areas, cannot ship with DHL
            return false;
        }

        // check exclusion of current destination country
        $isExcluded = false;
        $excludedCountries = $rules['excluded'];
        if (in_array(self::REGION_INTERNATIONAL, $excludedCountries)) {
            // shipping nowhere
            $isExcluded = true;
        } elseif (in_array(self::REGION_EU, $excludedCountries) && in_array($destCountryId, $euCountries)) {
            // not shipping to EU, destination is EU
            $isExcluded = true;
        } elseif (in_array($destCountryId, $excludedCountries)) {
            // not shipping to destination country explicitly
            $isExcluded = true;
        }

        return ($isIncluded && !$isExcluded);
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

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

use Dhl\Shipping\Api\Util\ShippingRoutesInterface;

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
            // Germany: EU only, international will be added in 0.3.0
            'DE' => [
                'included' => [self::REGION_EU],
                'excluded' => [],
            ],
            // Austria: EU only, international will be added in 0.3.0
            'AT' => [
                'included' => [self::REGION_EU],
                'excluded' => [],
            ],
            // United States of America: Domestic only, international will be added in 0.4.0
            'US' => [
                'included' => ['US'],
                'excluded' => [],
            ],
            // Chile: Domestic only
            'CL' => [
                'included' => ['CL'],
                'excluded' => [],
            ],
            // Singapore: Cross Border only, will be added in 0.4.0
            'SG' => [
                'included' => [],
                'excluded' => [],
            ],
            // Singapore: Cross Border only, will be added in 0.4.0
            'HK' => [
                'included' => [],
                'excluded' => [],
            ],
            // Thailand: Domestic only
            'TH' => [
                'included' => ['TH'],
                'excluded' => [],
            ],
            // Japan: Cross Border only, will be added in 0.4.0
            'JP' => [
                'included' => [],
                'excluded' => [],
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
}

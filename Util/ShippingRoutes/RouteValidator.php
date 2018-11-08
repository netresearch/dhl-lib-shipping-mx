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
 * @package   Dhl\Shipping\Util
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2018 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Shipping\Util\ShippingRoutes;

/**
 * RouteValidator
 *
 * @package  Dhl\Shipping\Util
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class RouteValidator implements RouteValidatorInterface
{
    /**
     * Check if given origin-destination route matches allowed routes.
     *
     * @param            $originCountryId
     * @param            $destinationCountryId
     * @param string[]   $euCountries
     * @param string[][] $supportedRoutes
     *
     * @return bool
     */
    public function isRouteSupported(
        $originCountryId,
        $destinationCountryId,
        array $euCountries,
        array $supportedRoutes
    ) {
        if (! isset($supportedRoutes[$originCountryId])) {
            // no routes found for origin country, cannot ship with DHL at all
            return false;
        }

        // routes for origin country
        $rules = $supportedRoutes[$originCountryId];

        // check inclusion of current destination country
        $isIncluded = false;
        $includedCountries = $rules['included'];
        if (in_array(RoutesInterface::REGION_INTERNATIONAL, $includedCountries)) {
            // shipping everywhere
            $isIncluded = true;
        } elseif (in_array(RoutesInterface::REGION_EU, $includedCountries)
            && in_array($destinationCountryId, $euCountries)) {
            // shipping to EU, destination is EU
            $isIncluded = true;
        } elseif (in_array($destinationCountryId, $includedCountries)) {
            // shipping to destination country explicitly
            $isIncluded = true;
        }

        if (! $isIncluded) {
            // destination is not within the supported areas, cannot ship with DHL
            return false;
        }

        // check exclusion of current destination country
        $isExcluded = false;
        $excludedCountries = $rules['excluded'];
        if (in_array(RoutesInterface::REGION_INTERNATIONAL, $excludedCountries)) {
            // shipping nowhere
            $isExcluded = true;
        } elseif (in_array(RoutesInterface::REGION_EU, $excludedCountries)
            && in_array($destinationCountryId, $euCountries)) {
            // not shipping to EU, destination is EU
            $isExcluded = true;
        } elseif (in_array($destinationCountryId, $excludedCountries)) {
            // not shipping to destination country explicitly
            $isExcluded = true;
        }

        return ($isIncluded && ! $isExcluded);
    }
}

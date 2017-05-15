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

use Dhl\Shipping\Api\Util\BcsShippingProductsInterface;
use Dhl\Shipping\Api\Util\GlShippingProductsInterface;

/**
 * ShippingProducts
 *
 * @category Dhl
 * @package  Dhl\Shipping\Webservice
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class ShippingProducts implements BcsShippingProductsInterface, GlShippingProductsInterface
{
    /**
     * Obtain all origin-destination-products combinations.
     *
     * @return string[]
     */
    private function getCodes()
    {
        return [
            'DE' => [
                ShippingRoutes::COUNTRY_CODE_GERMANY => [
                    self::CODE_PAKET_NATIONAL,
                ],
                ShippingRoutes::REGION_INTERNATIONAL => [
                    self::CODE_WELTPAKET,
                ],
            ],
            'AT' => [
                ShippingRoutes::COUNTRY_CODE_AUSTRIA => [
                    self::CODE_PAKET_AUSTRIA,
                ],
                ShippingRoutes::REGION_EU => [
                    self::CODE_PAKET_CONNECT,
                ],
                ShippingRoutes::REGION_INTERNATIONAL => [
                    self::CODE_PAKET_INTERNATIONAL,
                ],
            ],
            'US' => [
                ShippingRoutes::COUNTRY_CODE_USA => [
                    self::CODE_AMER_76,
                    self::CODE_AMER_77,
                    self::CODE_AMER_72,
                    self::CODE_AMER_73,
                    self::CODE_AMER_384,
                    self::CODE_AMER_383,
                    self::CODE_AMER_36,
                    self::CODE_AMER_83,
                    self::CODE_AMER_81,
                    self::CODE_AMER_82,
                    self::CODE_AMER_631,
                ],
                ShippingRoutes::REGION_INTERNATIONAL => [
                    self::CODE_AMER_43,
                    self::CODE_AMER_41,
                    self::CODE_AMER_42,
                    self::CODE_AMER_34,
                    self::CODE_AMER_35,
                    self::CODE_AMER_46,
                    self::CODE_AMER_44,
                    self::CODE_AMER_45,
                    self::CODE_AMER_69,
                    self::CODE_AMER_29,
                    self::CODE_AMER_58,
                    self::CODE_AMER_59,
                    self::CODE_AMER_54,
                    self::CODE_AMER_60,
                    self::CODE_AMER_51,
                    self::CODE_AMER_47,
                    self::CODE_AMER_48,
                ],
            ],
            'CL' => [
                ShippingRoutes::COUNTRY_CODE_CHILE => [
                    self::CODE_AMER_76,
                    self::CODE_AMER_77,
                    self::CODE_AMER_72,
                    self::CODE_AMER_73,
                    self::CODE_AMER_384,
                    self::CODE_AMER_383,
                    self::CODE_AMER_36,
                    self::CODE_AMER_83,
                    self::CODE_AMER_81,
                    self::CODE_AMER_82,
                    self::CODE_AMER_631,
                ],
                ShippingRoutes::REGION_INTERNATIONAL => [
                    self::CODE_AMER_43,
                    self::CODE_AMER_41,
                    self::CODE_AMER_42,
                    self::CODE_AMER_34,
                    self::CODE_AMER_35,
                    self::CODE_AMER_46,
                    self::CODE_AMER_44,
                    self::CODE_AMER_45,
                    self::CODE_AMER_69,
                    self::CODE_AMER_29,
                    self::CODE_AMER_58,
                    self::CODE_AMER_59,
                    self::CODE_AMER_54,
                    self::CODE_AMER_60,
                    self::CODE_AMER_51,
                    self::CODE_AMER_47,
                    self::CODE_AMER_48,
                ],
            ],
            'SG' => [
                ShippingRoutes::COUNTRY_CODE_SINGAPORE => [
                    // not applicable atm
                ],
                ShippingRoutes::REGION_INTERNATIONAL => [
                    self::CODE_APAC_PPM,
                    self::CODE_APAC_PPS,
                    self::CODE_APAC_PKM,
                    self::CODE_APAC_PKD,
                    self::CODE_APAC_PLT,
                    self::CODE_APAC_PLE,
                    self::CODE_APAC_PLD,
                ],
            ],
            'HK' => [
                ShippingRoutes::COUNTRY_CODE_HONGKONG => [
                    // not applicable atm
                ],
                ShippingRoutes::REGION_INTERNATIONAL => [
                    self::CODE_APAC_PPM,
                    self::CODE_APAC_PPS,
                    self::CODE_APAC_PKM,
                    self::CODE_APAC_PKD,
                    self::CODE_APAC_PLT,
                    self::CODE_APAC_PLE,
                    self::CODE_APAC_PLD,
                ],
            ],
            'TH' => [
                ShippingRoutes::COUNTRY_CODE_THAILAND => [
                    self::CODE_APAC_PDO,
                ],
                ShippingRoutes::REGION_INTERNATIONAL => [
                    // not applicable atm
                ],
            ],
            'JP' => [
                ShippingRoutes::COUNTRY_CODE_JAPAN => [
                    // not applicable atm
                ],
                ShippingRoutes::REGION_INTERNATIONAL => [
                    self::CODE_APAC_PPM,
                    self::CODE_APAC_PPS,
                    self::CODE_APAC_PKM,
                    self::CODE_APAC_PKD,
                    self::CODE_APAC_PLT,
                    self::CODE_APAC_PLE,
                    self::CODE_APAC_PLD,
                ],
            ],
        ];
    }

    /**
     * @param string $originCountryId
     * @param string $destCountryId
     * @param string[] $euCountries
     * @return string[]
     */
    public function getApplicableCodes($originCountryId, $destCountryId, array $euCountries)
    {
        $codes = $this->getCodes();
        if (!isset($codes[$originCountryId])) {
            // no codes found for origin country, cannot ship with DHL at all
            return [];
        }

        $applicableCodes = $codes[$originCountryId];
        if (isset($applicableCodes[$destCountryId])) {
            // exact match
            return $applicableCodes[$destCountryId];
        }

        if (in_array($destCountryId, $euCountries) && isset($applicableCodes[ShippingRoutes::REGION_EU])) {
            // match by region EU
            return $applicableCodes[ShippingRoutes::REGION_EU];
        }

        if (isset($applicableCodes[ShippingRoutes::REGION_INTERNATIONAL])) {
            // match by region ROW
            return $applicableCodes[ShippingRoutes::REGION_INTERNATIONAL];
        }

        return [];
    }
}

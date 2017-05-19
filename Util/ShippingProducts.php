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
                    self::CODE_AMER_72,
                    self::CODE_AMER_73,
                    self::CODE_AMER_76,
                    self::CODE_AMER_77,
                    self::CODE_AMER_36,
                    self::CODE_AMER_83,
                    self::CODE_AMER_81,
                    self::CODE_AMER_82,
                    self::CODE_AMER_631,
                    self::CODE_AMER_80,
                    self::CODE_AMER_284,
                    self::CODE_AMER_761,
                ],
                ShippingRoutes::REGION_INTERNATIONAL => [
                    self::CODE_AMER_BMY,
                    self::CODE_AMER_BMD,
                    self::CODE_AMER_PKT,
                    self::CODE_AMER_PLX,
                    self::CODE_AMER_PLY,
                    self::CODE_AMER_PLT,
                    self::CODE_AMER_PID,
                    self::CODE_AMER_PIY,
                ],
            ],
            'CL' => [
                ShippingRoutes::COUNTRY_CODE_CHILE => [
                    self::CODE_APAC_PDO,
                ],
                ShippingRoutes::REGION_INTERNATIONAL => [
                    // not applicable atm
                ],
            ],
            'CA' => [
                ShippingRoutes::COUNTRY_CODE_CANADA => [
                    // not applicable atm
                ],
                ShippingRoutes::REGION_INTERNATIONAL => [
                    self::CODE_AMER_BMY,
                    self::CODE_AMER_BMD,
                    self::CODE_AMER_PKT,
                    self::CODE_AMER_PLX,
                    self::CODE_AMER_PLY,
                    self::CODE_AMER_PLT,
                    self::CODE_AMER_PID,
                    self::CODE_AMER_PIY,
                ],
            ],
            'SG' => [
                ShippingRoutes::COUNTRY_CODE_SINGAPORE => [
                    // not applicable atm
                ],
                ShippingRoutes::REGION_INTERNATIONAL => [
                    self::CODE_APAC_PPS,
                    self::CODE_APAC_PPM,
                    self::CODE_APAC_PKD,
                    self::CODE_APAC_PKG,
                    self::CODE_APAC_PKM,
                    self::CODE_APAC_PLT,
                    self::CODE_APAC_PLD,
                    self::CODE_APAC_PLE,
                    self::CODE_APAC_AP7,
                    self::CODE_APAC_PDP,
                ],
            ],
            'HK' => [
                ShippingRoutes::COUNTRY_CODE_HONGKONG => [
                    // not applicable atm
                ],
                ShippingRoutes::REGION_INTERNATIONAL => [
                    self::CODE_APAC_PPS,
                    self::CODE_APAC_PPM,
                    self::CODE_APAC_PKD,
                    self::CODE_APAC_PKG,
                    self::CODE_APAC_PKM,
                    self::CODE_APAC_PLT,
                    self::CODE_APAC_PLD,
                    self::CODE_APAC_PLE,
                    self::CODE_APAC_AP7,
                    self::CODE_APAC_PDP,
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
                    self::CODE_APAC_PPS,
                    self::CODE_APAC_PPM,
                    self::CODE_APAC_PKD,
                    self::CODE_APAC_PKG,
                    self::CODE_APAC_PKM,
                    self::CODE_APAC_PLT,
                    self::CODE_APAC_PLD,
                    self::CODE_APAC_PLE,
                    self::CODE_APAC_AP7,
                    self::CODE_APAC_PDP,
                ],
            ],
            'CN' => [
                ShippingRoutes::COUNTRY_CODE_CHINA => [
                    // not applicable atm
                ],
                ShippingRoutes::REGION_INTERNATIONAL => [
                    self::CODE_APAC_PPS,
                    self::CODE_APAC_PPM,
                    self::CODE_APAC_PKD,
                    self::CODE_APAC_PKG,
                    self::CODE_APAC_PKM,
                    self::CODE_APAC_PLT,
                    self::CODE_APAC_PLD,
                    self::CODE_APAC_PLE,
                    self::CODE_APAC_AP7,
                    self::CODE_APAC_PDP,
                ],
            ],
            'IN' => [
                ShippingRoutes::COUNTRY_CODE_INDIA => [
                    // not applicable atm
                ],
                ShippingRoutes::REGION_INTERNATIONAL => [
                    // not applicable atm
                ],
            ],
            'MY' => [
                ShippingRoutes::COUNTRY_CODE_MALAYSIA => [
                    self::CODE_APAC_PDO,
                ],
                ShippingRoutes::REGION_INTERNATIONAL => [
                    self::CODE_APAC_PPS,
                    self::CODE_APAC_PPM,
                    self::CODE_APAC_PKD,
                    self::CODE_APAC_PKG,
                    self::CODE_APAC_PKM,
                    self::CODE_APAC_PLT,
                    self::CODE_APAC_PLD,
                    self::CODE_APAC_PLE,
                    self::CODE_APAC_AP7,
                    self::CODE_APAC_PDP,
                ],
            ],
            'VN' => [
                ShippingRoutes::COUNTRY_CODE_VIETNAM => [
                    self::CODE_APAC_PDO,
                ],
                ShippingRoutes::REGION_INTERNATIONAL => [
                    self::CODE_APAC_PPS,
                    self::CODE_APAC_PPM,
                    self::CODE_APAC_PKD,
                    self::CODE_APAC_PKG,
                    self::CODE_APAC_PKM,
                    self::CODE_APAC_PLT,
                    self::CODE_APAC_PLD,
                    self::CODE_APAC_PLE,
                    self::CODE_APAC_AP7,
                    self::CODE_APAC_PDP,
                ],
            ],
            'AU' => [
                ShippingRoutes::COUNTRY_CODE_AUSTRALIA => [
                    // not applicable atm
                ],
                ShippingRoutes::REGION_INTERNATIONAL => [
                    self::CODE_APAC_PPS,
                    self::CODE_APAC_PPM,
                    self::CODE_APAC_PKD,
                    self::CODE_APAC_PKG,
                    self::CODE_APAC_PKM,
                    self::CODE_APAC_PLT,
                    self::CODE_APAC_PLD,
                    self::CODE_APAC_PLE,
                    self::CODE_APAC_AP7,
                    self::CODE_APAC_PDP,
                ],
            ],
        ];
    }

    /**
     * Obtain procedure number by product code.
     *
     * @param string $code Product code
     *
     * @return string
     */
    private function getProcedure($code)
    {
        $procedures = [
            self::CODE_PAKET_NATIONAL      => self::PROCEDURE_PAKET_NATIONAL,
            self::CODE_WELTPAKET           => self::PROCEDURE_WELTPAKET,
            self::CODE_EUROPAKET           => self::PROCEDURE_EUROPAKET,
            self::CODE_KURIER_TAGGLEICH    => self::PROCEDURE_KURIER_TAGGLEICH,
            self::CODE_KURIER_WUNSCHZEIT   => self::PROCEDURE_KURIER_WUNSCHZEIT,
            self::CODE_PAKET_AUSTRIA       => self::PROCEDURE_PAKET_AUSTRIA,
            self::CODE_PAKET_CONNECT       => self::PROCEDURE_PAKET_CONNECT,
            self::CODE_PAKET_INTERNATIONAL => self::PROCEDURE_PAKET_INTERNATIONAL,
        ];

        if (!isset($procedures[$code])) {
            return '';
        }

        return $procedures[$code];
    }

    /**
     * Obtain procedure number for return shipments.
     *
     * @param string $code Product code
     *
     * @return string
     */
    private function getProcedureReturn($code)
    {
        $procedures = [
            self::CODE_PAKET_NATIONAL => self::PROCEDURE_RETURNSHIPMENT_NATIONAL,
            self::CODE_PAKET_AUSTRIA  => self::PROCEDURE_RETURNSHIPMENT_AUSTRIA,
            self::CODE_PAKET_CONNECT  => self::PROCEDURE_RETURNSHIPMENT_CONNECT,
        ];

        if (!isset($procedures[$code])) {
            return '';
        }

        return $procedures[$code];
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

    /**
     * Get the billing number a.k.a. account number based on selected product.
     *
     * @param string $productCode
     * @param string $ekp
     * @param string[] $participations
     *
     * @return string
     */
    public function getBillingNumber($productCode, $ekp, $participations)
    {
        $procedure = $this->getProcedure($productCode);
        $participation = isset($participations[$procedure]) ? $participations[$procedure] : '';

        return $ekp . $procedure . $participation;
    }

    /**
     * Get the billing number a.k.a. account number for shipment returns.
     *
     * @param string $productCode
     * @param string $ekp
     * @param string[] $participations
     *
     * @return string
     */
    public function getReturnBillingNumber($productCode, $ekp, $participations)
    {
        $procedure = $this->getProcedureReturn($productCode);
        $participation = isset($participations[$procedure]) ? $participations[$procedure] : '';

        return $ekp . $procedure . $participation;
    }
}

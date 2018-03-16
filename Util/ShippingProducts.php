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
 * @package   Dhl\Shipping
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Shipping\Util;

/**
 * ShippingProducts
 *
 * @category Dhl
 * @package  Dhl\Shipping\Util
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class ShippingProducts implements BcsShippingProductsInterface, GlShippingProductsInterface
{
    /**
     * Obtain all origin-destination-products combinations.
     *
     * @return string[][][]
     */
    private function getCodes()
    {
        return [
            'DE' => [
                ShippingRoutes::COUNTRY_CODE_GERMANY => [
                    self::CODE_NATIONAL,
                ],
                ShippingRoutes::COUNTRY_CODE_AUSTRIA => [
                    self::CODE_INTERNATIONAL,
                    //self::CODE_CONNECT,
                ],
                ShippingRoutes::COUNTRY_CODE_BELGIUM => [
                    self::CODE_INTERNATIONAL,
                    //self::CODE_CONNECT,
                ],
                ShippingRoutes::COUNTRY_CODE_LUXEMBURG => [
                    self::CODE_INTERNATIONAL,
                    //self::CODE_CONNECT,
                ],
                ShippingRoutes::COUNTRY_CODE_NETHERLANDS => [
                    self::CODE_INTERNATIONAL,
                    //self::CODE_CONNECT,
                ],
                ShippingRoutes::COUNTRY_CODE_POLAND => [
                    self::CODE_INTERNATIONAL,
                    //self::CODE_CONNECT,
                ],
                ShippingRoutes::COUNTRY_CODE_SLOVAKIA => [
                    self::CODE_INTERNATIONAL,
                    //self::CODE_CONNECT,
                ],
                ShippingRoutes::COUNTRY_CODE_CZECH_REPUBLIC => [
                    self::CODE_INTERNATIONAL,
                    //self::CODE_CONNECT,
                ],
                ShippingRoutes::REGION_EU => [
                    self::CODE_INTERNATIONAL,
                ],
                ShippingRoutes::REGION_INTERNATIONAL => [
                    self::CODE_INTERNATIONAL,
                ],
            ],
            'AT' => [
                ShippingRoutes::COUNTRY_CODE_AUSTRIA => [
                    self::CODE_PAKET_AUSTRIA,
                ],
                ShippingRoutes::COUNTRY_CODE_GERMANY => [
                    self::CODE_PAKET_CONNECT
                ],
                ShippingRoutes::COUNTRY_CODE_BELGIUM => [
                    self::CODE_PAKET_CONNECT
                ],
                ShippingRoutes::COUNTRY_CODE_LUXEMBURG => [
                    self::CODE_PAKET_CONNECT
                ],
                ShippingRoutes::COUNTRY_CODE_NETHERLANDS => [
                    self::CODE_PAKET_CONNECT
                ],
                ShippingRoutes::COUNTRY_CODE_POLAND => [
                    self::CODE_PAKET_CONNECT
                ],
                ShippingRoutes::COUNTRY_CODE_SLOVAKIA => [
                    self::CODE_PAKET_CONNECT
                ],
                ShippingRoutes::COUNTRY_CODE_CZECH_REPUBLIC => [
                    self::CODE_PAKET_CONNECT
                ],
                ShippingRoutes::REGION_EU => [
                    self::CODE_PAKET_INTERNATIONAL,
                ],
                ShippingRoutes::REGION_INTERNATIONAL => [
                    self::CODE_PAKET_INTERNATIONAL,
                ],
            ],
            'US' => [
                ShippingRoutes::COUNTRY_CODE_USA => [
                    self::CODE_AMER_76,
                    self::CODE_AMER_77,
                    self::CODE_AMER_36,
                    self::CODE_AMER_83,
                    self::CODE_AMER_81,
                    self::CODE_AMER_82,
                    self::CODE_AMER_631,
                ],
                ShippingRoutes::REGION_INTERNATIONAL => [
                    self::CODE_AMER_PKY,
                    self::CODE_AMER_PLY,
                    self::CODE_PLT,
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
                    self::CODE_AMER_PKY,
                    self::CODE_AMER_PLY,
                    self::CODE_PLT,
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
                    self::CODE_PLT,
                    self::CODE_APAC_PLD,
                    self::CODE_APAC_PLE,
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
                    self::CODE_PLT,
                    self::CODE_APAC_PLD,
                    self::CODE_APAC_PLE,
                ],
            ],
            'TH' => [
                ShippingRoutes::COUNTRY_CODE_THAILAND => [
                    self::CODE_APAC_PDO,
                ],
                ShippingRoutes::REGION_INTERNATIONAL => [
                    self::CODE_APAC_PPS,
                    self::CODE_APAC_PPM,
                    self::CODE_APAC_PKD,
                    self::CODE_APAC_PKG,
                    self::CODE_APAC_PKM,
                    self::CODE_PLT,
                    self::CODE_APAC_PLD,
                    self::CODE_APAC_PLE,

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
                    self::CODE_PLT,
                    self::CODE_APAC_PLD,
                    self::CODE_APAC_PLE,
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
                    self::CODE_PLT,
                    self::CODE_APAC_PLD,
                    self::CODE_APAC_PLE,
                ],
            ],
            'IN' => [
                ShippingRoutes::COUNTRY_CODE_INDIA => [
                    // not applicable atm
                ],
                ShippingRoutes::REGION_INTERNATIONAL => [
                    self::CODE_APAC_PPS,
                    self::CODE_APAC_PPM,
                    self::CODE_APAC_PKD,
                    self::CODE_APAC_PKG,
                    self::CODE_APAC_PKM,
                    self::CODE_PLT,
                    self::CODE_APAC_PLD,
                    self::CODE_APAC_PLE,
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
                    self::CODE_PLT,
                    self::CODE_APAC_PLD,
                    self::CODE_APAC_PLE,
                ],
            ],
            'VN' => [
                ShippingRoutes::COUNTRY_CODE_VIETNAM => [
                    self::CODE_APAC_PDO,
                    self::CODE_APAC_PDE,
                ],
                ShippingRoutes::REGION_INTERNATIONAL => [
                    self::CODE_APAC_PPS,
                    self::CODE_APAC_PPM,
                    self::CODE_APAC_PKD,
                    self::CODE_APAC_PKG,
                    self::CODE_APAC_PKM,
                    self::CODE_PLT,
                    self::CODE_APAC_PLD,
                    self::CODE_APAC_PLE,
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
                    self::CODE_PLT,
                    self::CODE_APAC_PLD,
                    self::CODE_APAC_PLE,
                ],
            ],
            'NZ' => [
                ShippingRoutes::COUNTRY_CODE_NEW_ZEALAND => [
                    // not applicable atm
                ],
                ShippingRoutes::REGION_INTERNATIONAL => [
                    self::CODE_APAC_PPS,
                    self::CODE_APAC_PPM,
                    self::CODE_APAC_PKD,
                    self::CODE_APAC_PKG,
                    self::CODE_APAC_PKM,
                    self::CODE_PLT,
                    self::CODE_APAC_PLD,
                    self::CODE_APAC_PLE,
                ],
            ]
        ];
    }

    /**
     * Obtain human readable name for given product code
     *
     * @param string $code
     * @return string
     */
    public function getProductName($code)
    {
        $names = [
            self::CODE_NATIONAL            => 'DHL Paket',
            self::CODE_CONNECT             => 'DHL Paket Connect',
            self::CODE_INTERNATIONAL       => 'DHL Paket International',
            self::CODE_PAKET_AUSTRIA       => 'DHL PAKET Austria',
            self::CODE_PAKET_CONNECT       => 'DHL PAKET Connect',
            self::CODE_PAKET_INTERNATIONAL => 'DHL PAKET International',

            self::CODE_APAC_PKG => 'DHL Packet International Economy',
            self::CODE_APAC_PKD => 'DHL Packet International Standard',
            self::CODE_APAC_PKM => 'DHL Packet International Priority Manifest',
            self::CODE_APAC_PPS => 'DHL Packet Plus International Standard',
            self::CODE_APAC_PPM => 'DHL Packet Plus International Priority Manifest',
            self::CODE_APAC_PLD => 'DHL Parcel International Standard',
            self::CODE_APAC_PLE => 'DHL Parcel International Direct Expedited',
            self::CODE_APAC_PDO => 'DHL Parcel Domestic',
            self::CODE_APAC_PDE => 'DHL Parcel Domestic Expedited',

            self::CODE_AMER_PKY => 'DHL Packet International',
            self::CODE_AMER_29  => 'DHL Packet International',
            self::CODE_AMER_PLY => 'DHL Parcel International Standard',
            self::CODE_AMER_54  => 'DHL Parcel International Standard',
            self::CODE_AMER_PID => 'DHL Parcel International Direct Standard',
            self::CODE_AMER_22  => 'DHL Parcel International Direct Standard',
            self::CODE_AMER_60  => 'DHL Parcel International Direct',
            self::CODE_AMER_PLX => 'DHL Parcel International Expedited',

            self::CODE_AMER_76 => 'DHL SM BPM Expedited',
            self::CODE_AMER_77 => 'DHL SM BPM Ground',
            self::CODE_AMER_36 => 'DHL SM Parcel Plus Expedited',
            self::CODE_AMER_83 => 'DHL SM Parcel Plus Ground',
            self::CODE_AMER_81 => 'DHL SM Parcel Expedited',
            self::CODE_AMER_82 => 'DHL SM Parcel Ground',
            self::CODE_AMER_631 => 'DHL SM Parcel Expedited Max',

            // Used by APAC and AMER
            self::CODE_PLT     => 'DHL Parcel International Direct',

        ];

        if (!isset($names[$code])) {
            return $code;
        }

        return $names[$code];
    }

    /**
     * Obtain a list of all supported shipping products.
     *
     * @return string[]
     */
    public function getAllCodes()
    {
        $codes = [];

        $rules = $this->getCodes();
        foreach ($rules as $origin => $route) {
            foreach ($route as $routeName => $routeCodes) {
                $codes = array_merge($codes, $routeCodes);
            }
        }

        return array_unique($codes);
    }

    /**
     * Obtain a list of supported shipping origin country codes
     *
     * @return string[]
     */
    public function getAllCountries()
    {
        $countries = array_keys($this->getCodes());

        return $countries;
    }

    /**
     * @param string $originCountryId
     * @param string|null $destCountryId
     * @param string[] $euCountries
     * @return string[]
     */
    public function getApplicableCodes($originCountryId, $destCountryId = null, array $euCountries = [])
    {
        $applicableCodes = [];
        $codes = $this->getCodes();
        if (!isset($codes[$originCountryId])) {
            // no codes found for origin country, cannot ship with DHL at all
            return $applicableCodes;
        }

        if ($destCountryId === null) {
            // return all codes for the origin country
            foreach (array_values($codes[$originCountryId]) as $code) {
                $applicableCodes = array_merge($applicableCodes, $code);
            }
            return array_unique($applicableCodes);
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
     * @param $originCountryId
     * @return array
     */
    public function getApplicableProcedures($originCountryId)
    {
        $procedures = [];

        $products = $this->getApplicableCodes($originCountryId);
        foreach ($products as $code) {
            $procedures[] = $this->getProcedure($code);
        }

        return array_unique($procedures);
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
            self::CODE_NATIONAL            => self::PROCEDURE_NATIONAL,
            self::CODE_CONNECT             => self::PROCEDURE_CONNECT,
            self::CODE_INTERNATIONAL       => self::PROCEDURE_INTERNATIONAL,
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
            self::CODE_NATIONAL => self::PROCEDURE_RETURNSHIPMENT_NATIONAL,
            self::CODE_PAKET_AUSTRIA => self::PROCEDURE_RETURNSHIPMENT_AUSTRIA,
            self::CODE_PAKET_CONNECT => self::PROCEDURE_RETURNSHIPMENT_CONNECT,
        ];

        if (!isset($procedures[$code])) {
            return '';
        }

        return $procedures[$code];
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

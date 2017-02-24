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

namespace Dhl\Shipping\Webservice;

use Dhl\Shipping\Api\Config\BcsConfigInterface;
use \Dhl\Shipping\Api\Webservice\BcsAccessDataInterface;

/**
 * BcsAccessData
 *
 * @category Dhl
 * @package  Dhl\Shipping\Webservice
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class BcsAccessData implements BcsAccessDataInterface
{
    /**
     * @var BcsConfigInterface
     */
    public $config;

    /**
     * ProductProvider constructor.
     *
     * @param BcsConfigInterface $config
     */
    public function __construct(BcsConfigInterface $config)
    {
        $this->config = $config;
    }

    /**
     * Get the GK API product code.
     *
     * @param string $shipperCountry
     * @param string $recipientCountry
     * @param string[] $euCountries
     *
     * @return string
     */
    public function getProductCode($shipperCountry, $recipientCountry, $euCountries)
    {
        // domestic
        if ($shipperCountry == 'DE' && $recipientCountry == 'DE') {
            return self::CODE_PAKET_NATIONAL;
        }

        if ($shipperCountry == 'AT' && $recipientCountry == 'AT') {
            return self::CODE_PAKET_AUSTRIA;
        }

        // eu
        if ($shipperCountry == 'DE' && in_array($recipientCountry, $euCountries)) {
            return self::CODE_WELTPAKET;
        }

        if ($shipperCountry == 'AT' && in_array($recipientCountry, $euCountries)) {
            return self::CODE_PAKET_CONNECT;
        }

        // row
        if ($shipperCountry == 'DE') {
            return self::CODE_WELTPAKET;
        }

        if ($shipperCountry == 'AT') {
            return self::CODE_PAKET_INTERNATIONAL;
        }

        return [];
    }

    /**
     * Get the billing number a.k.a. account number based on selected product.
     *
     * @param string $productCode
     *
     * @return string
     */
    public function getBillingNumber($productCode)
    {
        $procedure = $this->getProcedure($productCode);

        return sprintf(
            '%s%s%s',
            $this->config->getAccountEkp(),
            $procedure,
            $this->config->getAccountParticipation($procedure)
        );
    }

    /**
     * Get the billing number a.k.a. account number for shipment returns.
     *
     * @param string $productCode
     *
     * @return string
     */
    public function getReturnShipmentBillingNumber($productCode)
    {
        $procedure = $this->getProcedureReturn($productCode);

        return sprintf(
            '%s%s%s',
            $this->config->getAccountEkp(),
            $procedure,
            $this->config->getAccountParticipation($procedure)
        );
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
}

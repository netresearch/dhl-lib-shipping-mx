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
 * PHP version 5
 *
 * @category  Dhl
 * @package   Dhl\Versenden\Api\Data
 * @author    Benjamin Heuer <benjamin.heuer@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */

namespace Dhl\Versenden\Api\Data;

/**
 * InfoInterface
 *
 * @category Dhl
 * @package  Dhl\Versenden\Api\Data
 * @author   Benjamin Heuer <benjamin.heuer@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
interface BcsProductProviderInterface
{
    const CODE_PAKET_NATIONAL      = 'V01PAK';
    const CODE_WELTPAKET           = 'V53WPAK';
    const CODE_EUROPAKET           = 'V54EPAK';
    const CODE_KURIER_TAGGLEICH    = 'V06TG';
    const CODE_KURIER_WUNSCHZEIT   = 'V06WZ';
    const CODE_PAKET_AUSTRIA       = 'V86PARCEL';
    const CODE_PAKET_CONNECT       = 'V87PARCEL';
    const CODE_PAKET_INTERNATIONAL = 'V82PARCEL';

    const PROCEDURE_PAKET_NATIONAL          = '01';
    const PROCEDURE_WELTPAKET               = '53';
    const PROCEDURE_EUROPAKET               = '54';
    const PROCEDURE_KURIER_TAGGLEICH        = '01';
    const PROCEDURE_KURIER_WUNSCHZEIT       = '01';
    const PROCEDURE_PAKET_AUSTRIA           = '86';
    const PROCEDURE_PAKET_CONNECT           = '87';
    const PROCEDURE_PAKET_INTERNATIONAL     = '82';
    const PROCEDURE_RETURNSHIPMENT_NATIONAL = '07';
    const PROCEDURE_RETURNSHIPMENT_AUSTRIA  = '83';
    const PROCEDURE_RETURNSHIPMENT_CONNECT  = '85';

    /**
     * Get the product name for shipment request
     *
     * @param string $shipperCountry
     * @param string $recipientCountry
     * @param array  $euCountries
     *
     * @return string
     */
    public function getProductName($shipperCountry, $recipientCountry, $euCountries);

    /**
     * Get the account number for shipment request
     *
     * @param string $product
     *
     * @return string
     */
    public function getAccountNumber($product);

    /**
     * Get the return account number for shipment request
     *
     * @param string $product
     *
     * @return string
     */
    public function getReturnShipmentAccountNumber($product);
}

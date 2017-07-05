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
namespace Dhl\Shipping\Api\Util;

/**
 * ShippingRoutesInterface
 *
 * @category Dhl
 * @package  Dhl\Shipping
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
interface ShippingRoutesInterface
{
    const REGION_EU = 'EURO';
    const REGION_AMERICA = 'AMER';
    const REGION_ASIA_PACIFIC = 'APAC';
    const REGION_INTERNATIONAL = 'INTL';

    const COUNTRY_CODE_GERMANY = 'DE';
    const COUNTRY_CODE_AUSTRIA = 'AT';
    const COUNTRY_CODE_USA = 'US';
    const COUNTRY_CODE_CANADA = 'CA';
    const COUNTRY_CODE_CHILE = 'CL';
    const COUNTRY_CODE_SINGAPORE = 'SG';
    const COUNTRY_CODE_HONGKONG = 'HK';
    const COUNTRY_CODE_THAILAND = 'TH';
    const COUNTRY_CODE_JAPAN = 'JP';
    const COUNTRY_CODE_CHINA = 'CN';
    const COUNTRY_CODE_INDIA = 'IN';
    const COUNTRY_CODE_MALAYSIA = 'MY';
    const COUNTRY_CODE_VIETNAM = 'VN';
    const COUNTRY_CODE_AUSTRALIA = 'AU';

    /**
     * @param $originCountryId
     * @param $destCountryId
     * @param array $euCountries
     * @return mixed
     */
    public function canProcessRoute($originCountryId, $destCountryId, array $euCountries);

    /**
     * @param $originCountryId
     * @param $destCountryId
     * @param array $euCountries
     * @return mixed
     */
    public function isCrossBorderRoute($originCountryId, $destCountryId, array $euCountries);
}

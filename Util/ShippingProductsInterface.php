<?php
/**
 * Dhl Shipping.
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
 *
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 *
 * @link      http://www.netresearch.de/
 */

namespace Dhl\Shipping\Util;

/**
 * ShippingProductsInterface.
 *
 * @category Dhl
 *
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 *
 * @link     http://www.netresearch.de/
 */
interface ShippingProductsInterface
{
    /**
     * Obtain a list of all supported shipping products.
     *
     * @return string[]
     */
    public function getAllCodes();

    /**
     * Find all shipping products that apply to the given shipping route.
     *
     * @param string   $originCountryId
     * @param string   $destCountryId
     * @param string[] $euCountries
     *
     * @return string[]
     */
    public function getApplicableCodes($originCountryId, $destCountryId, array $euCountries);

    /**
     * Obtain human readable name for given product code.
     *
     * @param string $code
     *
     * @return string
     */
    public function getProductName($code);
}

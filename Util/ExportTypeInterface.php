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
 * @category  Dhl
 *
 * @author    Paul Siedler <paul.siedler@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 *
 * @link      http://www.netresearch.de/
 */

namespace Dhl\Shipping\Util;

interface ExportTypeInterface
{
    const TYPE_OTHER = 'OTHER';
    const TYPE_PRESENT = 'PRESENT';
    const TYPE_COMMERCIAL_SAMPLE = 'COMMERCIAL_SAMPLE';
    const TYPE_DOCUMENT = 'DOCUMENT';
    const TYPE_RETURN_OF_GOODS = 'RETURN_OF_GOODS';

    /**
     * Find all shipping products that apply to the given shipping route.
     *
     * @param string   $originCountryId
     * @param string   $destCountryId
     * @param string[] $euCountries
     *
     * @return string[]
     */
    public function getApplicableTypes($originCountryId, $destCountryId, array $euCountries);
}

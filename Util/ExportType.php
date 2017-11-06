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

class ExportType implements ExportTypeInterface
{
    public function getApplicableTypes(
        $originCountryId,
        $destCountryId,
        array $euCountries
    ) {
        $types = [];
        if (($originCountryId === ShippingRoutes::COUNTRY_CODE_GERMANY
                || $originCountryId === ShippingRoutes::COUNTRY_CODE_AUSTRIA
            )
            && !in_array(
                $destCountryId,
                $euCountries
            )
        ) {
            $types = [
                self::TYPE_COMMERCIAL_SAMPLE => 'Commercial Sample',
                self::TYPE_DOCUMENT          => 'Document',
                self::TYPE_OTHER             => 'Other',
                self::TYPE_PRESENT           => 'Present',
                self::TYPE_RETURN_OF_GOODS   => 'Return of Goods',
            ];
        }

        return $types;
    }
}

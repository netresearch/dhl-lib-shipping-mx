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

namespace Dhl\Shipping\Webservice\RequestType\Generic\Package;

use Dhl\Shipping\Webservice\UnitConverterInterface;

/**
 * Platform independent package value.
 *
 * @category Dhl
 *
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 *
 * @link     http://www.netresearch.de/
 */
class MonetaryValue extends AbstractConvertibleValue implements MonetaryValueInterface
{
    /**
     * @var int
     */
    private $value;

    /**
     * @var string
     */
    private $currencyCode;

    /**
     * MonetaryValue constructor.
     *
     * @param UnitConverterInterface $unitConverter
     * @param int                    $value
     * @param string                 $currencyCode
     */
    public function __construct(UnitConverterInterface $unitConverter, $value, $currencyCode)
    {
        $this->value = $value;
        $this->currencyCode = $currencyCode;

        parent::__construct($unitConverter);
    }

    /**
     * @param string $currencyCode Three-letter ISO Currency code
     *
     * @return float
     */
    public function getValue($currencyCode)
    {
        $value = $this->unitConverter->convertMonetaryValue($this->value, $this->currencyCode, $currencyCode);

        return $value;
    }

    /**
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }
}

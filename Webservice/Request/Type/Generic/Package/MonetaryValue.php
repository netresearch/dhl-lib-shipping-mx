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
 * PHP version 7
 *
 * @category  Dhl
 * @package   Dhl\Versenden\Api
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Versenden\Webservice\Request\Type\Generic\Package;

use Dhl\Versenden\Api\Data\Webservice\Request\Type\Generic\Package\MonetaryValueInterface;

/**
 * Platform independent package value
 *
 * @category Dhl
 * @package  Dhl\Versenden\Api
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class MonetaryValue implements MonetaryValueInterface
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
     * @param int $value
     * @param string $currencyCode
     */
    public function __construct($value, $currencyCode)
    {
        $this->value = $value;
        $this->currencyCode = $currencyCode;
    }

    /**
     * @param string $currencyCode Three-letter ISO Currency code
     * @return float
     */
    public function getValue($currencyCode)
    {
        // TODO: convert to target currency.
        return $this->value;
    }
}

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
 * @author    Max Melzer <max.melzer@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 *
 * @link      http://www.netresearch.de/
 */

namespace Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrder\Service;

use Dhl\Shipping\Webservice\RequestType\Generic\Package\MonetaryValueInterface;

/**
 * Additional service: Insurance.
 *
 * @category Dhl
 *
 * @author    Max Melzer <max.melzer@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 *
 * @link     http://www.netresearch.de/
 */
class Insurance implements ServiceInterface
{
    /**
     * @var MonetaryValueInterface
     */
    private $insuranceAmount;

    /**
     * Insurance constructor.
     *
     * @param MonetaryValueInterface $insuranceAmount
     */
    public function __construct(MonetaryValueInterface $insuranceAmount)
    {
        $this->insuranceAmount = $insuranceAmount;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return true;
    }

    /**
     * @return MonetaryValueInterface
     */
    public function getInsuranceAmount()
    {
        return $this->insuranceAmount;
    }
}

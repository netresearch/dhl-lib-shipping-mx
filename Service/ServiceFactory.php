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

namespace Dhl\Shipping\Service;

/**
 * ServiceFactory.
 *
 * @category Dhl
 *
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 *
 * @link     http://www.netresearch.de/
 */
class ServiceFactory
{
    /**
     * @param string $code
     * @param string $value
     *
     * @return ServiceInterface|null
     */
    public static function get($code, $value)
    {
        switch ($code) {
            case BulkyGoods::CODE:
                return new BulkyGoods($value);
            case Cod::CODE:
                return new Cod($value);
            case Insurance::CODE:
                return new Insurance($value);
            case ParcelAnnouncement::CODE:
                return new ParcelAnnouncement($value);
            case PreferredDay::CODE:
                return new PreferredDay($value);
            case PreferredLocation::CODE:
                return new PreferredLocation($value);
            case PreferredNeighbour::CODE:
                return new PreferredNeighbour($value);
            case PreferredTime::CODE:
                return new PreferredTime($value);
            case PrintOnlyIfCodeable::CODE:
                return new PrintOnlyIfCodeable($value);
            case ReturnShipment::CODE:
                return new ReturnShipment($value);
            case VisualCheckOfAge::CODE:
                return new VisualCheckOfAge($value);
            default:
                return;
        }
    }
}

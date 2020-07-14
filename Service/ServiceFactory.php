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
 * @package   Dhl\Shipping
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2018 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Shipping\Service;

use Dhl\Shipping\Service\Bcs\BulkyGoods;
use Dhl\Shipping\Service\Bcs\Cod;
use Dhl\Shipping\Service\Bcs\Insurance;
use Dhl\Shipping\Service\Bcs\ParcelAnnouncement;
use Dhl\Shipping\Service\Bcs\PreferredDay;
use Dhl\Shipping\Service\Bcs\PreferredLocation;
use Dhl\Shipping\Service\Bcs\PreferredNeighbour;
use Dhl\Shipping\Service\Bcs\PreferredTime;
use Dhl\Shipping\Service\Bcs\PrintOnlyIfCodeable;
use Dhl\Shipping\Service\Bcs\ReturnShipment;
use Dhl\Shipping\Service\Bcs\VisualCheckOfAge;

/**
 * ServiceFactory
 *
 * @deprecated
 * @see      \Dhl\Shipping\Api\ServiceProviderInterface::getServices
 *
 * @package  Dhl\Shipping\Service
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class ServiceFactory
{
    /**
     * @param string $code
     * @param string $value
     *
     * @return AbstractService|null
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
                return null;
        }
    }
}

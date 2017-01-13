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
 * @package   Dhl\Versenden\Bcs\Api
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Versenden\Bcs\Api\Service;

/**
 * ServiceFactory
 *
 * @category Dhl
 * @package  Dhl\Versenden\Bcs\Api\Service
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class ServiceFactory
{
    /**
     * @param string $code
     * @return ServiceInterface|null
     */
    public static function get($code)
    {
        switch ($code) {
            case BulkyGoods::CODE:
                return new BulkyGoods(false, true, false);
            case Cod::CODE:
                return new Cod(true, false, false);
            case Insurance::CODE:
                return new Insurance(true, true, false);
            case ParcelAnnouncement::CODE:
                return new ParcelAnnouncement(true, true, true);
            case PreferredDay::CODE:
                return new PreferredDay(false, true, true);
            case PreferredLocation::CODE:
                return new PreferredLocation(false, true, true);
            case PreferredNeighbour::CODE:
                return new PreferredNeighbour(false, true, true);
            case PreferredTime::CODE:
                return new PreferredTime(false, true, true);
            case PrintOnlyIfCodeable::CODE:
                return new PrintOnlyIfCodeable(true, true, false);
            case ReturnShipment::CODE:
                return new ReturnShipment(true, true, false);
            case VisualCheckOfAge::CODE:
                return new VisualCheckOfAge(false, true, false);
            default:
                return null;
        }
    }

    /**
     * @return ServiceInterface[]
     */
    public static function getAll()
    {
        $availableCodes = [
            BulkyGoods::CODE,
            Cod::CODE,
            Insurance::CODE,
            ParcelAnnouncement::CODE,
            PreferredDay::CODE,
            PreferredLocation::CODE,
            PreferredNeighbour::CODE,
            PreferredTime::CODE,
            PrintOnlyIfCodeable::CODE,
            ReturnShipment::CODE,
            VisualCheckOfAge::CODE,
        ];

        $services = array_map(function ($code) {
            return static::get($code);
        }, $availableCodes);

        return array_combine($availableCodes, $services);
    }
}

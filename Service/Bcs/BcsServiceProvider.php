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

namespace Dhl\Shipping\Service\Bcs;

use Dhl\Shipping\Api\Data\Service\ServiceSettingsInterface;
use Dhl\Shipping\Api\Data\ServiceInterface;
use Dhl\Shipping\Api\ServicePoolInterface;
use Dhl\Shipping\Api\ServiceProviderInterface;
use Dhl\Shipping\Service\ServiceInputBuilder;

/**
 * DHL Business Customer Shipping Services Provider
 *
 * @package  Dhl\Shipping\Service
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @author   Paul  Siedler <paul.siedler@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class BcsServiceProvider implements ServiceProviderInterface
{

    private static $settingsClassMap = [
        ServicePoolInterface::SERVICE_COD_CODE => Cod::class,
        ServicePoolInterface::SERVICE_INSURANCE_CODE => Insurance::class,
        BulkyGoods::CODE => BulkyGoods::class,
        ParcelAnnouncement::CODE => ParcelAnnouncement::class,
        PreferredDay::CODE => PreferredDay::class,
        PreferredLocation::CODE => PreferredLocation::class,
        PreferredNeighbour::CODE => PreferredNeighbour::class,
        PreferredTime::CODE => PreferredTime::class,
        PrintOnlyIfCodeable::CODE => PrintOnlyIfCodeable::class,
        ReturnShipment::CODE => ReturnShipment::class,
        VisualCheckOfAge::CODE => VisualCheckOfAge::class,
    ];

    /**
     * @param string $serviceCode
     * @param ServiceInputBuilder $builder
     * @param ServiceSettingsInterface $config
     * @return ServiceInterface
     */
    private function createServiceClass($serviceCode, ServiceInputBuilder $builder, ServiceSettingsInterface $config)
    {
        $className = self::$settingsClassMap[$serviceCode];

        return new $className($config, $builder);
    }

    /**
     * Return a list of services based on given route, initialized with given presets.
     *
     * @param ServiceSettingsInterface[] $servicePresets
     * @return ServiceInterface[]
     */
    public function getServices(
        array $servicePresets = []
    ) {
        $inputBuilder = new ServiceInputBuilder();
        $services = [];

        foreach ($servicePresets as $serviceCode => $servicePreset) {
            if (array_key_exists($serviceCode, self::$settingsClassMap)) {
                $services[] = $this->createServiceClass($serviceCode, $inputBuilder, $servicePreset);
            }
        }

        return $services;
    }
}

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
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class BcsServiceProvider implements ServiceProviderInterface
{
    /**
     * @param ServiceInputBuilder $builder
     * @param ServiceSettingsInterface|null $config
     * @return ServiceInterface|BulkyGoods
     */
    private function getBulkyGoodsService(
        ServiceInputBuilder $builder,
        ServiceSettingsInterface $config = null
    ) {
        return new BulkyGoods($config, $builder);
    }

    /**
     * @param ServiceInputBuilder $builder
     * @param ServiceSettingsInterface|null $config
     * @return ServiceInterface|Cod
     */
    private function getCodService(
        ServiceInputBuilder $builder,
        ServiceSettingsInterface $config = null
    ) {
        return new Cod($config, $builder);
    }

    /**
     * @param ServiceInputBuilder $builder
     * @param ServiceSettingsInterface|null $config
     * @return ServiceInterface|Insurance
     */
    private function getInsuranceService(
        ServiceInputBuilder $builder,
        ServiceSettingsInterface $config = null
    ) {
        return new Insurance($config, $builder);
    }

    /**
     * @param ServiceInputBuilder $builder
     * @param ServiceSettingsInterface|null $config
     * @return ServiceInterface|ParcelAnnouncement
     */
    private function getParcelAnnouncementService(
        ServiceInputBuilder $builder,
        ServiceSettingsInterface $config = null
    ) {
        return new ParcelAnnouncement($config, $builder);
    }

    /**
     * @param ServiceInputBuilder $builder
     * @param ServiceSettingsInterface|null $config
     * @return ServiceInterface|PreferredDay
     */
    private function getPreferredDayService(
        ServiceInputBuilder $builder,
        ServiceSettingsInterface $config = null
    ) {
        return new PreferredDay($config, $builder);
    }

    /**
     * @param ServiceInputBuilder $builder
     * @param ServiceSettingsInterface|null $config
     * @return ServiceInterface|PreferredLocation
     */
    private function getPreferredLocationService(
        ServiceInputBuilder $builder,
        ServiceSettingsInterface $config = null
    ) {
        return new PreferredLocation($config, $builder);
    }

    /**
     * @param ServiceInputBuilder $builder
     * @param ServiceSettingsInterface|null $config
     * @return ServiceInterface|PreferredNeighbour
     */
    private function getPreferredNeighbourService(
        ServiceInputBuilder $builder,
        ServiceSettingsInterface $config = null
    ) {
        return new PreferredNeighbour($config, $builder);
    }

    /**
     * @param ServiceInputBuilder $builder
     * @param ServiceSettingsInterface|null $config
     * @return ServiceInterface|PreferredTime
     */
    private function getPreferredTimeService(
        ServiceInputBuilder $builder,
        ServiceSettingsInterface $config = null
    ) {
        return new PreferredTime($config, $builder);
    }

    /**
     * @param ServiceInputBuilder $builder
     * @param ServiceSettingsInterface|null $config
     * @return ServiceInterface|PrintOnlyIfCodeable
     */
    private function getPrintOnlyIfCodeableService(
        ServiceInputBuilder $builder,
        ServiceSettingsInterface $config = null
    ) {
        return new PrintOnlyIfCodeable($config, $builder);
    }

    /**
     * @param ServiceInputBuilder $builder
     * @param ServiceSettingsInterface|null $config
     * @return ServiceInterface|ReturnShipment
     */
    private function getReturnShipmentService(
        ServiceInputBuilder $builder,
        ServiceSettingsInterface $config = null
    ) {
        return new ReturnShipment($config, $builder);
    }

    /**
     * @param ServiceInputBuilder $builder
     * @param ServiceSettingsInterface|null $config
     * @return ServiceInterface|VisualCheckOfAge
     */
    private function getVisualCheckOfAgeService(
        ServiceInputBuilder $builder,
        ServiceSettingsInterface $config = null
    ) {
        return new VisualCheckOfAge($config, $builder);
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

        $serviceSettings = isset($servicePresets[BulkyGoods::CODE]) ? $servicePresets[BulkyGoods::CODE] : null;
        $bulkyGoodsService = $this->getBulkyGoodsService($inputBuilder, $serviceSettings);

        $serviceSettings = isset($servicePresets[ServicePoolInterface::SERVICE_COD_CODE]) ? $servicePresets[ServicePoolInterface::SERVICE_COD_CODE] : null;
        $codService = $this->getCodService($inputBuilder, $serviceSettings);

        $serviceSettings = isset($servicePresets[ServicePoolInterface::SERVICE_INSURANCE_CODE]) ? $servicePresets[ServicePoolInterface::SERVICE_INSURANCE_CODE] : null;
        $insuranceService = $this->getInsuranceService($inputBuilder, $serviceSettings);

        $serviceSettings = isset($servicePresets[ParcelAnnouncement::CODE]) ? $servicePresets[ParcelAnnouncement::CODE] : null;
        $parcelAnnouncementService = $this->getParcelAnnouncementService($inputBuilder, $serviceSettings);

        $serviceSettings = isset($servicePresets[PreferredDay::CODE]) ? $servicePresets[PreferredDay::CODE] : null;
        $preferredDayService = $this->getPreferredDayService($inputBuilder, $serviceSettings);

        $serviceSettings = isset($servicePresets[PreferredLocation::CODE]) ? $servicePresets[PreferredLocation::CODE] : null;
        $preferredLocationService = $this->getPreferredLocationService($inputBuilder, $serviceSettings);

        $serviceSettings = isset($servicePresets[PreferredNeighbour::CODE]) ? $servicePresets[PreferredNeighbour::CODE] : null;
        $preferredNeighbourService = $this->getPreferredNeighbourService($inputBuilder, $serviceSettings);

        $serviceSettings = isset($servicePresets[PreferredTime::CODE]) ? $servicePresets[PreferredTime::CODE] : null;
        $preferredTimeService = $this->getPreferredTimeService($inputBuilder, $serviceSettings);

        $serviceSettings = isset($servicePresets[PrintOnlyIfCodeable::CODE]) ? $servicePresets[PrintOnlyIfCodeable::CODE] : null;
        $printOnlyIfCodeableService = $this->getPrintOnlyIfCodeableService($inputBuilder, $serviceSettings);

        $serviceSettings = isset($servicePresets[ReturnShipment::CODE]) ? $servicePresets[ReturnShipment::CODE] : null;
        $returnShipmentService = $this->getReturnShipmentService($inputBuilder, $serviceSettings);

        $serviceSettings = isset($servicePresets[VisualCheckOfAge::CODE]) ? $servicePresets[VisualCheckOfAge::CODE] : null;
        $visualCheckOfAgeService = $this->getVisualCheckOfAgeService($inputBuilder, $serviceSettings);

        return [
            $bulkyGoodsService,
            $codService,
            $insuranceService,
            $parcelAnnouncementService,
            $preferredDayService,
            $preferredLocationService,
            $preferredNeighbourService,
            $preferredTimeService,
            $printOnlyIfCodeableService,
            $returnShipmentService,
            $visualCheckOfAgeService,
        ];
    }
}

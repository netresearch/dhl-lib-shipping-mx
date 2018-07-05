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

namespace Dhl\Shipping\Service\Gla;

use Dhl\Shipping\Api\Data\Service\ServiceSettingsInterface;
use Dhl\Shipping\Api\Data\ServiceInterface;
use Dhl\Shipping\Api\ServicePoolInterface;
use Dhl\Shipping\Api\ServiceProviderInterface;
use Dhl\Shipping\Service\ServiceInputBuilder;

/**
 * DHL Business Customer Shipping Services Provider
 *
 * @package  Dhl\Shipping\Service
 * @author   Paul Siedler <paul.siedler@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class GlaServiceProvider implements ServiceProviderInterface
{
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
     * Return a list of services based on given route, initialized with given presets.
     *
     * @param ServiceSettingsInterface[] $servicePresets
     * @return ServiceInterface[]
     */
    public function getServices(
        array $servicePresets = []
    ) {
        $inputBuilder = new ServiceInputBuilder();

        $serviceSettings = isset($servicePresets[ServicePoolInterface::SERVICE_COD_CODE]) ? $servicePresets[ServicePoolInterface::SERVICE_COD_CODE] : null;
        $codService = $this->getCodService($inputBuilder, $serviceSettings);

        $serviceSettings = isset($servicePresets[ServicePoolInterface::SERVICE_INSURANCE_CODE]) ? $servicePresets[ServicePoolInterface::SERVICE_INSURANCE_CODE] : null;
        $insuranceService = $this->getInsuranceService($inputBuilder, $serviceSettings);


        return [
            $codService,
            $insuranceService,
        ];
    }
}

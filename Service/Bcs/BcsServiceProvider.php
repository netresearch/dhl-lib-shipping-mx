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

use Dhl\Shipping\Api\Data\Service\ConfigInterface;
use Dhl\Shipping\Api\Data\ServiceInterface;
use Dhl\Shipping\Api\ServiceProviderInterface;

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
     * @param ConfigInterface|null $config
     * @return ServiceInterface|BulkyGoods
     */
    private function getBulkyGoodsService(ConfigInterface $config = null)
    {
        return new BulkyGoods($config);
    }

    /**
     * @param ConfigInterface|null $config
     * @return ServiceInterface|Cod
     */
    private function getCodService(ConfigInterface $config = null)
    {
        return new Cod($config);
    }

    /**
     * @param ConfigInterface[] $servicePresets
     * @return ServiceInterface[]
     */
    public function getServices(array $servicePresets = [])
    {
        $bulkyGoodsConfig = isset($servicePresets[BulkyGoods::CODE]) ? $servicePresets[BulkyGoods::CODE] : null;
        $bulkyGoodsService = $this->getBulkyGoodsService($bulkyGoodsConfig);

        $codConfig = isset($servicePresets[Cod::CODE]) ? $servicePresets[Cod::CODE] : null;
        $codService = $this->getCodService($codConfig);

        return [
            $bulkyGoodsService,
            $codService,
        ];
    }
}

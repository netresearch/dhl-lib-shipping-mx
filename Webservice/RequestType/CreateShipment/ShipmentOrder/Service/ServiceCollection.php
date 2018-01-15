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
 * @package   Dhl\Shipping\Webservice
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2018 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */

namespace Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrder\Service;

/**
 * Generic service factory
 *
 * @package  Dhl\Shipping\Webservice
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class ServiceCollection extends \ArrayIterator implements ServiceCollectionInterface
{
    /**
     * @var AbstractServiceFactory
     */
    private $serviceFactory;

    /**
     * Construct an ArrayIterator
     * @param AbstractServiceFactory $serviceFactory
     * @param array $labels The array or object to be iterated on.
     * @param int $flags Flags to control the behaviour of the ArrayObject object.
     */
    public function __construct(AbstractServiceFactory $serviceFactory, array $labels = [], $flags = 0)
    {
        $this->serviceFactory = $serviceFactory;

        parent::__construct($labels, $flags);
    }

    /**
     * @param string $serviceCode
     * @param ServiceInterface $service
     * @return $this
     */
    private function setService($serviceCode, ServiceInterface $service)
    {
        $this->offsetSet($serviceCode, $service);

        return $this;
    }

    /**
     * @param string $serviceCode
     * @param mixed[] $data
     * @return $this
     */
    public function addService($serviceCode, array $data = [])
    {
        $service = $this->serviceFactory->create($serviceCode, $data);
        $this->setService($serviceCode, $service);

        return $this;
    }

    /**
     * @param $serviceCode
     * @return ServiceInterface|null
     */
    public function getService($serviceCode)
    {
        if (!$this->offsetExists($serviceCode)) {
            return null;
        }

        return $this->offsetGet($serviceCode);
    }
}

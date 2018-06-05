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
 * @author    Max Melzer <max.melzer@netresearch.de>
 * @copyright 2018 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Shipping\Service;

use Dhl\Shipping\Api\Data\Service\ServiceInputInterface;
use Dhl\Shipping\Api\Data\Service\ServiceSettingsInterface;
use Dhl\Shipping\Api\Data\ServiceInterface;
use Dhl\Shipping\Service\ServiceInputBuilder;

/**
 * DHL Abstract service
 *
 * @package  Dhl\Shipping\Service
 * @author   Max Melzer <max.melzer@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
abstract class AbstractService implements ServiceInterface
{
    const CODE = '';

    /**
     * @var bool
     */
    protected $postalFacilitySupport;

    /**
     * Service can be booked on these routes.
     *
     * @var string[][]
     */
    protected $routes;

    /**
     * @var ServiceInputInterface[]
     */
    protected $inputs;

    /**
     * Initial service settings
     *
     * @var ServiceSettingsInterface
     */
    protected $serviceConfig;

    /**
     * @var ServiceInputBuilder
     */
    protected $serviceInputBuilder;

    /**
     * Service constructor.
     *
     * @param ServiceSettingsInterface $serviceConfig
     * @param ServiceInputBuilder $serviceInputBuilder
     */
    public function __construct(
        ServiceSettingsInterface $serviceConfig,
        ServiceInputBuilder $serviceInputBuilder
    ) {
        $this->serviceConfig = $serviceConfig;
        $this->serviceInputBuilder = $serviceInputBuilder;
    }

    /**
     * Uses serviceInputBuilder create custom ServiceInput array.
     *
     * @return ServiceInputInterface[]
     */
    /**
     * @return ServiceInputInterface[]
     */
    protected function createInputs()
    {
        $this->serviceInputBuilder->setCode('enabled');
        $this->serviceInputBuilder->setInputType(ServiceInputInterface::INPUT_TYPE_CHECKBOX);
        $this->serviceInputBuilder->setLabel(__($this->getName()));

        return [$this->serviceInputBuilder->create()];
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return get_class($this)::CODE;
    }

    /**
     * Obtain service name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->serviceConfig->getName();
    }

    /**
     * @return ServiceInputInterface[]
     */
    public function getInputs()
    {
        if ($this->inputs === null) {
            $this->inputs = $this->createInputs();
        }
        return $this->inputs;
    }

    /**
     * @return string[]
     */
    public function getInputValues()
    {
        $result = [];
        foreach ($this->inputs as $input) {
            $result[$input->getCode()] = $input->getValue();
        }

        return $result;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->serviceConfig->isEnabled();
    }

    /**
     * @return bool
     */
    public function isCustomerService()
    {
        return $this->serviceConfig->isCustomerService();
    }

    /**
     * @return bool
     */
    public function isMerchantService()
    {
        return $this->serviceConfig->isMerchantService();
    }

    /**
     * @return bool
     */
    public function isSelected()
    {
        return $this->serviceConfig->isSelected();
    }

    /**
     * Check if the service can be booked with postal facility deliveries.
     *
     * @return bool
     */
    public function isAvailableAtPostalFacility()
    {
        return $this->postalFacilitySupport;
    }

    /**
     * Obtain routes the service can be booked with.
     *
     * @return string[][]
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * Get Sort Order.
     *
     * @return int
     */
    public function getSortOrder()
    {
        return $this->serviceConfig->getSortOrder();
    }
}

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
use Zend\InputFilter\InputInterface;

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
    protected function createInputs(): array
    {
        $this->serviceInputBuilder->setCode('enabled');
        $this->serviceInputBuilder->setInputType(ServiceInputInterface::INPUT_TYPE_CHECKBOX);
        $this->serviceInputBuilder->setLabel(__($this->getName()));

        return [$this->serviceInputBuilder->create()];
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return static::CODE;
    }

    /**
     * Obtain service name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->serviceConfig->getName();
    }

    /**
     * @return ServiceInputInterface[]
     */
    public function getInputs(): array
    {
        if ($this->inputs === null) {
            $this->inputs = $this->createInputs();
        }
        return $this->inputs;
    }

    /**
     * @return string[]
     */
    public function getInputValues(): array
    {
        $result = [];
        foreach ($this->getInputs() as $input) {
            $result[$input->getCode()] = $input->getValue();
        }

        return $result;
    }

    /**
     * @param string[] $values
     */
    public function setInputValues($values)
    {
        foreach ($values as $code => $value) {
            array_map(function (ServiceInputInterface $input) use ($code, $value) {
                if ($input->getCode() === $code) {
                    $input->setValue($value);
                }
            }, $this->getInputs());
        }
    }


    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->serviceConfig->isEnabled();
    }

    /**
     * @return bool
     */
    public function isCustomerService(): bool
    {
        return $this->serviceConfig->isCustomerService();
    }

    /**
     * @return bool
     */
    public function isMerchantService(): bool
    {
        return $this->serviceConfig->isMerchantService();
    }

    /**
     * @return bool
     */
    public function isSelected(): bool
    {
        return $this->serviceConfig->isSelected();
    }

    /**
     * Check if the service can be booked with postal facility deliveries.
     *
     * @return bool
     */
    public function isAvailableAtPostalFacility(): bool
    {
        return $this->postalFacilitySupport;
    }

    /**
     * Obtain routes the service can be booked with.
     *
     * @return string[][]
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }

    /**
     * Get Sort Order.
     *
     * @return int
     */
    public function getSortOrder(): int
    {
        return $this->serviceConfig->getSortOrder();
    }
}

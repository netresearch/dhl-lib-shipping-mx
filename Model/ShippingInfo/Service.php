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
 * @package   Dhl\Shipping\Model
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2018 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Shipping\Model\ShippingInfo;

use Dhl\Shipping\Api\Data\ShippingInfo\ServiceInterface;
use Dhl\Shipping\Api\Data\ShippingInfo\Service\ServicePropertyInterface;
use Magento\Sales\Api\Data\ShipmentInterface;

/**
 * Service
 *
 * @package  Dhl\Shipping\Model
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class Service implements ServiceInterface, \JsonSerializable
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var bool
     */
    private $isActive;

    /**
     * @var ServicePropertyInterface[]
     */
    private $properties;

    /**
     * Service constructor.
     * @param string $code
     * @param bool $isActive
     * @param ServicePropertyInterface[] $properties
     */
    public function __construct($code, $isActive, array $properties = [])
    {
        $this->code = $code;
        $this->isActive = $isActive;
        $this->properties = $properties;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return bool
     */
    public function isActive()
    {
        return $this->isActive;
    }

    /**
     * @return ServicePropertyInterface[]
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * @return string[]
     */
    public function jsonSerialize()
    {
        $properties = [];
        foreach ($this->properties as $property) {
            $properties[$property->getKey()] = $property->getValue();
        }

        $service = [
            ServiceInterface::CODE => $this->code,
            ServiceInterface::IS_ACTIVE => $this->isActive,
            ServiceInterface::PROPERTIES => $properties,
        ];

        return $service;
    }
}

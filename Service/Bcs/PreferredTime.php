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

/**
 * DHL Business Customer Shipping Preferred Time Service
 *
 * @package  Dhl\Shipping\Service
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class PreferredTime implements ServiceInterface
{
    const CODE = 'preferredTime';

    const PROPERTY_TIME = 'time';

    /**
     * @var ConfigInterface
     */
    private $serviceConfig;

    /**
     * Cod constructor.
     * @param ConfigInterface $serviceConfig
     */
    public function __construct(ConfigInterface $serviceConfig)
    {
        $this->serviceConfig = $serviceConfig;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return self::CODE;
    }

    /**
     * @return string
     */
    public function getInputType()
    {
        return self::INPUT_TYPE_TIME;
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
     * @return string
     */
    public function getTime()
    {
        $properties = $this->serviceConfig->getProperties();
        if (isset($properties[self::PROPERTY_TIME])) {
            return $properties[self::PROPERTY_TIME];
        }

        return '';
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->serviceConfig->getOptions();
    }
}

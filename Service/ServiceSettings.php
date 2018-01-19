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
namespace Dhl\Shipping\Service;

use Dhl\Shipping\Api\Data\Service\ServiceSettingsInterface;

/**
 * ServiceSettings
 *
 * @package  Dhl\Shipping\Service
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class ServiceSettings implements ServiceSettingsInterface
{
    /**
     * @var bool
     */
    private $isEnabled;

    /**
     * @var bool
     */
    private $isCustomerService;

    /**
     * @var bool
     */
    private $isMerchantService;

    /**
     * @var bool
     */
    private $isSelected;

    /**
     * @var mixed[]
     */
    private $properties;

    /**
     * @var string[]
     */
    private $options;

    /**
     * ServiceSettings constructor.
     * @param bool $isEnabled
     * @param bool $isCustomerService
     * @param bool $isMerchantService
     * @param bool $isSelected
     * @param \mixed[] $properties
     * @param \string[] $options
     */
    public function __construct(
        $isEnabled,
        $isCustomerService,
        $isMerchantService,
        $isSelected,
        array $properties = [],
        array $options = []
    ) {
        $this->isEnabled = $isEnabled;
        $this->isCustomerService = $isCustomerService;
        $this->isMerchantService = $isMerchantService;
        $this->isSelected = $isSelected;
        $this->properties = $properties;
        $this->options = $options;
    }

    /**
     * Check if service is enabled for display.
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->isEnabled;
    }

    /**
     * Check if service can be selected by customer.
     *
     * @return bool
     */
    public function isCustomerService()
    {
        return $this->isCustomerService;
    }

    /**
     * Check if service can be selected by merchant.
     *
     * @return bool
     */
    public function isMerchantService()
    {
        return $this->isMerchantService;
    }

    /**
     * Check if service was selected by customer or merchant.
     *
     * @return bool
     */
    public function isSelected()
    {
        return $this->isSelected;
    }

    /**
     * Service arguments, e.g.
     * - Insurance: amount
     * - Cash On Delivery: amount, add fee flag
     *
     * @return mixed[]
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * Available service options, e.g.
     * - Preferred Day: next X working days
     * - Visual Check of Age: A16, A18
     *
     * @return string[]
     */
    public function getOptions()
    {
        return $this->options;
    }
}

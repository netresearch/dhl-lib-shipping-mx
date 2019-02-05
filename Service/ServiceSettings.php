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
     * @var string
     */
    private $name;

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
     * @var int
     */
    private $sortOrder;

    /**
     * @var string
     */
    private $infoText;

    /**
     * @var string
     */
    private $tooltip;

    /**
     * @var bool
     */
    private $hasAsterisk;

    /**
     * ServiceSettings constructor.
     *
     * @param string   $name
     * @param bool     $isEnabled
     * @param bool     $isCustomerService
     * @param bool     $isMerchantService
     * @param bool     $isSelected
     * @param int      $sortOrder
     * @param mixed[]  $properties
     * @param string[] $options
     * @param string[] $validationRules
     * @param string   $infoText
     * @param string   $tooltip
     * @param bool     $hasAsterisk
     */
    public function __construct(
        $name,
        $isEnabled,
        $isCustomerService,
        $isMerchantService,
        $isSelected,
        $sortOrder,
        array $properties = [],
        array $options = [],
        array $validationRules = [],
        $infoText = '',
        $tooltip = '',
        $hasAsterisk = false
    ) {
        $this->name = $name;
        $this->isEnabled = $isEnabled;
        $this->isCustomerService = $isCustomerService;
        $this->isMerchantService = $isMerchantService;
        $this->isSelected = $isSelected;
        $this->sortOrder = $sortOrder;
        $this->properties = $properties;
        $this->options = $options;
        $this->infoText = $infoText;
        $this->tooltip = $tooltip;
        $this->hasAsterisk = $hasAsterisk;
    }

    /**
     * Get service display name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
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

    /**
     * Get Sort Order.
     *
     * @return int
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * Getinfo text eg. text with fee hint.
     *
     * @return string
     */
    public function getInfoText()
    {
        return $this->infoText;
    }

    /**
     * @return string
     */
    public function getTooltip()
    {
        return $this->tooltip;
    }

    /**
     * @return bool
     */
    public function hasAsterisk()
    {
        return $this->hasAsterisk;
    }
}

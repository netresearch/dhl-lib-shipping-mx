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
 * @package   Dhl\Shipping\Api
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2018 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Shipping\Api\Data\Service;

/**
 * ServiceSettingsInterface
 *
 * @package  Dhl\Shipping\Api
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
interface ServiceSettingsInterface
{
    const NAME                = 'name';
    const IS_ENABLED          = 'isEnabled';
    const IS_CUSTOMER_SERVICE = 'isCustomerService';
    const IS_MERCHANT_SERVICE = 'isMerchantService';
    const IS_SELECTED = 'isSelected';
    const PROPERTIES = 'properties';
    const OPTIONS = 'options';
    const SORT_ORDER = 'sortOrder';
    const INFO_TEXT = 'infoText';
    const TOOLTIP = 'tooltip';

    /**
     * Get service display name.
     *
     * @return string
     */
    public function getName();

    /**
     * Check if service is enabled for display.
     *
     * @return bool
     */
    public function isEnabled();

    /**
     * Check if service can be selected by customer.
     *
     * @return bool
     */
    public function isCustomerService();

    /**
     * Check if service can be selected by merchant.
     *
     * @return bool
     */
    public function isMerchantService();

    /**
     * Check if service was selected by customer or merchant.
     *
     * @return bool
     */
    public function isSelected();

    /**
     * Service arguments, e.g.
     * - Insurance: amount
     * - Cash On Delivery: amount, add fee flag
     *
     * @return mixed[]
     */
    public function getProperties();

    /**
     * Available service options, e.g.
     * - Preferred Day: next X working days
     * - Visual Check of Age: A16, A18
     *
     * @return string[]
     */
    public function getOptions();

    /**
     * Get Sort Order.
     *
     * @return int
     */
    public function getSortOrder();

    /**
     * Getinfo text eg. text with fee hint.
     *
     * @return string
     */
    public function getInfoText();

    /**
     * @return string
     */
    public function getTooltip();
}

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
 * ConfigInterface
 *
 * @package  Dhl\Shipping\Api
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
interface ConfigInterface
{
    const IS_CUSTOMER_SERVICE = 'is_customer_service';
    const IS_MERCHANT_SERVICE = 'is_merchant_service';
    const IS_SELECTED = 'is_selected';
    const PROPERTIES = 'properties';
    const OPTIONS = 'options';

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
     * @return string[]
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
}

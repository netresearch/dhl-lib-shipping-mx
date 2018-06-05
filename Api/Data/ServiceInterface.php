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
namespace Dhl\Shipping\Api\Data;

use Dhl\Shipping\Api\Data\Service\ServiceInputInterface;

/**
 * ServiceInterface
 *
 * @package  Dhl\Shipping\Api
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @author   Max Melzer <max.melzer@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
interface ServiceInterface
{
    /**
     * Obtain service code.
     *
     * @return string
     */
    public function getCode();

    /**
     * Obtain service name.
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
     * Obtain the value of a selected service.
     * Will be key-value-array containing all service input codes and values
     *
     * @return string[]
     */
    public function getInputValues();

    /**
     * Obtain a list of inputs for displaying the service and it's values
     *
     * @return ServiceInputInterface[]
     */
    public function getInputs();

    /**
     * Check if the service can be booked with postal facility deliveries.
     *
     * @return bool
     */
    public function isAvailableAtPostalFacility();

    /**
     * Obtain routes the service can be booked with.
     *
     * @return string[][]
     */
    public function getRoutes();

    /**
     * @return int
     */
    public function getSortOrder();
}

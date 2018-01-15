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
 * @author    Sebastian Ertner <sebastian.ertner@netresearch.de>
 * @copyright 2018 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Shipping\Config;

/**
 * GlConfigInterface
 *
 * @package  Dhl\Shipping
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @author   Sebastian Ertner <sebastian.ertner@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
interface GlConfigInterface
{
    const CONFIG_XML_PATH_PICKUP_NUMBER       = 'carriers/dhlshipping/gl_pickup_number';
    const CONFIG_XML_PATH_CUSTOMER_PREFIX     = 'carriers/dhlshipping/gl_customer_prefix';
    const CONFIG_XML_PATH_DISTRIBUTION_CENTER = 'carriers/dhlshipping/gl_distribution_center';
    const CONFIG_XML_PATH_CONSIGNMENT_SUFFIX  = 'carriers/dhlshipping/shipment_consignment_number';

    const CONFIG_XML_PATH_ENDPOINT      = 'carriers/dhlshipping/gl_api_endpoint';
    const CONFIG_XML_PATH_AUTH_USERNAME = 'carriers/dhlshipping/gl_api_auth_username';
    const CONFIG_XML_PATH_AUTH_PASSWORD = 'carriers/dhlshipping/gl_api_auth_password';
    const CONFIG_XML_PATH_AUTH_TOKEN    = 'carriers/dhlshipping/gl_api_auth_token';

    const CONFIG_XML_PATH_SANDBOX_ENDPOINT = 'carriers/dhlshipping/gl_sandbox_api_endpoint';
    const CONFIG_XML_PATH_LABEL_SIZE      = 'carriers/dhlshipping/gl_label_size';
    const CONFIG_XML_PATH_PAGE_SIZE       = 'carriers/dhlshipping/gl_page_size';
    const CONFIG_XML_PATH_PAGE_LAYOUT     = 'carriers/dhlshipping/gl_page_layout';

    const LABEL_SIZE_4X6    = '4x6';
    const LABEL_SIZE_4X4    = '4x4';
    const PAGE_SIZE_A4      = 'A4';
    const PAGE_SIZE_400X400 = '400x400';
    const PAGE_SIZE_400X600 = '400x600';
    const PAGE_LAYOUT_1X1   = '1x1';
    const PAGE_LAYOUT_4X1   = '4x1';

    /**
     * @param mixed $store
     * @return string
     */
    public function getPickupAccountNumber($store = null);

    /**
     * @param mixed $store
     * @return string
     */
    public function getCustomerPrefix($store = null);

    /**
     * @param mixed $store
     * @return string
     */
    public function getDistributionCenter($store = null);

    /**
     * @param mixed $store
     * @return string
     */
    public function getLabelSize($store = null);

    /**
     * @param mixed $store
     * @return string
     */
    public function getPageSize($store = null);

    /**
     * @param mixed $store
     * @return string
     */
    public function getPageLayout($store = null);

    /**
     * Obtain API endpoint.
     *
     * @param mixed $store
     * @return string
     */
    public function getApiEndpoint($store = null);

    /**
     * Obtain auth credentials: username.
     *
     * @param mixed $store
     * @return string
     */
    public function getAuthUsername($store = null);

    /**
     * Obtain auth credentials: password.
     *
     * @param mixed $store
     * @return string
     */
    public function getAuthPassword($store = null);

    /**
     * @param mixed $store
     * @return mixed
     */
    public function getAuthToken($store = null);

    /**
     * @param string $token
     * @param mixed $store
     * @return void
     */
    public function saveAuthToken($token, $store = null);

    /**
     * Get consignment number config.
     *
     * @param int|null $store
     * @return string
     */
    public function getConsignmentNumber($store = null);

    /**
     * Increment consignment number by one.
     */
    public function incrementConsignmentNumber();
}

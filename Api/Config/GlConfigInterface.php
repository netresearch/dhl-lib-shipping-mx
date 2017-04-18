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
 * @category  Dhl
 * @package   Dhl\Shipping
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @author    Sebastian Ertner <sebastian.ertner@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Shipping\Api\Config;

/**
 * GlConfigInterface
 *
 * @category Dhl
 * @package  Dhl\Shipping
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @author   Sebastian Ertner <sebastian.ertner@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
interface GlConfigInterface
{
    const CONFIG_XML_PATH_PICKUP_NUMBER_SANDBOX = 'carriers/dhlshipping/gl_sandbox_pickup_number';
    const CONFIG_XML_PATH_PICKUP_NUMBER         = 'carriers/dhlshipping/gl_pickup_number';

    const CONFIG_XML_PATH_ENDPOINT      = 'carriers/dhlshipping/gl_api_endpoint';
    const CONFIG_XML_PATH_AUTH_USERNAME = 'carriers/dhlshipping/gl_api_auth_username';
    const CONFIG_XML_PATH_AUTH_PASSWORD = 'carriers/dhlshipping/gl_api_auth_password';

    const CONFIG_XML_PATH_SANDBOX_ENDPOINT      = 'carriers/dhlshipping/gl_sandbox_api_endpoint';
    const CONFIG_XML_PATH_SANDBOX_AUTH_USERNAME = 'carriers/dhlshipping/gl_sandbox_api_auth_username';
    const CONFIG_XML_PATH_SANDBOX_AUTH_PASSWORD = 'carriers/dhlshipping/gl_sandbox_api_auth_password';

<<<<<<< Updated upstream
    const LABEL_SIZE_4X6    = '4x6';
    const LABEL_SIZE_4X4    = '4x4';
    const PAGE_LAYOUT_1X1   = '1x1';
    const PAGE_LAYOUT_4X1   = '4x1';
    const PAGE_SIZE_A4      = 'A4';
    const PAGE_SIZE_400X400 = '400x400';
    const PAGE_SIZE_400X600 = '400x600';
    const PRODUCT_PKG       = 'PKG';
    const PRODUCT_PPS       = 'PPS';
    const PRODUCT_PPM       = 'PPM';
    const PRODUCT_PLD       = 'PLD';
    const PRODUCT_PKD       = 'PKD';
    const PRODUCT_PLE       = 'PLE';
    const PRODUCT_PLT       = 'PLT';
    const PRODUCT_PKM       = 'PKM';
=======
    const CONFIG_XML_PATH_LABEL_SIZE = 'carriers/dhlshipping/label_size';
    const LABEL_SIZE_4X6    = 0;
    const LABEL_SIZE_4X4    = 1;

    const CONFIG_XML_PATH_PAGE_LAYOUT = 'carriers/dhlshipping/page_layout';
    const PAGE_LAYOUT_1X1   = 0;
    const PAGE_LAYOUT_4X1   = 1;

    const CONFIG_XML_PATH_PAGE_SIZE = 'carriers/dhlshipping/page_size';
    const PAGE_SIZE_A4      = 0;
    const PAGE_SIZE_400X400 = 1;
    const PAGE_SIZE_400X600 = 2;

    const CONFIG_XML_PATH_DEFAULT_PRODUCT = 'carriers/dhlshipping/default_product';
    const PRODUCT_PKG       = 0;
    const PRODUCT_PPS       = 1;
    const PRODUCT_PPM       = 2;
    const PRODUCT_PLD       = 3;
    const PRODUCT_PKD       = 4;
    const PRODUCT_PLE       = 5;
    const PRODUCT_PLT       = 6;
    const PRODUCT_PKM       = 7;
>>>>>>> Stashed changes

    /**
     * @param mixed $store
     * @return string
     */
    public function getPickupAccountNumber($store = null);

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
}

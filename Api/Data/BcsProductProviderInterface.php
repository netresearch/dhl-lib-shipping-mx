<?php
/**
 * Dhl Versenden
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
 * PHP version 5
 *
 * @category  Dhl
 * @package   Dhl\Versenden\Api\Data
 * @author    Benjamin Heuer <benjamin.heuer@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Versenden\Api\Data;

/**
 * InfoInterface
 *
 * @category Dhl
 * @package  Dhl\Versenden\Api\Data
 * @author   Benjamin Heuer <benjamin.heuer@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
interface BcsProductProviderInterface
{
    /**
     * Get the product name for shipment request
     *
     * @return string
     */
    public function getProductName();

    /**
     * Get the account number for shipment request
     *
     * @return string
     */
    public function getAccountNumber();

    /**
     * Get the return account number for shipment request
     *
     * @return string
     */
    public function getReturnShipmentAccountNumber();
}

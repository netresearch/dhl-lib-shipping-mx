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
 * @package   Dhl\Shipping\Api\Data
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Shipping\Api\Data\ShippingInfo;

use \Dhl\Shipping\Api\Data\ShippingInfo\Service\ServicePropertyInterface;

/**
 * ServiceInterface
 *
 * @category Dhl
 * @package  Dhl\Shipping\Api\Data
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
interface ServiceInterface
{
    const CODE = 'code';
    const IS_ACTIVE = 'is_active';
    const PROPERTIES = 'properties';

    /**
     * Obtain service code.
     *
     * @return string
     */
    public function getCode();

    /**
     * Check if service was selected.
     *
     * @return bool
     */
    public function isActive();

    /**
     * Obtain selected service value.
     *
     * @return ServicePropertyInterface[]
     */
    public function getProperties();
}

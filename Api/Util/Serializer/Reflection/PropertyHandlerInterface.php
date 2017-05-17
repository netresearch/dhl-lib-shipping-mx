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
 * @package   Dhl\Shipping\Util\Serializer
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Shipping\Api\Util\Serializer\Reflection;

/**
 * Property Handler
 *
 * @category Dhl
 * @package  Dhl\Shipping\Util\Serializer
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
interface PropertyHandlerInterface
{
    /**
     * Convert snake case to UpperCamelCase.
     *
     * @param string $key
     * @return string
     */
    public function camelizeUp($key);

    /**
     * Convert snake case to lowerCamelCase.
     *
     * @param string $key
     * @return string
     */
    public function camelizeLow($key);

    /**
     * Convert Capitalized, UpperCamelCase or lowerCamelCase to snake case.
     *
     * @param string $key
     * @return string
     */
    public function underscore($key);

    /**
     * @param string $key
     * @return string
     */
    public function getter($key);

    /**
     * @param string $key
     * @return string
     */
    public function setter($key);
}

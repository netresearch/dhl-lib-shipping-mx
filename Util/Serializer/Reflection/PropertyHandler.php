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
namespace Dhl\Shipping\Util\Serializer\Reflection;

use \Dhl\Shipping\Util\Serializer\Reflection\PropertyHandlerInterface;

/**
 * Dhl Property Handler
 *
 * @category Dhl
 * @package  Dhl\Shipping\Util\Serializer
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class PropertyHandler implements PropertyHandlerInterface
{
    /**
     * Convert snake case to UpperCamelCase.
     *
     * @param string $key
     * @return string
     */
    public function camelizeUp($key)
    {
        // separeate
        $key = str_replace('_', ' ', $key);
        // camelize separated words
        $key = ucwords($key);
        // remove whitespace
        $key = str_replace(' ', '', $key);

        return $key;
    }

    /**
     * Convert snake case to lowerCamelCase.
     *
     * @param string $key
     * @return string
     */
    public function camelizeLow($key)
    {
        // camelize
        $key = $this->camelizeUp($key);
        // convert first character to lower case
        $key = lcfirst($key);

        return $key;
    }

    /**
     * Convert Capitalized, UpperCamelCase or lowerCamelCase to snake case.
     *
     * @param string $key
     * @return string
     */
    public function underscore($key)
    {
        // separate
        $key = preg_replace('/(.)([A-Z])/', "$1_$2", $key);
        // convert to lower case
        $key = strtolower($key);

        return $key;
    }

    /**
     * Obtain getter method name from snake case property name.
     *
     * @param string $key
     * @return string
     */
    public function getter($key)
    {
        $key = $this->camelizeUp($key);
        return "get$key";
    }

    /**
     * Obtain setter method name from snake case property name.
     *
     * @param string $key
     * @return string
     */
    public function setter($key)
    {
        $key = $this->camelizeUp($key);
        return "set$key";
    }
}

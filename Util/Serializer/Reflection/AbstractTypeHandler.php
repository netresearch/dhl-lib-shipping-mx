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
 * @package   Dhl\Shipping\Util\Serializer
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2018 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Shipping\Util\Serializer\Reflection;

use Dhl\Shipping\Util\Serializer\Reflection\PropertyHandlerInterface;
use Dhl\Shipping\Util\Serializer\Reflection\ReflectionInterface;
use Dhl\Shipping\Util\Serializer\Reflection\TypeHandlerInterface;

/**
 * Type Handler
 *
 * @package  Dhl\Shipping\Util\Serializer
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
abstract class AbstractTypeHandler implements TypeHandlerInterface
{
    /**
     * @var ReflectionInterface
     */
    private $reflect;

    public function __construct(ReflectionInterface $reflect)
    {
        $this->reflect = $reflect;
    }

    /**
     * Obtain a property type.
     *
     * @param PropertyHandlerInterface $propertyHandler
     * @param \stdClass                $type
     * @param string                   $property
     *
     * @return string
     */
    public function getPropertyType(PropertyHandlerInterface $propertyHandler, $type, $property)
    {
        $propertyType = $this->reflect->getPropertyType($type, $property);
        if (! $propertyType) {
            $getter = $propertyHandler->getter($property);
            $propertyType = $this->reflect->getReturnValueType($type, $getter);
        }

        return $propertyType;
    }

    /**
     * Obtain a property meta type.
     *
     * @param PropertyHandlerInterface $propertyHandler
     * @param \stdClass                $type
     * @param string                   $property
     *
     * @return string
     */
    public function getPropertyMetaType(PropertyHandlerInterface $propertyHandler, $type, $property)
    {
        $propertyType = $this->getPropertyType($propertyHandler, $type, $property);

        // object or scalar
        if (! preg_match('/([\w\\\\]+)\[\]$/', $propertyType, $matches)) {
            if (class_exists($propertyType) || interface_exists($propertyType)) {
                return self::META_TYPE_OBJECT;
            } else {
                return self::META_TYPE_SCALAR;
            }
        }

        $scalarTypes = [
            self::TYPE_INTEGER,
            self::TYPE_FLOAT,
            self::TYPE_STRING,
            self::TYPE_BOOLEAN,
            self::TYPE_SHORT_INTEGER,
            self::TYPE_SHORT_BOOLEAN,
        ];

        // array type
        if (in_array($matches[1], $scalarTypes)) {
            // array of scalar
            $propertyType = self::META_TYPE_ARRAY;
        } else {
            // array of type
            $propertyType = self::META_TYPE_OBJECT_ARRAY;
        }

        return $propertyType;
    }
}

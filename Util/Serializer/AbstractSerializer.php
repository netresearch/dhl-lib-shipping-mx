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
namespace Dhl\Shipping\Util\Serializer;

use Dhl\Shipping\Util\Serializer\SerializerInterface;
use Dhl\Shipping\Util\Serializer\Reflection\PropertyHandlerInterface;
use Dhl\Shipping\Util\Serializer\Reflection\TypeHandlerInterface;

/**
 * Data Serializer
 *
 * @package  Dhl\Shipping\Util\Serializer
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
abstract class AbstractSerializer implements SerializerInterface
{
    /**
     * @var PropertyHandlerInterface
     */
    private $propertyHandler;

    /**
     * @var TypeHandlerInterface
     */
    private $typeHandler;

    /**
     * AbstractSerializer constructor.
     * @param PropertyHandlerInterface $propertyHandler
     * @param TypeHandlerInterface $typeHandler
     */
    public function __construct(
        PropertyHandlerInterface $propertyHandler,
        TypeHandlerInterface $typeHandler
    ) {
        $this->propertyHandler = $propertyHandler;
        $this->typeHandler = $typeHandler;
    }

    /**
     * Copy the properties to an object of the given type.
     *
     * @param mixed[] $properties Associated array of property keys and values.
     * @param string $type The type of the target object.
     * @return \stdClass The target object with all properties set.
     */
    public function parseProperties(array $properties, $type)
    {
        $dataObj = $this->typeHandler->create($type);

        // named type
        foreach ($properties as $key => $value) {
            $subType = $this->typeHandler->getPropertyType($this->propertyHandler, $dataObj, $key);
            if (!$subType) {
                continue;
            }

            $subMetaType = $this->typeHandler->getPropertyMetaType($this->propertyHandler, $dataObj, $key);
            if ($subMetaType == TypeHandlerInterface::META_TYPE_OBJECT) {
                $value = $this->parseProperties($value, $subType);
            } elseif ($subMetaType == TypeHandlerInterface::META_TYPE_OBJECT_ARRAY) {
                $subType = rtrim($subType, '[]');

                $types = [];
                foreach ($value as $item) {
                    $types[]= $this->parseProperties($item, $subType);
                }

                $value = $types;
            }

            // set value
            $setter = $this->propertyHandler->setter($key);
            call_user_func([$dataObj, $setter], $value);
        }

        return $dataObj;
    }
}

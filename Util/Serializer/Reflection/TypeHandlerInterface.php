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

/**
 * Type Handler
 *
 * @package  Dhl\Shipping\Util\Serializer
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
interface TypeHandlerInterface
{
    const TYPE_INTEGER = 'integer';
    const TYPE_FLOAT   = 'float';
    const TYPE_STRING  = 'string';
    const TYPE_BOOLEAN = 'boolean';

    const TYPE_SHORT_INTEGER = 'int';
    const TYPE_SHORT_BOOLEAN = 'bool';

    const META_TYPE_SCALAR   = 'scalar';
    const META_TYPE_OBJECT   = 'object';
    const META_TYPE_RESOURCE = 'resource';

    const META_TYPE_ARRAY        = 'array'; // array of scalar
    const META_TYPE_OBJECT_ARRAY = 'object_array'; // array of objects

    /**
     * Create an object of given type by the means of the current framework.
     *
     * @param string $type
     *
     * @return \stdClass
     */
    public function create($type);

    /**
     * Obtain a property type.
     *
     * @param PropertyHandlerInterface $propertyHandler
     * @param \stdClass                $type
     * @param string                   $property
     *
     * @return string
     */
    public function getPropertyType(PropertyHandlerInterface $propertyHandler, $type, $property);

    /**
     * Obtain the type of type (scalar, array, object, resource).
     *
     * @param PropertyHandlerInterface $propertyHandler
     * @param \stdClass                $type
     * @param string                   $property
     *
     * @return string
     */
    public function getPropertyMetaType(PropertyHandlerInterface $propertyHandler, $type, $property);
}

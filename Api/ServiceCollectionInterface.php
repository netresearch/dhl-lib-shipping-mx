<?php

namespace Dhl\Shipping\Api;

use Dhl\Shipping\Api\Data\ServiceInterface;

/**
 * ServiceCollection
 *
 * @package  Dhl\Shipping\Api
 * @author   Paul Siedler <paul.siedler@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
interface ServiceCollectionInterface extends \SeekableIterator, \ArrayAccess, \Serializable, \Countable
{
    /**
     * @param ServiceInterface[] $services
     * @return static
     */
    public static function fromArray($services);

    /**
     * @param callable $callback
     * @return static
     */
    public function filter(callable $callback);

    /**
     * @param callable $callback
     * @return mixed[]
     */
    public function map(callable $callback);

    /**
     * @param callable $callback
     * @return static
     */
    public function sort(callable $callback);
}
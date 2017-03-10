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
 * @package   Dhl\Shipping\Api
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Shipping\Webservice\ResponseType;

use \Dhl\Shipping\Api\Data\Webservice\ResponseType\Generic\ItemStatusInterface;
use Dhl\Shipping\Api\Data\Webservice\ResponseType\DeleteShipmentResponseInterface;
use \Dhl\Shipping\Api\Data\Webservice\ResponseType\Generic\ResponseStatusInterface;

/**
 * DeleteShipmentResponseCollection
 *
 * @category Dhl
 * @package  Dhl\Shipping\Api
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeleteShipmentResponseCollection extends \ArrayIterator implements DeleteShipmentResponseInterface
{
    /**
     * @var ResponseStatusInterface
     */
    private $status;

    /**
     * DeleteShipmentResponseCollection constructor.
     *
     * @param ResponseStatusInterface $status
     * @param ItemStatusInterface[] $labels
     * @param int $flags
     */
    public function __construct(ResponseStatusInterface $status, array $labels = [], $flags = 0)
    {
        $this->status = $status;
        parent::__construct($labels, $flags);
    }

    /**
     * @return ResponseStatusInterface
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Obtain status for all items contained in the deletion operation.
     *
     * @return ItemStatusInterface[]
     */
    public function getDeletedItems()
    {
        return $this->getArrayCopy();
    }

    /**
     * @param string $shipmentNumber
     * @return ItemStatusInterface
     */
    public function getDeletedItem($shipmentNumber)
    {
        return $this->offsetGet($shipmentNumber);
    }
}

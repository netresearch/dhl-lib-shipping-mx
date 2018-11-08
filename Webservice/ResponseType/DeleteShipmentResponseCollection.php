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
 * @package   Dhl\Shipping
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2018 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Shipping\Webservice\ResponseType;

use Dhl\Shipping\Webservice\ResponseType\Generic\ItemStatusInterface;
use Dhl\Shipping\Webservice\ResponseType\Generic\ResponseStatusInterface;
use Dhl\Shipping\Webservice\Exception\ApiAdapterException;
use Dhl\Shipping\Webservice\ResponseType\Generic\ResponseStatus;

/**
 * DeleteShipmentResponseCollection
 *
 * @package  Dhl\Shipping
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class DeleteShipmentResponseCollection extends \ArrayIterator implements DeleteShipmentResponseInterface
{
    const MSG_STATUS_DELETED           = 'Shipping labels were cancelled successfully.';
    const MSG_STATUS_PARTIALLY_DELETED = 'Some shipping labels could not be cancelled: %s';
    const MSG_STATUS_NOT_DELETED       = 'Shipping labels could not be cancelled: %s';

    /**
     * @var ResponseStatusInterface
     */
    private $status;

    /**
     * Infer overall operation status from single items' status.
     *
     * - All labels cancelled: success
     * - No labels cancelled: not deleted
     * - Some labels cancelled: partially deleted
     *
     * @param ItemStatusInterface[] $items
     *
     * @return ResponseStatus
     */
    private static function getResponseStatus(array $items)
    {
        $deletedItems = array_filter($items, function(ItemStatusInterface $item) {
            return ($item->getCode() === ResponseStatusInterface::STATUS_SUCCESS);
        });
        $rejectedItems = array_filter($items, function(ItemStatusInterface $item) {
            return ($item->getCode() === ResponseStatusInterface::STATUS_FAILURE);
        });

        if (empty($rejectedItems)) {
            $responseStatus = new ResponseStatus(
                ResponseStatusInterface::STATUS_SUCCESS,
                'Info',
                self::MSG_STATUS_DELETED
            );
        } elseif (empty($deletedItems)) {
            $messages = self::getStatusMessages($rejectedItems);
            $responseStatus = new ResponseStatus(
                ResponseStatusInterface::STATUS_FAILURE,
                'Error',
                sprintf(self::MSG_STATUS_NOT_DELETED, implode("\n", $messages))
            );
        } else {
            $messages = self::getStatusMessages($rejectedItems);
            $responseStatus = new ResponseStatus(
                ResponseStatusInterface::STATUS_PARTIAL_SUCCESS,
                'Warning',
                sprintf(self::MSG_STATUS_PARTIALLY_DELETED, implode("\n", $messages))
            );
        }

        return $responseStatus;
    }

    /**
     * @param ItemStatusInterface[] $items
     *
     * @return string[]
     */
    private static function getStatusMessages(array $items)
    {
        $messages = [];

        foreach ($items as $item) {
            $messages[] = sprintf(
                '%s: %s | %s',
                $item->getIdentifier(),
                $item->getText(),
                $item->getMessage()
            );
        }

        return $messages;
    }

    /**
     * @return ResponseStatusInterface
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param ResponseStatusInterface $status
     *
     * @return $this
     */
    public function setStatus(ResponseStatusInterface $status)
    {
        $this->status = $status;
        return $this;
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
     *
     * @return ItemStatusInterface
     */
    public function getDeletedItem($shipmentNumber)
    {
        return $this->offsetGet($shipmentNumber);
    }

    /**
     * @param ItemStatusInterface[] $items
     *
     * @return DeleteShipmentResponseCollection
     */
    public static function fromResponse(array $items)
    {
        $collection = new self($items);

        $responseStatus = self::getResponseStatus($items);
        $collection->setStatus($responseStatus);

        return $collection;
    }

    /**
     * @param ApiAdapterException $exception
     *
     * @return DeleteShipmentResponseCollection
     */
    public static function fromError(ApiAdapterException $exception)
    {
        $collection = new self([]);

        $messages = [];
        if ($exception->getPrevious()) {
            $messages[] = $exception->getPrevious()->getMessage();
        } else {
            $messages[] = $exception->getMessage();
        }

        $responseStatus = new ResponseStatus(
            ResponseStatusInterface::STATUS_FAILURE,
            'Error',
            sprintf(self::MSG_STATUS_NOT_DELETED, implode("\n", $messages))
        );
        $collection->setStatus($responseStatus);

        return $collection;
    }
}

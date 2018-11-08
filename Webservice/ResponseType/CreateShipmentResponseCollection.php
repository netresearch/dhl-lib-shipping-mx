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

use Dhl\Shipping\Webservice\ResponseType\CreateShipmentResponseInterface;
use Dhl\Shipping\Webservice\ResponseType\CreateShipment\LabelInterface;
use Dhl\Shipping\Webservice\ResponseType\Generic\ResponseStatusInterface;
use Dhl\Shipping\Webservice\Exception\ApiAdapterException;
use Dhl\Shipping\Webservice\ResponseType\Generic\ResponseStatus;

/**
 * CreateShipmentResponseCollection
 *
 * @package  Dhl\Shipping
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class CreateShipmentResponseCollection extends \ArrayIterator implements CreateShipmentResponseInterface
{
    const MSG_STATUS_CREATED           = 'Shipping labels were created successfully.';
    const MSG_STATUS_PARTIALLY_CREATED = 'Some shipping labels could not be created: %s';
    const MSG_STATUS_NOT_CREATED       = 'Shipping labels could not be created: %s';

    /**
     * @var ResponseStatusInterface
     */
    private $status;

    /**
     * @param LabelInterface[] $labels
     * @param string[]         $invalidOrders
     *
     * @return string[]
     */
    private static function getStatusMessages(array $labels, array $invalidOrders = [])
    {
        $messages = [];

        foreach ($labels as $label) {
            $messages[] = sprintf(
                '%s: %s | %s',
                $label->getSequenceNumber(),
                $label->getStatus()->getText(),
                $label->getStatus()->getMessage()
            );
        }

        foreach ($invalidOrders as $sequenceNumber => $errorMessage) {
            $messages[] = sprintf(
                '%s: %s',
                $sequenceNumber,
                $errorMessage
            );
        }

        return $messages;
    }

    /**
     * Infer overall operation status from single items' status.
     *
     * - All labels created: success
     * - No labels created: not created
     * - Some labels created: partially created
     *
     * @param LabelInterface[] $labels
     * @param string[]         $invalidOrders
     *
     * @return ResponseStatus
     */
    private static function getResponseStatus(array $labels, array $invalidOrders = [])
    {
        $createdLabels = array_filter($labels, function(LabelInterface $label) {
            return ($label->getStatus()->getCode() === ResponseStatusInterface::STATUS_SUCCESS);
        });
        $rejectedLabels = array_filter($labels, function(LabelInterface $label) {
            return ($label->getStatus()->getCode() === ResponseStatusInterface::STATUS_FAILURE);
        });

        if (empty($rejectedLabels) && empty($invalidOrders)) {
            $responseStatus = new ResponseStatus(
                ResponseStatusInterface::STATUS_SUCCESS,
                'Info',
                self::MSG_STATUS_CREATED
            );
        } elseif (empty($createdLabels)) {
            $messages = self::getStatusMessages($rejectedLabels, $invalidOrders);
            $responseStatus = new ResponseStatus(
                ResponseStatusInterface::STATUS_FAILURE,
                'Error',
                sprintf(self::MSG_STATUS_NOT_CREATED, implode("\n", $messages))
            );
        } else {
            $messages = self::getStatusMessages($rejectedLabels, $invalidOrders);
            $responseStatus = new ResponseStatus(
                ResponseStatusInterface::STATUS_PARTIAL_SUCCESS,
                'Warning',
                sprintf(self::MSG_STATUS_PARTIALLY_CREATED, implode("\n", $messages))
            );
        }

        return $responseStatus;
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
     * @return LabelInterface[]
     */
    public function getCreatedItems()
    {
        return $this->getArrayCopy();
    }

    /**
     * @param string $sequenceNumber
     *
     * @return LabelInterface
     */
    public function getCreatedItem($sequenceNumber)
    {
        return $this->offsetGet($sequenceNumber);
    }

    /**
     * @param LabelInterface[] $labels
     * @param string[]         $invalidRequests
     *
     * @return CreateShipmentResponseCollection
     */
    public static function fromResponse(array $labels, array $invalidRequests)
    {
        $collection = new self($labels);

        $responseStatus = self::getResponseStatus($labels, $invalidRequests);
        $collection->setStatus($responseStatus);

        return $collection;
    }

    /**
     * @param ApiAdapterException $exception
     * @param string[]            $invalidRequests
     *
     * @return CreateShipmentResponseCollection
     */
    public static function fromError(ApiAdapterException $exception, array $invalidRequests)
    {
        $collection = new self([]);

        $messages = self::getStatusMessages([], $invalidRequests);
        if ($exception->getPrevious()) {
            $messages[] = $exception->getPrevious()->getMessage();
        } else {
            $messages[] = $exception->getMessage();
        }

        $responseStatus = new ResponseStatus(
            ResponseStatusInterface::STATUS_FAILURE,
            'Error',
            sprintf(self::MSG_STATUS_NOT_CREATED, implode("\n", $messages))
        );
        $collection->setStatus($responseStatus);

        return $collection;
    }
}

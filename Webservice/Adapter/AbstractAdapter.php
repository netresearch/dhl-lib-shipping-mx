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
namespace Dhl\Shipping\Webservice\Adapter;

use Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrderInterface;
use Dhl\Shipping\Webservice\ResponseType\CreateShipment\LabelInterface;
use Dhl\Shipping\Webservice\ResponseType\Generic\ItemStatusInterface;
use Dhl\Shipping\Webservice\Adapter\AdapterInterface;

/**
 * Shipping API Adapter
 *
 * @package  Dhl\Shipping
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
abstract class AbstractAdapter implements AdapterInterface
{
    /**
     * @var AdapterInterface
     */
    private $successor;

    /**
     * @param ShipmentOrderInterface $shipmentOrder
     * @return bool
     */
    abstract protected function canCreateLabel(ShipmentOrderInterface $shipmentOrder);

    /**
     * @param string $shipmentNumber
     * @return bool
     */
    abstract protected function canCancelLabel($shipmentNumber);

    /**
     * @param ShipmentOrderInterface[] $shipmentOrders
     * @return LabelInterface[]
     */
    abstract protected function createShipmentOrders(array $shipmentOrders);

    /**
     * @param string[] $shipmentNumbers
     * @return ItemStatusInterface[]
     */
    abstract protected function deleteShipmentOrders(array $shipmentNumbers);

    /**
     * @param AdapterInterface $adapter
     * @return $this
     */
    public function setSuccessor(AdapterInterface $adapter)
    {
        $this->successor = $adapter;
        return $this;
    }

    /**
     * @param ShipmentOrderInterface[] $shipmentOrders
     * @return LabelInterface[]
     */
    public function createLabels(array $shipmentOrders)
    {
        $myOrders = [];
        $theirOrders = [];

        foreach ($shipmentOrders as $sequenceNumber => $shipmentOrder) {
            if ($this->canCreateLabel($shipmentOrder)) {
                $myOrders[$sequenceNumber] = $shipmentOrder;
            } else {
                $theirOrders[$sequenceNumber] = $shipmentOrder;
            }
        }

        if (!empty($myOrders)) {
            $labels = $this->createShipmentOrders($myOrders);
        } else {
            $labels = [];
        }

        if ($this->successor !== null) {
            $labels = array_merge($labels, $this->successor->createLabels($theirOrders));
        }

        return $labels;
    }

    /**
     * @param string[] $shipmentNumbers
     * @return ItemStatusInterface[]
     */
    public function cancelLabels(array $shipmentNumbers)
    {
        $myNumbers = [];
        $theirNumbers = [];

        foreach ($shipmentNumbers as $shipmentNumber) {
            if ($this->canCancelLabel($shipmentNumber)) {
                $myNumbers[] = $shipmentNumber;
            } else {
                $theirNumbers[] = $shipmentNumber;
            }
        }

        if (!empty($myNumbers)) {
            $items = $this->deleteShipmentOrders($myNumbers);
        } else {
            $items = [];
        }

        if ($this->successor !== null) {
            $items = array_merge($items, $this->successor->cancelLabels($theirNumbers));
        }

        return $items;
    }
}

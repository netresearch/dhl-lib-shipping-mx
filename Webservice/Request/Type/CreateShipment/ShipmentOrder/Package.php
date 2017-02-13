<?php
/**
 * Dhl Versenden
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
 * @package   Dhl\Versenden\Api
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Versenden\Webservice\Request\Type\CreateShipment\ShipmentOrder;

use \Dhl\Versenden\Api\Data\Webservice\Request\Type\CreateShipment\ShipmentOrder\PackageInterface;
use \Dhl\Versenden\Api\Data\Webservice\Request\Type\Generic\Package\WeightInterface;
use \Dhl\Versenden\Api\Data\Webservice\Request\Type\Generic\Package\DimensionsInterface;
use \Dhl\Versenden\Api\Data\Webservice\Request\Type\Generic\Package\MonetaryValueInterface;

/**
 * Platform independent shipment order package
 *
 * @category Dhl
 * @package  Dhl\Versenden\Api
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class Package implements PackageInterface
{
    /**
     * @var string
     */
    private $packageId;

    /**
     * @var WeightInterface
     */
    private $weight;

    /**
     * @var DimensionsInterface
     */
    private $dimensions;

    /**
     * @var MonetaryValueInterface
     */
    private $declaredValue;

    /**
     * Package constructor.
     * @param string $packageId
     * @param WeightInterface $weight
     * @param DimensionsInterface $dimensions
     * @param MonetaryValueInterface $declaredValue
     */
    public function __construct(
        $packageId,
        WeightInterface $weight,
        DimensionsInterface $dimensions,
        MonetaryValueInterface $declaredValue
    ) {
        $this->packageId = $packageId;
        $this->weight = $weight;
        $this->dimensions = $dimensions;
        $this->declaredValue = $declaredValue;
    }

    /**
     * Customer Confirmation Number, usually composed of increment id and package sequence number
     *
     * @return string
     */
    public function getPackageId()
    {
        return $this->packageId;
    }

    /**
     * @return WeightInterface
     */
    public function getWeight()
    {
        $this->weight;
    }

    /**
     * @return DimensionsInterface
     */
    public function getDimensions()
    {
        return $this->dimensions;
    }

    /**
     * @return MonetaryValueInterface
     */
    public function getDeclaredValue()
    {
        return $this->declaredValue;
    }
}

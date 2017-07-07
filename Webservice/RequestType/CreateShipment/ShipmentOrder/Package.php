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
 * @package   Dhl\Shipping
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrder;

use \Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrder\PackageInterface;
use \Dhl\Shipping\Webservice\RequestType\Generic\Package\WeightInterface;
use \Dhl\Shipping\Webservice\RequestType\Generic\Package\DimensionsInterface;
use \Dhl\Shipping\Webservice\RequestType\Generic\Package\MonetaryValueInterface;

/**
 * Platform independent shipment order package
 *
 * @category Dhl
 * @package  Dhl\Shipping
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
     * @var string
     */
    private $termsOfTrade;

    /**
     * @var string
     */
    private $additionalFee;

    /**
     * @var string
     */
    private $placeOfCommital;

    /**
     * @var string
     */
    private $permitNumber;

    /**
     * @var string
     */
    private $attestationNumber;

    /**
     * @var string
     */
    private $exportNotification;

    /**
     * Package constructor.
     * @param $packageId
     * @param WeightInterface $weight
     * @param DimensionsInterface $dimensions
     * @param MonetaryValueInterface $declaredValue
     * @param $termsOfTrade
     * @param $additionalFee
     * @param $placeOfCommital
     * @param $permitNumber
     * @param $attestationNumber
     * @param $exportNotification
     */
    public function __construct(
        $packageId,
        WeightInterface $weight,
        DimensionsInterface $dimensions,
        MonetaryValueInterface $declaredValue,
        $termsOfTrade,
        $additionalFee,
        $placeOfCommital,
        $permitNumber,
        $attestationNumber,
        $exportNotification
    ) {
        $this->packageId = $packageId;
        $this->weight = $weight;
        $this->dimensions = $dimensions;
        $this->declaredValue = $declaredValue;
        $this->termsOfTrade = $termsOfTrade;
        $this->additionalFee = $additionalFee;
        $this->placeOfCommital = $placeOfCommital;
        $this->permitNumber =  $permitNumber;
        $this->attestationNumber = $attestationNumber;
        $this->exportNotification = $exportNotification;
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
        return $this->weight;
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

    /**
     * @return string
     */
    public function getTermsOfTrade(): string
    {
        return $this->termsOfTrade;
    }

    /**
     * @return string
     */
    public function getAdditionalFee(): string
    {
        return $this->additionalFee;
    }

    /**
     * @return string
     */
    public function getPlaceOfCommital(): string
    {
        return $this->placeOfCommital;
    }

    /**
     * @return string
     */
    public function getPermitNumber(): string
    {
        return $this->permitNumber;
    }

    /**
     * @return string
     */
    public function getAttestationNumber(): string
    {
        return $this->attestationNumber;
    }

    /**
     * @return string
     */
    public function getExportNotification(): string
    {
        return $this->exportNotification;
    }
}

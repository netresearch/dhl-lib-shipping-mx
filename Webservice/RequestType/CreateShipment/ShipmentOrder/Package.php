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

use \Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrder\Package\PackageItemInterface;
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
     * Package identifier
     *
     * @var int
     */
    private $packageId;

    /**
     * Package weight
     *
     * @var WeightInterface
     */
    private $weight;

    /**
     * Package dimensions
     *
     * @var DimensionsInterface
     */
    private $dimensions;

    /**
     * Customs value
     *
     * @var MonetaryValueInterface
     */
    private $declaredValue;

    /**
     * Additional custom fees to be payed
     *
     * @var string
     */
    private $additionalFee;

    /**
     * OTHER, PRESENT, COMMERCIAL_SAMPLE, DOCUMENT, RETURN_OF_GOODS
     *
     * @var string
     */
    private $exportType;

    /**
     * Additional information for export type OTHER
     * @see exportType
     *
     * @var string
     */
    private $exportTypeDescription;

    /**
     * Incoterms code
     *
     * @var string
     */
    private $termsOfTrade;

    /**
     * Committal location
     *
     * @var string
     */
    private $placeOfCommittal;

    /**
     * Customs permit number
     *
     * @var string
     */
    private $permitNumber;

    /**
     * Customs attestation number
     *
     * @var string
     */
    private $attestationNumber;

    /**
     * Select electronic export notification (EEI)
     *
     * @var bool
     */
    private $exportNotification;

    /**
     * Dangerous goods category
     *
     * @var string
     */
    private $dgCategory;

    /**
     * Package export description
     *
     * @var string
     */
    private $exportDescription;

    /**
     * Package items
     *
     * @var PackageItemInterface[]
     */
    private $items;

    /**
     * Package constructor.
     *
     * @param $packageId
     * @param WeightInterface $weight
     * @param DimensionsInterface $dimensions
     * @param MonetaryValueInterface $declaredValue
     * @param MonetaryValueInterface $additionalFee
     * @param string $exportType
     * @param string $exportTypeDescription
     * @param string $termsOfTrade
     * @param string $placeOfCommittal
     * @param string $permitNumber
     * @param string $attestationNumber
     * @param bool $exportNotification
     * @param string $dgCategory
     * @param string $exportDescription
     * @param array $items
     */
    public function __construct(
        $packageId,
        WeightInterface $weight,
        DimensionsInterface $dimensions,
        MonetaryValueInterface $declaredValue,
        MonetaryValueInterface $additionalFee,
        $exportType = '',
        $exportTypeDescription = '',
        $termsOfTrade = '',
        $placeOfCommittal = '',
        $permitNumber = '',
        $attestationNumber = '',
        $exportNotification = false,
        $dgCategory = '',
        $exportDescription = '',
        $items = []
    ) {
        $this->packageId = $packageId;
        $this->weight = $weight;
        $this->dimensions = $dimensions;
        $this->declaredValue = $declaredValue;
        $this->additionalFee = $additionalFee;
        $this->exportType = $exportType;
        $this->exportTypeDescription = $exportTypeDescription;
        $this->termsOfTrade = $termsOfTrade;
        $this->placeOfCommittal = $placeOfCommittal;
        $this->permitNumber = $permitNumber;
        $this->attestationNumber = $attestationNumber;
        $this->exportNotification = $exportNotification;
        $this->dgCategory = $dgCategory;
        $this->exportDescription = $exportDescription;
        $this->items = $items;
    }

    /**
     * @return int
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
     * @return MonetaryValueInterface
     */
    public function getAdditionalFee()
    {
        return $this->additionalFee;
    }

    /**
     * Export type ("OTHER", "PRESENT", "COMMERCIAL_SAMPLE", "DOCUMENT", "RETURN_OF_GOODS") (depends on chosen product
     * -> only mandatory for international, non EU shipments).
     *
     * @return string
     */
    public function getExportType()
    {
        return $this->exportType;
    }

    /**
     * Description mandatory if ExportType is OTHER.
     *
     * @return string
     */
    public function getExportTypeDescription()
    {
        return $this->exportTypeDescription;
    }

    /**
     * @return string
     */
    public function getTermsOfTrade()
    {
        return $this->termsOfTrade;
    }

    /**
     * @return string
     */
    public function getPlaceOfCommittal()
    {
        return $this->placeOfCommittal;
    }

    /**
     * @return string
     */
    public function getPermitNumber()
    {
        return $this->permitNumber;
    }

    /**
     * @return string
     */
    public function getAttestationNumber()
    {
        return $this->attestationNumber;
    }

    /**
     * @return bool
     */
    public function isWithExportNotification()
    {
        return $this->exportNotification;
    }

    /**
     * @return string
     */
    public function getDangerousGoodsCategory()
    {
        return $this->dgCategory;
    }

    /**
     * @return string
     */
    public function getExportDescription()
    {
        return $this->exportDescription;
    }

    /**
     * @return PackageItemInterface[]
     */
    public function getItems()
    {
        return $this->items;
    }
}

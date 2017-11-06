<?php
/**
 * Dhl Shipping.
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
 *
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 *
 * @link      http://www.netresearch.de/
 */

namespace Dhl\Shipping\Gla\Request\Type;

/**
 * CustomsDetailsRequestType.
 *
 * @category Dhl
 *
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 *
 * @link     http://www.netresearch.de/
 */
class CustomsDetailsRequestType implements \JsonSerializable
{
    /**
     * Detailed description of the commodity item. Required. 1-200 chars.
     *
     * @var string
     */
    private $itemDescription;

    /**
     * Dedicated description for export customs clearance. Optional. 1-50 chars.
     *
     * @var string
     */
    private $descriptionExport;

    /**
     * Dedicated description for import customs clearance. Optional. 1-50 chars.
     *
     * @var string
     */
    private $descriptionImport;

    /**
     * 2-Character Country Code for Origin Manufacturer Country of the product. Optional. 2 chars.
     *
     * @var string
     */
    private $countryOfOrigin;

    /**
     * Harmonized Tariff Schedule. Optional. 4-11 chars.
     *
     * @var string
     */
    private $hsCode;

    /**
     * Quantity of the same item in the package. Optional.
     *
     * @var int
     */
    private $packagedQuantity;

    /**
     * The commercial value of the commodity (per each). Optional.
     *
     * @var float
     */
    private $itemValue;

    /**
     * SKU #, or item code. Optional. 1-20 chars.
     *
     * @var string
     */
    private $skuNumber;

    /**
     * CustomsDetailsRequestType constructor.
     *
     * @param string $itemDescription
     * @param string $descriptionExport
     * @param string $descriptionImport
     * @param string $countryOfOrigin
     * @param string $hsCode
     * @param int    $packagedQuantity
     * @param float  $itemValue
     * @param string $skuNumber
     */
    public function __construct(
        $itemDescription,
        $descriptionExport = null,
        $descriptionImport = null,
        $countryOfOrigin = null,
        $hsCode = null,
        $packagedQuantity = null,
        $itemValue = null,
        $skuNumber = null
    ) {
        $this->itemDescription = $itemDescription;
        $this->descriptionExport = $descriptionExport;
        $this->descriptionImport = $descriptionImport;
        $this->countryOfOrigin = $countryOfOrigin;
        $this->hsCode = $hsCode;
        $this->packagedQuantity = $packagedQuantity;
        $this->itemValue = $itemValue;
        $this->skuNumber = $skuNumber;
    }

    /**
     * @return string
     */
    public function getItemDescription()
    {
        return $this->itemDescription;
    }

    /**
     * @return string
     */
    public function getDescriptionExport()
    {
        return $this->descriptionExport;
    }

    /**
     * @return string
     */
    public function getDescriptionImport()
    {
        return $this->descriptionImport;
    }

    /**
     * @return string
     */
    public function getCountryOfOrigin()
    {
        return $this->countryOfOrigin;
    }

    /**
     * @return string
     */
    public function getHsCode()
    {
        return $this->hsCode;
    }

    /**
     * @return int
     */
    public function getPackagedQuantity()
    {
        return $this->packagedQuantity;
    }

    /**
     * @return float
     */
    public function getItemValue()
    {
        return $this->itemValue;
    }

    /**
     * @return string
     */
    public function getSkuNumber()
    {
        return $this->skuNumber;
    }

    /**
     * @return string[]
     */
    public function jsonSerialize()
    {
        $properties = get_object_vars($this);
        $properties = array_filter($properties, function ($value) {
            return !empty($value);
        });

        return $properties;
    }
}

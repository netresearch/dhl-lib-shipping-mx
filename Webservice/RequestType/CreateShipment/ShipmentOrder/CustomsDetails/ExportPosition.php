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

namespace Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrder\CustomsDetails;

use Dhl\Shipping\Webservice\RequestType\Generic\Package\MonetaryValueInterface;
use Dhl\Shipping\Webservice\RequestType\Generic\Package\WeightInterface;

/**
 * Platform independent shipment order customs details: export position.
 *
 * @category Dhl
 *
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 *
 * @link     http://www.netresearch.de/
 */
class ExportPosition implements ExportPositionInterface
{
    /**
     * @var int
     */
    private $qty;

    /**
     * @var string
     */
    private $skuNumber;

    /**
     * @var string
     */
    private $itemDescription;

    /**
     * @var MonetaryValueInterface
     */
    private $declaredValue;

    /**
     * @var WeightInterface
     */
    private $weight;

    /**
     * @var string
     */
    private $countryOfOrigin;

    /**
     * @var string
     */
    private $hsCode;

    /**
     * ExportPosition constructor.
     *
     * @param int                    $qty
     * @param string                 $skuNumber
     * @param string                 $itemDescription
     * @param MonetaryValueInterface $declaredValue
     * @param WeightInterface        $weight
     * @param string                 $countryOfOrigin
     * @param string                 $hsCode
     */
    public function __construct(
        $qty,
        $skuNumber,
        $itemDescription,
        MonetaryValueInterface $declaredValue,
        WeightInterface $weight,
        $countryOfOrigin,
        $hsCode
    ) {
        $this->qty = $qty;
        $this->skuNumber = $skuNumber;
        $this->itemDescription = $itemDescription;
        $this->declaredValue = $declaredValue;
        $this->weight = $weight;
        $this->countryOfOrigin = $countryOfOrigin;
        $this->hsCode = $hsCode;
    }

    /**
     * Obtain quantity of the commodity.
     *
     * @return int
     */
    public function getQty()
    {
        return $this->qty;
    }

    /**
     * @return string
     */
    public function getSkuNumber()
    {
        return $this->skuNumber;
    }

    /**
     * @return string
     */
    public function getItemDescription()
    {
        return $this->itemDescription;
    }

    /**
     * Obtain the commercial value of the commodity (per each).
     *
     * @return MonetaryValueInterface
     */
    public function getDeclaredValue()
    {
        return $this->declaredValue;
    }

    /**
     * Obtain the net weight of the commodity (per each).
     *
     * @return WeightInterface
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Obtain ISO-2-Alpha country code for the item's origin manufacturer country.
     *
     * @return string
     */
    public function getCountryOfOrigin()
    {
        return $this->countryOfOrigin;
    }

    /**
     * Obtain HS Code, also referred to as Customs Tariff Number.
     *
     * @return string
     */
    public function getHsCode()
    {
        return $this->hsCode;
    }
}

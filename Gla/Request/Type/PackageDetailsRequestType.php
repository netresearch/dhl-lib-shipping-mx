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
 * PackageDetailsRequestType.
 *
 * @category Dhl
 *
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 *
 * @link     http://www.netresearch.de/
 */
class PackageDetailsRequestType implements \JsonSerializable
{
    /**
     * Three-letter ISO Currency code. Required. 3 chars.
     *
     * @var string
     */
    private $currency;

    /**
     * The DHL eCommerce product that is to be applied to the shipment. Required. 1-3 chars.
     *
     * @var string
     */
    private $orderedProduct;

    /**
     * Unique reference ID for shipment (Customer Confirmation Number). Required. 1-30 chars.
     *
     * @var string
     */
    private $packageId;

    /**
     * Total shipment content weight. Whole numbers only. Required.
     *
     * @var int
     */
    private $weight;

    /**
     * The unit of measure for the weight. Required. 1-2 chars.
     *
     * @var string
     */
    private $weightUom;

    /**
     * Billing data aggregation property, also referred to as Reference. Optional. 1-30 chars.
     *
     * @var string
     */
    private $billingRef1;

    /**
     * Secondary billing data aggregation property, also referred to as Batch. Optional. 1-30 chars.
     *
     * @var string
     */
    private $billingRef2;

    /**
     * Amount to collect upon delivery of goods. Optional.
     *
     * @var float
     */
    private $codAmount;

    /**
     * Total declared value for the package. Optional.
     *
     * @var float
     */
    private $declaredValue;

    /**
     * For future-use. Optional. 1-60 chars.
     *
     * @var string
     */
    private $deliveryConfirmationNo;

    /**
     * Dangerous goods category. Optional. 2 chars.
     *
     * @var string
     */
    private $dgCategory;

    /**
     * Dimensional unit of measure for length, width, and height of the package. Optional. 2 chars.
     *
     * @var string
     */
    private $dimensionUom;

    /**
     * Height dimension of the package (provide if available). Optional.
     *
     * @var int
     */
    private $height;

    /**
     * Longest measurement of package (provide if available). Optional.
     *
     * @var int
     */
    private $length;

    /**
     * Width dimension of the package (provide if available). Optional.
     *
     * @var int
     */
    private $width;

    /**
     * Indicates whether duties and taxes for the shipment are paid by the shipper (value 'Y') or not ('N').
     * This is commonly known as Inco terms DDP (Delivered Duties Paid) and DDU (Delivered Duties Unpaid).
     * Optional. 1-3 chars.
     *
     * @var string
     */
    private $dutiesPaid;

    /**
     * Total insured value of the package. Optional.
     *
     * @var float
     */
    private $insuredValue;

    /**
     * Mail type of the shipment. Optional. 2 digits.
     *
     * @var int
     */
    private $mailtype;

    /**
     * Description of the contents of the package. Optional. 1-50 chars.
     *
     * @var string
     */
    private $packageDesc;

    /**
     * For future-use. Optional. 1-30 chars.
     *
     * @var string
     */
    private $packageRefName;

    /**
     * Additional services such as delivery confirmation, signature confirmation.
     * Optional. 1-6 chars.
     *
     * @var string
     */
    private $service;

    /**
     * Instructions on how to handle undeliverable-as-addressed, e.g.
     * Forwarding Service Requested or Return Service Requested. Optional. 1 digit.
     *
     * @var int
     */
    private $serviceEndorsement;

    /**
     * PackageDetailsRequestType constructor.
     *
     * @param string $currency
     * @param string $orderedProduct
     * @param string $packageId
     * @param int    $weight
     * @param string $weightUom
     * @param string $billingRef1
     * @param string $billingRef2
     * @param float  $codAmount
     * @param float  $declaredValue
     * @param string $deliveryConfirmationNo
     * @param string $dgCategory
     * @param string $dimensionUom
     * @param int    $height
     * @param int    $length
     * @param int    $width
     * @param string $dutiesPaid
     * @param float  $insuredValue
     * @param int    $mailtype
     * @param string $packageDesc
     * @param string $packageRefName
     * @param string $service
     * @param int    $serviceEndorsement
     */
    public function __construct(
        $currency,
        $orderedProduct,
        $packageId,
        $weight,
        $weightUom,
        $billingRef1 = null,
        $billingRef2 = null,
        $codAmount = null,
        $declaredValue = null,
        $deliveryConfirmationNo = null,
        $dgCategory = null,
        $dimensionUom = null,
        $height = null,
        $length = null,
        $width = null,
        $dutiesPaid = null,
        $insuredValue = null,
        $mailtype = null,
        $packageDesc = null,
        $packageRefName = null,
        $service = null,
        $serviceEndorsement = null
    ) {
        $this->currency = $currency;
        $this->orderedProduct = $orderedProduct;
        $this->packageId = $packageId;
        $this->weight = $weight;
        $this->weightUom = $weightUom;
        $this->billingRef1 = $billingRef1;
        $this->billingRef2 = $billingRef2;
        $this->codAmount = $codAmount;
        $this->declaredValue = $declaredValue;
        $this->deliveryConfirmationNo = $deliveryConfirmationNo;
        $this->dgCategory = $dgCategory;
        $this->dimensionUom = $dimensionUom;
        $this->height = $height;
        $this->length = $length;
        $this->width = $width;
        $this->dutiesPaid = $dutiesPaid;
        $this->insuredValue = $insuredValue;
        $this->mailtype = $mailtype;
        $this->packageDesc = $packageDesc;
        $this->packageRefName = $packageRefName;
        $this->service = $service;
        $this->serviceEndorsement = $serviceEndorsement;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return string
     */
    public function getOrderedProduct()
    {
        return $this->orderedProduct;
    }

    /**
     * @return string
     */
    public function getPackageId()
    {
        return $this->packageId;
    }

    /**
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @return string
     */
    public function getWeightUom()
    {
        return $this->weightUom;
    }

    /**
     * @return string
     */
    public function getBillingRef1()
    {
        return $this->billingRef1;
    }

    /**
     * @return string
     */
    public function getBillingRef2()
    {
        return $this->billingRef2;
    }

    /**
     * @return float
     */
    public function getCodAmount()
    {
        return $this->codAmount;
    }

    /**
     * @return float
     */
    public function getDeclaredValue()
    {
        return $this->declaredValue;
    }

    /**
     * @return string
     */
    public function getDeliveryConfirmationNo()
    {
        return $this->deliveryConfirmationNo;
    }

    /**
     * @return string
     */
    public function getDgCategory()
    {
        return $this->dgCategory;
    }

    /**
     * @return string
     */
    public function getDimensionUom()
    {
        return $this->dimensionUom;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return string
     */
    public function getDutiesPaid()
    {
        return $this->dutiesPaid;
    }

    /**
     * @return float
     */
    public function getInsuredValue()
    {
        return $this->insuredValue;
    }

    /**
     * @return int
     */
    public function getMailtype()
    {
        return $this->mailtype;
    }

    /**
     * @return string
     */
    public function getPackageDesc()
    {
        return $this->packageDesc;
    }

    /**
     * @return string
     */
    public function getPackageRefName()
    {
        return $this->packageRefName;
    }

    /**
     * @return string
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @return int
     */
    public function getServiceEndorsement()
    {
        return $this->serviceEndorsement;
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

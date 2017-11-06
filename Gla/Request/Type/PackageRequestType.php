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
 * PackageRequestType.
 *
 * @category Dhl
 *
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 *
 * @link     http://www.netresearch.de/
 */
class PackageRequestType implements \JsonSerializable
{
    /**
     * Address of the consignee. Required.
     *
     * @var \Dhl\Shipping\Gla\Request\Type\ConsigneeAddressRequestType
     */
    private $consigneeAddress;

    /**
     * Details of one package. Required.
     *
     * @var \Dhl\Shipping\Gla\Request\Type\PackageDetailsRequestType
     */
    private $packageDetails;

    /**
     * Address of the returns (if different from shipper). Optional.
     *
     * @var \Dhl\Shipping\Gla\Request\Type\ReturnAddressRequestType
     */
    private $returnAddress;

    /**
     * Details for one or more customs commodities. Required if orderedProduct is an international product.
     *
     * @var \Dhl\Shipping\Gla\Request\Type\CustomsDetailsRequestType[]
     */
    private $customsDetails;

    /**
     * PackageRequestType constructor.
     *
     * @param ConsigneeAddressRequestType $consigneeAddress
     * @param PackageDetailsRequestType   $packageDetails
     * @param ReturnAddressRequestType    $returnAddress
     * @param CustomsDetailsRequestType[] $customsDetails
     */
    public function __construct(
        ConsigneeAddressRequestType $consigneeAddress,
        PackageDetailsRequestType $packageDetails,
        ReturnAddressRequestType $returnAddress = null,
        array $customsDetails = []
    ) {
        $this->consigneeAddress = $consigneeAddress;
        $this->packageDetails = $packageDetails;
        $this->returnAddress = $returnAddress;
        $this->customsDetails = $customsDetails;
    }

    /**
     * @return \Dhl\Shipping\Gla\Request\Type\ConsigneeAddressRequestType
     */
    public function getConsigneeAddress()
    {
        return $this->consigneeAddress;
    }

    /**
     * @return \Dhl\Shipping\Gla\Request\Type\PackageDetailsRequestType
     */
    public function getPackageDetails()
    {
        return $this->packageDetails;
    }

    /**
     * @return \Dhl\Shipping\Gla\Request\Type\ReturnAddressRequestType
     */
    public function getReturnAddress()
    {
        return $this->returnAddress;
    }

    /**
     * @return \Dhl\Shipping\Gla\Request\Type\CustomsDetailsRequestType[]
     */
    public function getCustomsDetails()
    {
        return $this->customsDetails;
    }

    /**
     * @return mixed[]
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

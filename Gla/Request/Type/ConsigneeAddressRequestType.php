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
 * @package   Dhl\Shipping\Webservice
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */

namespace Dhl\Shipping\Gla\Request\Type;

/**
 * ConsigneeAddressRequestType
 *
 * @category Dhl
 * @package  Dhl\Shipping\Webservice
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class ConsigneeAddressRequestType implements \JsonSerializable
{
    /**
     * Line 1 of the consignee's street address or delivery location. Required. 1-40 chars.
     *
     * @var string
     */
    private $address1;

    /**
     * Consignee's city. Required. 1-30 chars.
     *
     * @var string
     */
    private $city;

    /**
     * Two-character ISO consignee address country code. Required. 2 chars.
     *
     * @var string
     */
    private $country;

    /**
     * Consignee's phone number. Required. 1-80 chars.
     *
     * @var string
     */
    private $phone;

    /**
     * Line 2 of the consignee's street address or delivery location. Optional. 1-40 chars.
     *
     * @var string
     */
    private $address2;

    /**
     * Line 3 of the consignee's street address or delivery location. Optional. 1-40 chars.
     *
     * @var string
     */
    private $address3;

    /**
     * Name of the institution receiving the shipment. Optional. 1-30 chars.
     *
     * @var string
     */
    private $companyName;

    /**
     * Consignee's email address. Optional. 1-80 chars.
     *
     * @var string
     */
    private $email;

    /**
     * Consignee's identification number. Optional. 1-30 chars.
     *
     * @var string
     */
    private $idNumber;

    /**
     * Type of identification number. Provide if available for shipping to S. Korea and China. 2 chars.
     *
     * @var string
     */
    private $idType;

    /**
     * Name of the person receiving the shipment. Optional. 1-30 chars.
     *
     * @var string
     */
    private $name;

    /**
     * Consignee's postal code. Optional. 5-11 chars.
     *
     * @var string
     */
    private $postalCode;

    /**
     * Consignee's state, province or territory. Optional. 2-20 chars.
     *
     * @var string
     */
    private $state;

    /**
     * ConsigneeAddressRequestType constructor.
     * @param string $address1
     * @param string $city
     * @param string $country
     * @param string $phone
     * @param string $address2
     * @param string $address3
     * @param string $companyName
     * @param string $email
     * @param string $idNumber
     * @param string $idType
     * @param string $name
     * @param string $postalCode
     * @param string $state
     */
    public function __construct(
        $address1,
        $city,
        $country,
        $phone,
        $address2 = null,
        $address3 = null,
        $companyName = null,
        $email = null,
        $idNumber = null,
        $idType = null,
        $name = null,
        $postalCode = null,
        $state = null
    ) {
        $this->address1 = $address1;
        $this->city = $city;
        $this->country = $country;
        $this->phone = $phone;
        $this->address2 = $address2;
        $this->address3 = $address3;
        $this->companyName = $companyName;
        $this->email = $email;
        $this->idNumber = $idNumber;
        $this->idType = $idType;
        $this->name = $name;
        $this->postalCode = $postalCode;
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * @return string
     */
    public function getAddress3()
    {
        return $this->address3;
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getIdNumber()
    {
        return $this->idNumber;
    }

    /**
     * @return string
     */
    public function getIdType()
    {
        return $this->idType;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return string[]
     */
    function jsonSerialize()
    {
        $properties = get_object_vars($this);
        $properties = array_filter($properties, function ($value) {
            return !empty($value);
        });
        return $properties;
    }
}

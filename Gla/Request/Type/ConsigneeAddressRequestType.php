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
     * Consignee's city. Required. 1-30 chars.
     *
     * @var string
     */
    private $city;

    /**
     * Name of the institution receiving the shipment. Optional. 1-30 chars.
     *
     * @var string
     */
    private $companyName;

    /**
     * Two-character ISO consignee address country code. Required. 2 chars.
     *
     * @var string
     */
    private $country;

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
     * Consignee's phone number. Required. 1-80 chars.
     *
     * @var string
     */
    private $phone;

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
     * @param string $address2
     * @param string $address3
     * @param string $city
     * @param string $companyName
     * @param string $country
     * @param string $email
     * @param string $idNumber
     * @param string $idType
     * @param string $name
     * @param string $phone
     * @param string $postalCode
     * @param string $state
     */
    public function __construct(
        $address1,
        $address2,
        $address3,
        $city,
        $companyName,
        $country,
        $email,
        $idNumber,
        $idType,
        $name,
        $phone,
        $postalCode,
        $state
    ) {
        $this->address1 = $address1;
        $this->address2 = $address2;
        $this->address3 = $address3;
        $this->city = $city;
        $this->companyName = $companyName;
        $this->country = $country;
        $this->email = $email;
        $this->idNumber = $idNumber;
        $this->idType = $idType;
        $this->name = $name;
        $this->phone = $phone;
        $this->postalCode = $postalCode;
        $this->state = $state;
    }

    /**
     * @return string[]
     */
    function jsonSerialize()
    {
        return get_object_vars($this);
    }
}

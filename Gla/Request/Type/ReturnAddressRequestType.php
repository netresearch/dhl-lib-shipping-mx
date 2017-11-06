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
 * ReturnAddressRequestType.
 *
 * @category Dhl
 *
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 *
 * @link     http://www.netresearch.de/
 */
class ReturnAddressRequestType implements \JsonSerializable
{
    /**
     * Line 1 of the return street address. Required. 1-40 chars.
     *
     * @var string
     */
    private $address1;

    /**
     * Return city. Required. 1-30 chars.
     *
     * @var string
     */
    private $city;

    /**
     * Two-character ISO return address country code. Required. 2 chars.
     *
     * @var string
     */
    private $country;

    /**
     * Return state, province or territory. Required. 2-20 chars.
     *
     * @var string
     */
    private $state;

    /**
     * Line 2 of the return street address. Optional. 1-40 chars.
     *
     * @var string
     */
    private $address2;

    /**
     * Line 3 of the return street address (international only). Optional. 1-40 chars.
     *
     * @var string
     */
    private $address3;

    /**
     * Name of the institution receiving the returned package. Optional. 1-30 chars.
     *
     * @var string
     */
    private $companyName;

    /**
     * Name of the person receiving the returned package. Optional. 1-30 chars.
     *
     * @var string
     */
    private $name;

    /**
     * Return postal code. Optional. 5-11 chars.
     *
     * @var string
     */
    private $postalCode;

    /**
     * ReturnAddressRequestType constructor.
     *
     * @param string $address1
     * @param string $city
     * @param string $country
     * @param string $state
     * @param string $address2
     * @param string $address3
     * @param string $companyName
     * @param string $name
     * @param string $postalCode
     */
    public function __construct(
        $address1,
        $city,
        $country,
        $state,
        $address2 = null,
        $address3 = null,
        $companyName = null,
        $name = null,
        $postalCode = null
    ) {
        $this->address1 = $address1;
        $this->city = $city;
        $this->country = $country;
        $this->state = $state;
        $this->address2 = $address2;
        $this->address3 = $address3;
        $this->companyName = $companyName;
        $this->name = $name;
        $this->postalCode = $postalCode;
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
    public function getState()
    {
        return $this->state;
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

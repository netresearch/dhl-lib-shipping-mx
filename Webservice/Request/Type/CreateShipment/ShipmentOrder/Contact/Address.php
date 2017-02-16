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

namespace Dhl\Versenden\Webservice\Request\Type\CreateShipment\ShipmentOrder\Contact;

use \Dhl\Versenden\Api\Data\Webservice\Request\Type\CreateShipment\ShipmentOrder\Contact\AddressInterface;

/**
 * Platform independent shipment order contact address details
 *
 * @category Dhl
 * @package  Dhl\Versenden\Api
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class Address implements AddressInterface
{
    /**
     * @var string
     */
    private $street;

    /**
     * @var string
     */
    private $streetName;

    /**
     * @var string
     */
    private $streetNumber;

    /**
     * @var string
     */
    private $addressAddition;

    /**
     * @var string
     */
    private $postalCode;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $countryCode;

    /**
     * @var string
     */
    private $dispatchingInformation;

    /**
     * Address constructor.
     *
     * @param string $street
     * @param string $streetName
     * @param string $streetNumber
     * @param string $addressAddition
     * @param string $postalCode
     * @param string $city
     * @param string $state
     * @param string $countryCode
     * @param string $dispatchingInformation
     */
    public function __construct(
        $street,
        $streetName,
        $streetNumber,
        $addressAddition,
        $postalCode,
        $city,
        $state,
        $countryCode,
        $dispatchingInformation
    ) {
        $this->street                 = $street;
        $this->streetName             = $streetName;
        $this->streetNumber           = $streetNumber;
        $this->addressAddition        = $addressAddition;
        $this->postalCode             = $postalCode;
        $this->city                   = $city;
        $this->state                  = $state;
        $this->countryCode            = $countryCode;
        $this->dispatchingInformation = $dispatchingInformation;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Street (name part)
     *
     * @see getStreet()
     * @return string
     */
    public function getStreetName()
    {
        return $this->streetName;
    }

    /**
     * Street (number part)
     *
     * @see getStreet()
     * @return string
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * Street (additional information)
     *
     * @see getStreet()
     * @return string
     */
    public function getAddressAddition()
    {
        return $this->addressAddition;
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
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Obtain country's ISO-2-Alpha code.
     *
     * @return mixed
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @return string
     */
    public function getDispatchingInformation()
    {
        return $this->dispatchingInformation;
    }
}

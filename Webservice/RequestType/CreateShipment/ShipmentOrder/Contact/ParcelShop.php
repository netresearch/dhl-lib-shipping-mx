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
 * @package   Dhl\Shipping\Webservice
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2018 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrder\Contact;

/**
 * Platform independent shipment order receiver parcel shop details
 *
 * @package  Dhl\Shipping\Webservice
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class ParcelShop implements ParcelShopInterface
{
    /**
     * @var string
     */
    private $parcelShopNumber;

    /**
     * @var string
     */
    private $zip;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $countryCode;

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
    private $country;

    /**
     * @var string
     */
    private $state;

    /**
     * ParcelShop constructor.
     * @param string $parcelShopNumber
     * @param string $zip
     * @param string $city
     * @param string $countryCode
     * @param string $streetName
     * @param string $streetNumber
     * @param string $country
     * @param string $state
     */
    public function __construct(
        $parcelShopNumber,
        $zip,
        $city,
        $countryCode,
        $streetName = '',
        $streetNumber = '',
        $country = '',
        $state = ''
    ) {
        $this->parcelShopNumber = $parcelShopNumber;
        $this->zip = $zip;
        $this->city = $city;
        $this->countryCode = $countryCode;
        $this->streetName = $streetName;
        $this->streetNumber = $streetNumber;
        $this->country = $country;
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getParcelShopNumber()
    {
        return $this->parcelShopNumber;
    }

    /**
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
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
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @return string
     */
    public function getStreetName()
    {
        return $this->streetName;
    }

    /**
     * @return string
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
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
}

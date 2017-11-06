<?php

namespace Dhl\Shipping\Bcs;

class ParcelShopType
{
    /**
     * @var parcelShopNumber
     */
    protected $parcelShopNumber = null;

    /**
     * @var streetName
     */
    protected $streetName = null;

    /**
     * @var streetNumber
     */
    protected $streetNumber = null;

    /**
     * @var ZipType
     */
    protected $zip = null;

    /**
     * @var city
     */
    protected $city = null;

    /**
     * @var CountryType
     */
    protected $Origin = null;

    /**
     * @param parcelShopNumber $parcelShopNumber
     * @param ZipType          $zip
     * @param city             $city
     * @param CountryType      $Origin
     */
    public function __construct($parcelShopNumber, $zip, $city, $Origin)
    {
        $this->parcelShopNumber = $parcelShopNumber;
        $this->zip = $zip;
        $this->city = $city;
        $this->Origin = $Origin;
    }

    /**
     * @return parcelShopNumber
     */
    public function getParcelShopNumber()
    {
        return $this->parcelShopNumber;
    }

    /**
     * @param parcelShopNumber $parcelShopNumber
     *
     * @return \Dhl\Shipping\Bcs\ParcelShopType
     */
    public function setParcelShopNumber($parcelShopNumber)
    {
        $this->parcelShopNumber = $parcelShopNumber;

        return $this;
    }

    /**
     * @return streetName
     */
    public function getStreetName()
    {
        return $this->streetName;
    }

    /**
     * @param streetName $streetName
     *
     * @return \Dhl\Shipping\Bcs\ParcelShopType
     */
    public function setStreetName($streetName)
    {
        $this->streetName = $streetName;

        return $this;
    }

    /**
     * @return streetNumber
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * @param streetNumber $streetNumber
     *
     * @return \Dhl\Shipping\Bcs\ParcelShopType
     */
    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;

        return $this;
    }

    /**
     * @return ZipType
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param ZipType $zip
     *
     * @return \Dhl\Shipping\Bcs\ParcelShopType
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * @return city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param city $city
     *
     * @return \Dhl\Shipping\Bcs\ParcelShopType
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return CountryType
     */
    public function getOrigin()
    {
        return $this->Origin;
    }

    /**
     * @param CountryType $Origin
     *
     * @return \Dhl\Shipping\Bcs\ParcelShopType
     */
    public function setOrigin($Origin)
    {
        $this->Origin = $Origin;

        return $this;
    }
}

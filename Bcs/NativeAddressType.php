<?php

namespace Dhl\Shipping\Bcs;

class NativeAddressType
{
    /**
     * @var streetName
     */
    protected $streetName = null;

    /**
     * @var streetNumber
     */
    protected $streetNumber = null;

    /**
     * @var addressAddition[]
     */
    protected $addressAddition = null;

    /**
     * @var dispatchingInformation
     */
    protected $dispatchingInformation = null;

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
     * @param streetName   $streetName
     * @param streetNumber $streetNumber
     * @param ZipType      $zip
     * @param city         $city
     * @param CountryType  $Origin
     */
    public function __construct($streetName, $streetNumber, $zip, $city, $Origin)
    {
        $this->streetName = $streetName;
        $this->streetNumber = $streetNumber;
        $this->zip = $zip;
        $this->city = $city;
        $this->Origin = $Origin;
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
     * @return \Dhl\Shipping\Bcs\NativeAddressType
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
     * @return \Dhl\Shipping\Bcs\NativeAddressType
     */
    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;

        return $this;
    }

    /**
     * @return addressAddition[]
     */
    public function getAddressAddition()
    {
        return $this->addressAddition;
    }

    /**
     * @param addressAddition[] $addressAddition
     *
     * @return \Dhl\Shipping\Bcs\NativeAddressType
     */
    public function setAddressAddition(array $addressAddition = null)
    {
        $this->addressAddition = $addressAddition;

        return $this;
    }

    /**
     * @return dispatchingInformation
     */
    public function getDispatchingInformation()
    {
        return $this->dispatchingInformation;
    }

    /**
     * @param dispatchingInformation $dispatchingInformation
     *
     * @return \Dhl\Shipping\Bcs\NativeAddressType
     */
    public function setDispatchingInformation($dispatchingInformation)
    {
        $this->dispatchingInformation = $dispatchingInformation;

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
     * @return \Dhl\Shipping\Bcs\NativeAddressType
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
     * @return \Dhl\Shipping\Bcs\NativeAddressType
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
     * @return \Dhl\Shipping\Bcs\NativeAddressType
     */
    public function setOrigin($Origin)
    {
        $this->Origin = $Origin;

        return $this;
    }
}

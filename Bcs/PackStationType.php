<?php

namespace Dhl\Shipping\Bcs;

class PackStationType
{
    /**
     * @var postNumber
     */
    protected $postNumber = null;

    /**
     * @var packstationNumber
     */
    protected $packstationNumber = null;

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
     * @param packstationNumber $packstationNumber
     * @param ZipType           $zip
     * @param city              $city
     * @param CountryType       $Origin
     */
    public function __construct($packstationNumber, $zip, $city, $Origin)
    {
        $this->packstationNumber = $packstationNumber;
        $this->zip = $zip;
        $this->city = $city;
        $this->Origin = $Origin;
    }

    /**
     * @return postNumber
     */
    public function getPostNumber()
    {
        return $this->postNumber;
    }

    /**
     * @param postNumber $postNumber
     *
     * @return \Dhl\Shipping\Bcs\PackStationType
     */
    public function setPostNumber($postNumber)
    {
        $this->postNumber = $postNumber;

        return $this;
    }

    /**
     * @return packstationNumber
     */
    public function getPackstationNumber()
    {
        return $this->packstationNumber;
    }

    /**
     * @param packstationNumber $packstationNumber
     *
     * @return \Dhl\Shipping\Bcs\PackStationType
     */
    public function setPackstationNumber($packstationNumber)
    {
        $this->packstationNumber = $packstationNumber;

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
     * @return \Dhl\Shipping\Bcs\PackStationType
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
     * @return \Dhl\Shipping\Bcs\PackStationType
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
     * @return \Dhl\Shipping\Bcs\PackStationType
     */
    public function setOrigin($Origin)
    {
        $this->Origin = $Origin;

        return $this;
    }
}

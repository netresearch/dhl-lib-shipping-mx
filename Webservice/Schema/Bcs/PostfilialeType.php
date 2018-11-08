<?php

namespace Dhl\Shipping\Webservice\Schema\Bcs;

/**
 * Class PostfilialeType
 */
class PostfilialeType
{

    /**
     * @var postfilialNumber $postfilialNumber
     */
    protected $postfilialNumber;

    /**
     * @var postNumber $postNumber
     */
    protected $postNumber;

    /**
     * @var ZipType $zip
     */
    protected $zip;

    /**
     * @var city $city
     */
    protected $city;

    /**
     * @var CountryType $Origin
     */
    protected $Origin;

    /**
     * @param postfilialNumber $postfilialNumber
     * @param postNumber       $postNumber
     * @param ZipType          $zip
     * @param city             $city
     * @param CountryType      $Origin
     */
    public function __construct($postfilialNumber, $postNumber, $zip, $city, $Origin)
    {
        $this->postfilialNumber = $postfilialNumber;
        $this->postNumber = $postNumber;
        $this->zip = $zip;
        $this->city = $city;
        $this->Origin = $Origin;
    }

    /**
     * @return postfilialNumber
     */
    public function getPostfilialNumber()
    {
        return $this->postfilialNumber;
    }

    /**
     * @param postfilialNumber $postfilialNumber
     *
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\PostfilialeType
     */
    public function setPostfilialNumber($postfilialNumber)
    {
        $this->postfilialNumber = $postfilialNumber;
        return $this;
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
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\PostfilialeType
     */
    public function setPostNumber($postNumber)
    {
        $this->postNumber = $postNumber;
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
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\PostfilialeType
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
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\PostfilialeType
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
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\PostfilialeType
     */
    public function setOrigin($Origin)
    {
        $this->Origin = $Origin;
        return $this;
    }

}

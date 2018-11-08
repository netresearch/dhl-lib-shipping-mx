<?php

namespace Dhl\Shipping\Webservice\Schema\Bcs;

/**
 * Class CountryType
 */
class CountryType
{

    /**
     * @var country $country
     */
    protected $country;

    /**
     * @var countryISOType $countryISOCode
     */
    protected $countryISOCode;

    /**
     * @var state $state
     */
    protected $state;

    /**
     * @param countryISOType $countryISOCode
     */
    public function __construct($countryISOCode)
    {
        $this->countryISOCode = $countryISOCode;
    }

    /**
     * @return country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param country $country
     *
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\CountryType
     */
    public function setCountry($country)
    {
        $this->country = $country;
        return $this;
    }

    /**
     * @return countryISOType
     */
    public function getCountryISOCode()
    {
        return $this->countryISOCode;
    }

    /**
     * @param countryISOType $countryISOCode
     *
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\CountryType
     */
    public function setCountryISOCode($countryISOCode)
    {
        $this->countryISOCode = $countryISOCode;
        return $this;
    }

    /**
     * @return state
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param state $state
     *
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\CountryType
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

}

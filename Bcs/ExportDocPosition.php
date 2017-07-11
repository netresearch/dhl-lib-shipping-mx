<?php

namespace Dhl\Shipping\Bcs;

class ExportDocPosition
{

    /**
     * @var string $description
     */
    private $description = null;

    /**
     * @var string $countryCodeOrigin
     */
    private $countryCodeOrigin = null;

    /**
     * @var string $customsTariffNumber
     */
    private $customsTariffNumber = null;

    /**
     * @var string $amount
     */
    private $amount = null;

    /**
     * @var string $netWeightInKG
     */
    private $netWeightInKG = null;

    /**
     * @var string $customsValue
     */
    private $customsValue = null;

    /**
     * @param string $description
     * @param string $countryCodeOrigin
     * @param string $customsTariffNumber
     * @param int $amount
     * @param float $netWeightInKG
     * @param float $customsValue
     */
    public function __construct(
        $description,
        $countryCodeOrigin,
        $customsTariffNumber,
        $amount,
        $netWeightInKG,
        $customsValue
    ) {
        $this->description = $description;
        $this->countryCodeOrigin = $countryCodeOrigin;
        $this->customsTariffNumber = $customsTariffNumber;
        $this->amount = $amount;
        $this->netWeightInKG = $netWeightInKG;
        $this->customsValue = $customsValue;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return \Dhl\Shipping\Bcs\ExportDocPosition
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCodeOrigin()
    {
        return $this->countryCodeOrigin;
    }

    /**
     * @param string $countryCodeOrigin
     * @return \Dhl\Shipping\Bcs\ExportDocPosition
     */
    public function setCountryCodeOrigin($countryCodeOrigin)
    {
        $this->countryCodeOrigin = $countryCodeOrigin;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomsTariffNumber()
    {
        return $this->customsTariffNumber;
    }

    /**
     * @param string $customsTariffNumber
     * @return \Dhl\Shipping\Bcs\ExportDocPosition
     */
    public function setCustomsTariffNumber($customsTariffNumber)
    {
        $this->customsTariffNumber = $customsTariffNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     * @return \Dhl\Shipping\Bcs\ExportDocPosition
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return float
     */
    public function getNetWeightInKG()
    {
        return $this->netWeightInKG;
    }

    /**
     * @param float $netWeightInKG
     * @return \Dhl\Shipping\Bcs\ExportDocPosition
     */
    public function setNetWeightInKG($netWeightInKG)
    {
        $this->netWeightInKG = $netWeightInKG;
        return $this;
    }

    /**
     * @return float
     */
    public function getCustomsValue()
    {
        return $this->customsValue;
    }

    /**
     * @param float $customsValue
     * @return \Dhl\Shipping\Bcs\ExportDocPosition
     */
    public function setCustomsValue($customsValue)
    {
        $this->customsValue = $customsValue;
        return $this;
    }

}

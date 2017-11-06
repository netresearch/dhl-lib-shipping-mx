<?php

namespace Dhl\Shipping\Bcs;

class ServiceconfigurationAdditionalInsurance
{
    /**
     * @var anonymous151
     */
    protected $active = null;

    /**
     * @var anonymous152
     */
    protected $insuranceAmount = null;

    /**
     * @param anonymous151 $active
     * @param anonymous152 $insuranceAmount
     */
    public function __construct($active, $insuranceAmount)
    {
        $this->active = $active;
        $this->insuranceAmount = $insuranceAmount;
    }

    /**
     * @return anonymous151
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param anonymous151 $active
     *
     * @return \Dhl\Shipping\Bcs\ServiceconfigurationAdditionalInsurance
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return anonymous152
     */
    public function getInsuranceAmount()
    {
        return $this->insuranceAmount;
    }

    /**
     * @param anonymous152 $insuranceAmount
     *
     * @return \Dhl\Shipping\Bcs\ServiceconfigurationAdditionalInsurance
     */
    public function setInsuranceAmount($insuranceAmount)
    {
        $this->insuranceAmount = $insuranceAmount;

        return $this;
    }
}

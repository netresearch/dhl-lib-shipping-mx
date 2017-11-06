<?php

namespace Dhl\Shipping\Bcs;

class ShipmentItemType
{
    /**
     * @var weightInKG
     */
    protected $weightInKG = null;

    /**
     * @var lengthInCM
     */
    protected $lengthInCM = null;

    /**
     * @var widthInCM
     */
    protected $widthInCM = null;

    /**
     * @var heightInCM
     */
    protected $heightInCM = null;

    /**
     * @param weightInKG $weightInKG
     */
    public function __construct($weightInKG)
    {
        $this->weightInKG = $weightInKG;
    }

    /**
     * @return weightInKG
     */
    public function getWeightInKG()
    {
        return $this->weightInKG;
    }

    /**
     * @param weightInKG $weightInKG
     *
     * @return \Dhl\Shipping\Bcs\ShipmentItemType
     */
    public function setWeightInKG($weightInKG)
    {
        $this->weightInKG = $weightInKG;

        return $this;
    }

    /**
     * @return lengthInCM
     */
    public function getLengthInCM()
    {
        return $this->lengthInCM;
    }

    /**
     * @param lengthInCM $lengthInCM
     *
     * @return \Dhl\Shipping\Bcs\ShipmentItemType
     */
    public function setLengthInCM($lengthInCM)
    {
        $this->lengthInCM = $lengthInCM;

        return $this;
    }

    /**
     * @return widthInCM
     */
    public function getWidthInCM()
    {
        return $this->widthInCM;
    }

    /**
     * @param widthInCM $widthInCM
     *
     * @return \Dhl\Shipping\Bcs\ShipmentItemType
     */
    public function setWidthInCM($widthInCM)
    {
        $this->widthInCM = $widthInCM;

        return $this;
    }

    /**
     * @return heightInCM
     */
    public function getHeightInCM()
    {
        return $this->heightInCM;
    }

    /**
     * @param heightInCM $heightInCM
     *
     * @return \Dhl\Shipping\Bcs\ShipmentItemType
     */
    public function setHeightInCM($heightInCM)
    {
        $this->heightInCM = $heightInCM;

        return $this;
    }
}

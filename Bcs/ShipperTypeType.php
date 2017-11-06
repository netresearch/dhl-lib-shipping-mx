<?php

namespace Dhl\Shipping\Bcs;

class ShipperTypeType
{
    /**
     * @var NameType
     */
    protected $Name = null;

    /**
     * @var NativeAddressType
     */
    protected $Address = null;

    /**
     * @var CommunicationType
     */
    protected $Communication = null;

    /**
     * @param NameType          $Name
     * @param NativeAddressType $Address
     * @param CommunicationType $Communication
     */
    public function __construct($Name, $Address, $Communication)
    {
        $this->Name = $Name;
        $this->Address = $Address;
        $this->Communication = $Communication;
    }

    /**
     * @return NameType
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param NameType $Name
     *
     * @return \Dhl\Shipping\Bcs\ShipperTypeType
     */
    public function setName($Name)
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * @return NativeAddressType
     */
    public function getAddress()
    {
        return $this->Address;
    }

    /**
     * @param NativeAddressType $Address
     *
     * @return \Dhl\Shipping\Bcs\ShipperTypeType
     */
    public function setAddress($Address)
    {
        $this->Address = $Address;

        return $this;
    }

    /**
     * @return CommunicationType
     */
    public function getCommunication()
    {
        return $this->Communication;
    }

    /**
     * @param CommunicationType $Communication
     *
     * @return \Dhl\Shipping\Bcs\ShipperTypeType
     */
    public function setCommunication($Communication)
    {
        $this->Communication = $Communication;

        return $this;
    }
}

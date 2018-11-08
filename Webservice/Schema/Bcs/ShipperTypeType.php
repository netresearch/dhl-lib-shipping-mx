<?php

namespace Dhl\Shipping\Webservice\Schema\Bcs;

/**
 * Class ShipperTypeType
 */
class ShipperTypeType
{

    /**
     * @var NameType $Name
     */
    protected $Name;

    /**
     * @var NativeAddressType $Address
     */
    protected $Address;

    /**
     * @var CommunicationType $Communication
     */
    protected $Communication;

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
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\ShipperTypeType
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
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\ShipperTypeType
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
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\ShipperTypeType
     */
    public function setCommunication($Communication)
    {
        $this->Communication = $Communication;
        return $this;
    }

}

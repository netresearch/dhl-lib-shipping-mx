<?php

namespace Dhl\Shipping\Bcs;

class ShipperType extends ShipperTypeType
{
    /**
     * @param NameType          $Name
     * @param NativeAddressType $Address
     * @param CommunicationType $Communication
     */
    public function __construct($Name, $Address, $Communication)
    {
        parent::__construct($Name, $Address, $Communication);
    }
}

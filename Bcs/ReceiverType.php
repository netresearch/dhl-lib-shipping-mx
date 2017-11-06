<?php

namespace Dhl\Shipping\Bcs;

class ReceiverType extends ReceiverTypeType
{
    /**
     * @param name1                     $name1
     * @param ReceiverNativeAddressType $Address
     * @param PackStationType           $Packstation
     * @param PostfilialeType           $Postfiliale
     * @param ParcelShopType            $ParcelShop
     * @param CommunicationType         $Communication
     */
    public function __construct($name1, $Address, $Packstation, $Postfiliale, $ParcelShop, $Communication)
    {
        parent::__construct($name1, $Address, $Packstation, $Postfiliale, $ParcelShop, $Communication);
    }
}

<?php

namespace Dhl\Shipping\Bcs;

class ShipmentNotificationType
{
    /**
     * @var recipientEmailAddress
     */
    protected $recipientEmailAddress = null;

    /**
     * @param recipientEmailAddress $recipientEmailAddress
     */
    public function __construct($recipientEmailAddress)
    {
        $this->recipientEmailAddress = $recipientEmailAddress;
    }

    /**
     * @return recipientEmailAddress
     */
    public function getRecipientEmailAddress()
    {
        return $this->recipientEmailAddress;
    }

    /**
     * @param recipientEmailAddress $recipientEmailAddress
     *
     * @return \Dhl\Shipping\Bcs\ShipmentNotificationType
     */
    public function setRecipientEmailAddress($recipientEmailAddress)
    {
        $this->recipientEmailAddress = $recipientEmailAddress;

        return $this;
    }
}

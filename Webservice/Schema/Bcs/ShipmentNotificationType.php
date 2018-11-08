<?php

namespace Dhl\Shipping\Webservice\Schema\Bcs;

/**
 * Class ShipmentNotificationType
 */
class ShipmentNotificationType
{

    /**
     * @var recipientEmailAddress $recipientEmailAddress
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
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\ShipmentNotificationType
     */
    public function setRecipientEmailAddress($recipientEmailAddress)
    {
        $this->recipientEmailAddress = $recipientEmailAddress;
        return $this;
    }

}

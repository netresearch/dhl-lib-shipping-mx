<?php

namespace Dhl\Shipping\Bcs;

class CommunicationType
{
    /**
     * @var phone
     */
    protected $phone = null;

    /**
     * @var email
     */
    protected $email = null;

    /**
     * @var contactPerson
     */
    protected $contactPerson = null;

    public function __construct()
    {
    }

    /**
     * @return phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param phone $phone
     *
     * @return \Dhl\Shipping\Bcs\CommunicationType
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param email $email
     *
     * @return \Dhl\Shipping\Bcs\CommunicationType
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return contactPerson
     */
    public function getContactPerson()
    {
        return $this->contactPerson;
    }

    /**
     * @param contactPerson $contactPerson
     *
     * @return \Dhl\Shipping\Bcs\CommunicationType
     */
    public function setContactPerson($contactPerson)
    {
        $this->contactPerson = $contactPerson;

        return $this;
    }
}

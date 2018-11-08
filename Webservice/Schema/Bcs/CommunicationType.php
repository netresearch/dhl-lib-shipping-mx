<?php

namespace Dhl\Shipping\Webservice\Schema\Bcs;

/**
 * Class CommunicationType
 */
class CommunicationType
{

    /**
     * @var phone $phone
     */
    protected $phone;

    /**
     * @var email $email
     */
    protected $email;

    /**
     * @var contactPerson $contactPerson
     */
    protected $contactPerson;


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
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\CommunicationType
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
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\CommunicationType
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
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\CommunicationType
     */
    public function setContactPerson($contactPerson)
    {
        $this->contactPerson = $contactPerson;
        return $this;
    }

}

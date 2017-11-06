<?php

namespace Dhl\Shipping\Bcs;

class Ident
{
    /**
     * @var surname
     */
    protected $surname = null;

    /**
     * @var givenName
     */
    protected $givenName = null;

    /**
     * @var dateOfBirth
     */
    protected $dateOfBirth = null;

    /**
     * @var minimumAge
     */
    protected $minimumAge = null;

    /**
     * @param surname     $surname
     * @param givenName   $givenName
     * @param dateOfBirth $dateOfBirth
     * @param minimumAge  $minimumAge
     */
    public function __construct($surname, $givenName, $dateOfBirth, $minimumAge)
    {
        $this->surname = $surname;
        $this->givenName = $givenName;
        $this->dateOfBirth = $dateOfBirth;
        $this->minimumAge = $minimumAge;
    }

    /**
     * @return surname
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param surname $surname
     *
     * @return \Dhl\Shipping\Bcs\Ident
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * @return givenName
     */
    public function getGivenName()
    {
        return $this->givenName;
    }

    /**
     * @param givenName $givenName
     *
     * @return \Dhl\Shipping\Bcs\Ident
     */
    public function setGivenName($givenName)
    {
        $this->givenName = $givenName;

        return $this;
    }

    /**
     * @return dateOfBirth
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * @param dateOfBirth $dateOfBirth
     *
     * @return \Dhl\Shipping\Bcs\Ident
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * @return minimumAge
     */
    public function getMinimumAge()
    {
        return $this->minimumAge;
    }

    /**
     * @param minimumAge $minimumAge
     *
     * @return \Dhl\Shipping\Bcs\Ident
     */
    public function setMinimumAge($minimumAge)
    {
        $this->minimumAge = $minimumAge;

        return $this;
    }
}

<?php
/**
 * Dhl Shipping
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to
 * newer versions in the future.
 *
 * PHP version 7
 *
 * @category  Dhl
 * @package   Dhl\Shipping\Model
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Shipping\Model\ShippingInfo\Receiver;

use \Dhl\Shipping\Api\Data\ShippingInfo\Receiver\ContactInterface;

/**
 * Contact
 *
 * @category Dhl
 * @package  Dhl\Shipping\Model
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class Contact implements ContactInterface, \JsonSerializable
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $company;

    /**
     * @var string
     */
    private $nameAddition;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $contactPerson;

    /**
     * Contact constructor.
     * @param string $name
     * @param string $company
     * @param string $nameAddition
     * @param string $phone
     * @param string $email
     * @param string $contactPerson
     */
    public function __construct(
        $name,
        $company = '',
        $nameAddition = '',
        $phone = '',
        $email = '',
        $contactPerson = ''
    ) {
        $this->name = $name;
        $this->company = $company;
        $this->nameAddition = $nameAddition;
        $this->phone = $phone;
        $this->email = $email;
        $this->contactPerson = $contactPerson;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @return string
     */
    public function getNameAddition()
    {
        return $this->nameAddition;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getContactPerson()
    {
        return $this->contactPerson;
    }

    /**
     * @return string[]
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}

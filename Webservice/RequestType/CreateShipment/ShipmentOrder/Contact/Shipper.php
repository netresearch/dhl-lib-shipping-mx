<?php
/**
 * Dhl Shipping.
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
 *
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 *
 * @link      http://www.netresearch.de/
 */

namespace Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrder\Contact;

/**
 * Platform independent shipment order shipper details.
 *
 * @category Dhl
 *
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 *
 * @link     http://www.netresearch.de/
 */
class Shipper implements ShipperInterface
{
    /**
     * The shipper company name.
     *
     * @var string
     */
    private $companyName;

    /**
     * The shipper surname and given name. Currently not in use.
     *
     * @var string
     */
    private $name;

    /**
     * Any additional name info, such as second company line.
     *
     * @var string
     */
    private $nameAddition;

    /**
     * The shipper contact person surname and given name. Usually used by the
     * carrier to contact the shipper in case of fulfillment issues.
     *
     * @var string
     */
    private $contactPerson;

    /**
     * The shipper contact phone number. Usually used by the
     * carrier to contact the shipper in case of fulfillment issues.
     *
     * @var string
     */
    private $phone;

    /**
     * The shipper contact email address.
     *
     * @var string
     */
    private $email;

    /**
     * @var AddressInterface
     */
    private $address;

    /**
     * Shipper constructor.
     *
     * @param string           $companyName
     * @param string           $name
     * @param string           $nameAddition
     * @param string           $contactPerson
     * @param string           $phone
     * @param string           $email
     * @param AddressInterface $address
     */
    public function __construct(
        $companyName,
        $name,
        $nameAddition,
        $contactPerson,
        $phone,
        $email,
        AddressInterface $address
    ) {
        $this->companyName = $companyName;
        $this->name = $name;
        $this->nameAddition = $nameAddition;
        $this->contactPerson = $contactPerson;
        $this->phone = $phone;
        $this->email = $email;
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
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
    public function getNameAddition()
    {
        return $this->nameAddition;
    }

    /**
     * @return string
     */
    public function getContactPerson()
    {
        return $this->contactPerson;
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
     * @return AddressInterface
     */
    public function getAddress()
    {
        return $this->address;
    }
}

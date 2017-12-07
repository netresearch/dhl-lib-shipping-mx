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
 * @package   Dhl\Shipping
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrder\Contact;

/**
 * Platform independent shipment order receiver details
 *
 * @category Dhl
 * @package  Dhl\Shipping
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class Receiver implements ReceiverInterface
{
    /**
     * The receiver company name.
     *
     * @var string
     */
    private $companyName;

    /**
     * The receiver surname and given name.
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
     * The receiver contact person surname and given name. Usually used by the
     * carrier to contact the receiver in case of fulfillment issues.
     *
     * @var string
     */
    private $contactPerson;

    /**
     * The receiver contact phone number. Usually used by the
     * carrier to contact the receiver in case of fulfillment issues.
     *
     * @var string
     */
    private $phone;

    /**
     * The receiver contact email address.
     *
     * @var string
     */
    private $email;

    /**
     * @var AddressInterface
     */
    private $address;

    /**
     * @var IdCardInterface
     */
    private $identity;

    /**
     * @var PackstationInterface
     */
    private $packstation;

    /**
     * @var PostfilialeInterface
     */
    private $postfiliale;

    /**
     * @var ParcelShopInterface
     */
    private $parcelShop;

    /**
     * Receiver constructor.
     * @param $companyName
     * @param $name
     * @param $nameAddition
     * @param $contactPerson
     * @param $phone
     * @param $email
     * @param AddressInterface $address
     * @param IdCardInterface $identity
     * @param PackstationInterface|null $packstation
     * @param PostfilialeInterface|null $postfiliale
     * @param ParcelShopInterface|null $parcelShop
     */
    public function __construct(
        $companyName,
        $name,
        $nameAddition,
        $contactPerson,
        $phone,
        $email,
        AddressInterface $address,
        IdCardInterface $identity,
        PackstationInterface $packstation = null,
        PostfilialeInterface $postfiliale = null,
        ParcelShopInterface $parcelShop = null
    ) {
        $this->companyName = $companyName;
        $this->name = $name;
        $this->nameAddition = $nameAddition;
        $this->contactPerson = $contactPerson;
        $this->phone = $phone;
        $this->email = $email;
        $this->address = $address;
        $this->identity = $identity;
        $this->packstation = $packstation;
        $this->postfiliale = $postfiliale;
        $this->parcelShop = $parcelShop;
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

    /**
     * @return IdCardInterface
     */
    public function getId()
    {
        return $this->identity;
    }

    /**
     * @return PackstationInterface
     */
    public function getPackstation()
    {
        return $this->packstation;
    }

    /**
     * @return PostfilialeInterface
     */
    public function getPostfiliale()
    {
        return $this->postfiliale;
    }

    /**
     * @return ParcelShopInterface
     */
    public function getParcelShop()
    {
        return $this->parcelShop;
    }
}

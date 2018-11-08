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
 * @package   Dhl\Shipping\Model
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2018 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Shipping\Model\ShippingInfo;

use Dhl\Shipping\Api\Data\ShippingInfo\ReceiverInterface;
use Dhl\Shipping\Api\Data\ShippingInfo\Receiver\ContactInterface;
use Dhl\Shipping\Api\Data\ShippingInfo\Receiver\AddressInterface;
use Dhl\Shipping\Api\Data\ShippingInfo\Receiver\PackstationInterface;
use Dhl\Shipping\Api\Data\ShippingInfo\Receiver\ParcelShopInterface;
use Dhl\Shipping\Api\Data\ShippingInfo\Receiver\PostfilialeInterface;

/**
 * Receiver
 *
 * @package  Dhl\Shipping\Model
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class Receiver implements ReceiverInterface, \JsonSerializable
{
    /**
     * @var ContactInterface
     */
    private $contact;

    /**
     * @var AddressInterface
     */
    private $address;

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
     *
     * @param ContactInterface     $contact
     * @param AddressInterface     $address
     * @param PackstationInterface $packstation
     * @param PostfilialeInterface $postfiliale
     * @param ParcelShopInterface  $parcelShop
     */
    public function __construct(
        ContactInterface $contact,
        AddressInterface $address,
        PackstationInterface $packstation = null,
        PostfilialeInterface $postfiliale = null,
        ParcelShopInterface $parcelShop = null
    ) {
        $this->contact = $contact;
        $this->address = $address;
        $this->packstation = $packstation;
        $this->postfiliale = $postfiliale;
        $this->parcelShop = $parcelShop;
    }

    /**
     * @return ContactInterface
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @return AddressInterface
     */
    public function getAddress()
    {
        return $this->address;
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

    /**
     * @return string[]
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}

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
 * @package   Dhl\Shipping
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2018 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrder\Contact;

/**
 * Contact address details
 *
 * @package  Dhl\Shipping
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
interface AddressInterface
{
    /**
     * Full street
     * @return string[]
     */
    public function getStreet();

    /**
     * Street (name part)
     * @see getStreet()
     * @return string
     */
    public function getStreetName();

    /**
     * Street (number part)
     * @see getStreet()
     * @return string
     */
    public function getStreetNumber();

    /**
     * Street (additional information)
     * @see getStreet()
     * @return string
     */
    public function getAddressAddition();

    /**
     * @return string
     */
    public function getPostalCode();

    /**
     * @return string
     */
    public function getCity();

    /**
     * @return string
     */
    public function getState();

    /**
     * Obtain country's ISO-2-Alpha code.
     *
     * @return mixed
     */
    public function getCountryCode();

    /**
     * @return string
     */
    public function getDispatchingInformation();
}

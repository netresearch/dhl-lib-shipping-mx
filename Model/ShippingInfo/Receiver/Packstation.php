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

use \Dhl\Shipping\Api\Data\ShippingInfo\Receiver\PackstationInterface;

/**
 * Packstation
 *
 * @category Dhl
 * @package  Dhl\Shipping\Model
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class Packstation implements PackstationInterface, \JsonSerializable
{
    /**
     * @var string
     */
    private $packstationNumber;

    /**
     * @var string
     */
    private $zip;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $countryISOCode;

    /**
     * @var string
     */
    private $postNumber;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $state;

    /**
     * Packstation constructor.
     * @param string $packstationNumber
     * @param string $zip
     * @param string $city
     * @param string $countryISOCode
     * @param string $postNumber
     * @param string $country
     * @param string $state
     */
    public function __construct(
        $packstationNumber,
        $zip,
        $city,
        $countryISOCode,
        $postNumber = '',
        $country = '',
        $state = ''
    ) {
        $this->packstationNumber = $packstationNumber;
        $this->zip = $zip;
        $this->city = $city;
        $this->countryISOCode = $countryISOCode;
        $this->postNumber = $postNumber;
        $this->country = $country;
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getPackstationNumber()
    {
        return $this->packstationNumber;
    }

    /**
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getCountryISOCode()
    {
        return $this->countryISOCode;
    }

    /**
     * @return string
     */
    public function getPostNumber()
    {
        return $this->postNumber;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return string[]
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}

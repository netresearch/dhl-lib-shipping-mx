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

namespace Dhl\Shipping\Gla\Request\Type;

/**
 * ShipmentRequestType.
 *
 * @category Dhl
 *
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 *
 * @link     http://www.netresearch.de/
 */
class ShipmentRequestType implements \JsonSerializable
{
    /**
     * The DHL eCommerce pickup account number. Required. 5-10 chars.
     *
     * @var string
     */
    private $pickupAccount;

    /**
     * Primary DHL eCommerce Distribution center. Required. 6 chars.
     *
     * @var string
     */
    private $distributionCenter;

    /**
     * One or more packages. Required.
     *
     * @var \Dhl\Shipping\Gla\Request\Type\PackageRequestType[]
     */
    private $packages;

    /**
     * Customer defined number for identifying the consignment. Optional. 1-50 chars.
     *
     * @var string
     */
    private $consignmentNumber;

    /**
     * ShipmentRequestType constructor.
     *
     * @param string                                              $pickupAccount
     * @param string                                              $distributionCenter
     * @param \Dhl\Shipping\Gla\Request\Type\PackageRequestType[] $packages
     * @param string                                              $consignmentNumber
     */
    public function __construct(
        $pickupAccount,
        $distributionCenter,
        array $packages,
        $consignmentNumber = ''
    ) {
        $this->pickupAccount = $pickupAccount;
        $this->distributionCenter = $distributionCenter;
        $this->consignmentNumber = $consignmentNumber;
        $this->packages = $packages;
    }

    /**
     * @return string
     */
    public function getPickupAccount()
    {
        return $this->pickupAccount;
    }

    /**
     * @return string
     */
    public function getDistributionCenter()
    {
        return $this->distributionCenter;
    }

    /**
     * @return \Dhl\Shipping\Gla\Request\Type\PackageRequestType[]
     */
    public function getPackages()
    {
        return $this->packages;
    }

    /**
     * @return string
     */
    public function getConsignmentNumber()
    {
        return $this->consignmentNumber;
    }

    /**
     * @return mixed[]
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}

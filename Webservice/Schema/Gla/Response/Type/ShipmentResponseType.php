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
 * @package   Dhl\Shipping\Webservice
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2018 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */

namespace Dhl\Shipping\Webservice\Schema\Gla\Response\Type;

/**
 * ShipmentResponseType
 *
 * @package  Dhl\Shipping\Webservice
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class ShipmentResponseType
{
    /**
     * @var \Dhl\Shipping\Webservice\Schema\Gla\Response\Type\PackageResponseType[]
     */
    private $packages;

    /**
     * @return \Dhl\Shipping\Webservice\Schema\Gla\Response\Type\PackageResponseType[]
     */
    public function getPackages()
    {
        return $this->packages;
    }

    /**
     * @param \Dhl\Shipping\Webservice\Schema\Gla\Response\Type\PackageResponseType[] $packages
     */
    public function setPackages($packages)
    {
        $this->packages = $packages;
    }
}

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
namespace Dhl\Shipping\Service\Filter;

use \Dhl\Shipping\Service\BulkyGoods;
use \Dhl\Shipping\Service\Cod;
use \Dhl\Shipping\Service\Insurance;
use \Dhl\Shipping\Service\ParcelAnnouncement;
use \Dhl\Shipping\Service\PreferredDay;
use \Dhl\Shipping\Service\PreferredLocation;
use \Dhl\Shipping\Service\PreferredNeighbour;
use \Dhl\Shipping\Service\PreferredTime;
use \Dhl\Shipping\Service\PrintOnlyIfCodeable;
use \Dhl\Shipping\Service\ReturnShipment;
use \Dhl\Shipping\Service\ServiceInterface;
use \Dhl\Shipping\Service\VisualCheckOfAge;
use \Dhl\Shipping\Util\ShippingProducts;

/**
 * Product filter
 *
 *
 * @todo Create new solution taking into account global label api
 *
 * @category Dhl
 * @package  Dhl\Shipping\Service
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class ProductFilter implements FilterInterface
{
    /**
     * @var string[]
     */
    private $allowedServices = [
        ShippingProducts::CODE_NATIONAL => [
            BulkyGoods::CODE,
            Cod::CODE,
            Insurance::CODE,
            ParcelAnnouncement::CODE,
            PreferredLocation::CODE,
            PreferredNeighbour::CODE,
            PrintOnlyIfCodeable::CODE,
            ReturnShipment::CODE,
            VisualCheckOfAge::CODE,
            PreferredDay::CODE,
            PreferredTime::CODE
        ],
        ShippingProducts::CODE_CONNECT => [
            BulkyGoods::CODE,
            Insurance::CODE,
            ParcelAnnouncement::CODE,
            PrintOnlyIfCodeable::CODE,
            ReturnShipment::CODE,
        ],
        ShippingProducts::CODE_INTERNATIONAL => [
            BulkyGoods::CODE,
            Insurance::CODE,
            ParcelAnnouncement::CODE,
            PrintOnlyIfCodeable::CODE,
        ],
        ShippingProducts::CODE_EUROPAKET => [
            Insurance::CODE,
            ParcelAnnouncement::CODE,
            PrintOnlyIfCodeable::CODE,
        ],
        ShippingProducts::CODE_KURIER_TAGGLEICH => [
            Insurance::CODE,
            ParcelAnnouncement::CODE,
            PrintOnlyIfCodeable::CODE,
            ReturnShipment::CODE,
        ],
        ShippingProducts::CODE_KURIER_WUNSCHZEIT => [
            Insurance::CODE,
            ParcelAnnouncement::CODE,
            PrintOnlyIfCodeable::CODE,
            ReturnShipment::CODE,
        ],
        ShippingProducts::CODE_PAKET_AUSTRIA => [
            BulkyGoods::CODE,
            Cod::CODE,
            Insurance::CODE,
            ParcelAnnouncement::CODE,
            PrintOnlyIfCodeable::CODE,
            ReturnShipment::CODE,
        ],
        ShippingProducts::CODE_PAKET_CONNECT => [
            BulkyGoods::CODE,
            Cod::CODE,
            Insurance::CODE,
            ParcelAnnouncement::CODE,
            PrintOnlyIfCodeable::CODE,
            ReturnShipment::CODE,
        ],
        ShippingProducts::CODE_PAKET_INTERNATIONAL => [
            BulkyGoods::CODE,
            Insurance::CODE,
            ParcelAnnouncement::CODE,
            PrintOnlyIfCodeable::CODE,
        ],
    ];

    /**
     * @var string
     */
    private $productCode;

    /**
     * ProductFilter constructor.
     * @param $productCode
     */
    private function __construct($productCode)
    {
        $this->productCode = $productCode;
    }

    /**
     * @param ServiceInterface $service
     * @return bool
     */
    public function isAllowed(ServiceInterface $service)
    {
        return in_array($service->getCode(), $this->allowedServices[$this->productCode]);
    }

    /**
     * @param string $productCode
     * @return \Closure
     */
    public static function create($productCode)
    {
        return function (ServiceInterface $service) use ($productCode) {
            $filter = new static($productCode);
            return $filter->isAllowed($service);
        };
    }
}

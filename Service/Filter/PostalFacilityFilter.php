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
namespace Dhl\Shipping\Service\Filter;

use Dhl\Shipping\Api\Data\ServiceInterface;
use Dhl\Shipping\Service\Bcs\Cod;
use Dhl\Shipping\Service\Bcs\Insurance;
use Dhl\Shipping\Service\Bcs\ParcelAnnouncement;
use Dhl\Shipping\Service\Bcs\PrintOnlyIfCodeable;
use Dhl\Shipping\Service\Bcs\ReturnShipment;

/**
 * Check if the service can be selected with postal facility deliveries
 *
 * @package  Dhl\Shipping\Service
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class PostalFacilityFilter implements FilterInterface
{
    /**
     * @var string[]
     */
    private $postalFacilityServices = [
        Cod::CODE, // up to 1500 euro
        Insurance::CODE,
        ParcelAnnouncement::CODE,
        PrintOnlyIfCodeable::CODE,
        ReturnShipment::CODE,
    ];

    /**
     * @param ServiceInterface $service
     * @return bool
     */
    public function isAllowed(ServiceInterface $service)
    {
        return in_array($service->getCode(), $this->postalFacilityServices);
    }

    /**
     * @return \Closure
     */
    public static function create()
    {
        return function (ServiceInterface $service) {
            $filter = new static();
            return $filter->isAllowed($service);
        };
    }
}

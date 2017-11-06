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

namespace Dhl\Shipping\Service\Filter;

use Dhl\Shipping\Service\Cod;
use Dhl\Shipping\Service\Insurance;
use Dhl\Shipping\Service\ParcelAnnouncement;
use Dhl\Shipping\Service\PrintOnlyIfCodeable;
use Dhl\Shipping\Service\ReturnShipment;
use Dhl\Shipping\Service\ServiceInterface;

/**
 * PostalFacility filter.
 *
 * @category Dhl
 *
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 *
 * @link     http://www.netresearch.de/
 */
class PostalFacilityFilter implements FilterInterface
{
    /**
     * @var bool
     */
    private $isPostalFacility;

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
     * PostalFacilityFilter constructor.
     *
     * @param bool $isPostalFacility
     */
    private function __construct($isPostalFacility)
    {
        $this->isPostalFacility = $isPostalFacility;
    }

    /**
     * @param ServiceInterface $service
     *
     * @return bool
     */
    public function isAllowed(ServiceInterface $service)
    {
        if (!$this->isPostalFacility) {
            return true;
        }

        return in_array($service->getCode(), $this->postalFacilityServices);
    }

    /**
     * @param bool $isPostalFacility
     *
     * @return \Closure
     */
    public static function create($isPostalFacility = false)
    {
        return function (ServiceInterface $service) use ($isPostalFacility) {
            $filter = new static($isPostalFacility);

            return $filter->isAllowed($service);
        };
    }
}

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

use Dhl\Shipping\Service\ParcelAnnouncement;
use Dhl\Shipping\Service\PreferredDay;
use Dhl\Shipping\Service\PreferredLocation;
use Dhl\Shipping\Service\PreferredNeighbour;
use Dhl\Shipping\Service\PreferredTime;
use Dhl\Shipping\Service\ServiceInterface;

/**
 * CustomerSelection filter.
 *
 * @category Dhl
 *
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 *
 * @link     http://www.netresearch.de/
 */
class CustomerSelectionFilter implements FilterInterface
{
    /**
     * @var string[]
     */
    private $customerServices = [
        PreferredDay::CODE,
        PreferredTime::CODE,
        PreferredLocation::CODE,
        PreferredNeighbour::CODE,
        ParcelAnnouncement::CODE,
    ];

    /**
     * @var bool
     */
    private $isCustomerSelection;

    /**
     * CustomerSelectionFilter constructor.
     *
     * @param bool $isCustomerSelection
     */
    private function __construct($isCustomerSelection)
    {
        $this->isCustomerSelection = $isCustomerSelection;
    }

    /**
     * @param ServiceInterface $service
     *
     * @return bool
     */
    public function isAllowed(ServiceInterface $service)
    {
        if (!$this->isCustomerSelection) {
            return true;
        }

        return in_array($service->getCode(), $this->customerServices);
    }

    /**
     * @param bool $isCustomerSelection
     *
     * @return \Closure
     */
    public static function create($isCustomerSelection = false)
    {
        return function (ServiceInterface $service) use ($isCustomerSelection) {
            $filter = new static($isCustomerSelection);

            return $filter->isAllowed($service);
        };
    }
}

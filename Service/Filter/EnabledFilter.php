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

use \Dhl\Shipping\Service\ServiceInterface;

/**
 * MerchantSelection filter
 *
 * @category Dhl
 * @package  Dhl\Shipping\Service
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class EnabledFilter implements FilterInterface
{
    /**
     * @param ServiceInterface $service
     * @return bool
     */
    public function isAllowed(ServiceInterface $service)
    {
        return (bool)$service->getValue();
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

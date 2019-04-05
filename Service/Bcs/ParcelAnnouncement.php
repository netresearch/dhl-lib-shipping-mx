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

namespace Dhl\Shipping\Service\Bcs;

use Dhl\Shipping\Api\Data\ServiceInputInterface;
use Dhl\Shipping\Service\AbstractService;
use Dhl\Shipping\Util\ShippingRoutes\RoutesInterface;

/**
 * DHL Business Customer Shipping Parcel Announcement (Notification) Service
 *
 * @package  Dhl\Shipping\Service
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class ParcelAnnouncement extends AbstractService
{
    const CODE = 'parcelAnnouncement';

    /**
     * @var bool
     */
    protected $postalFacilitySupport = true;

    /**
     * Service can be booked on these routes.
     *
     * @var string[][]
     */
    protected $routes = [
        'DE' => [
            'included' => [RoutesInterface::REGION_INTERNATIONAL],
            'excluded' => [],
        ],
        'AT' => [
            'included' => [RoutesInterface::REGION_INTERNATIONAL],
            'excluded' => [],
        ],
    ];

    /**
     * Uses serviceInputBuilder to create custom ServiceInput array.
     *
     * The default implementation just creates a generic "enabled" checkbox.
     *
     * @return ServiceInputInterface[]
     */
    protected function createInputs()
    {
        $this->serviceInputBuilder->setCode('enabled');
        $this->serviceInputBuilder->setInputType(ServiceInputInterface::INPUT_TYPE_CHECKBOX);
        $this->serviceInputBuilder->setLabel('Parcel Announcement');
        $this->serviceInputBuilder->setTooltip($this->serviceConfig->getTooltip());
        $this->serviceInputBuilder->setInfoText($this->serviceConfig->getInfoText());
        $this->serviceInputBuilder->setValue('true');
        $this->serviceInputBuilder->setHasAsterisk($this->serviceConfig->hasAsterisk());

        return [$this->serviceInputBuilder->create()];
    }
}

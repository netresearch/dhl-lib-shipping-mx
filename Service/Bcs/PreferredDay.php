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

use Dhl\Shipping\Api\Data\Service\ServiceInputInterface;
use Dhl\Shipping\Service\AbstractService;
use Dhl\Shipping\Util\ShippingRoutes\RoutesInterface;

/**
 * DHL Business Customer Shipping Preferred Day Service
 *
 * @package  Dhl\Shipping\Service
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class PreferredDay extends AbstractService
{
    const CODE = 'preferredDay';

    const PROPERTY_DATE = 'date';

    /**
     * @var bool
     */
    protected $postalFacilitySupport = false;

    /**
     * Service can be booked on these routes.
     *
     * @var string[][]
     */
    protected $routes = [
        'DE' => [
            'included' => [RoutesInterface::COUNTRY_CODE_GERMANY],
            'excluded' => [],
        ],
    ];

    /**
     * @return ServiceInputInterface[]
     */
    protected function createInputs()
    {
        $this->serviceInputBuilder->setCode(self::PROPERTY_DATE);
        $this->serviceInputBuilder->setInputType(ServiceInputInterface::INPUT_TYPE_DATE);
        $this->serviceInputBuilder->setOptions($this->serviceConfig->getOptions());
        $this->serviceInputBuilder->setInfoText($this->serviceConfig->getInfoText());
        $this->serviceInputBuilder->setLabel('Preferred day: Delivery on your preferred day');
        $this->serviceInputBuilder->setTooltip(
            'Choose one of the displayed days as your preferred day for your parcel delivery. Other days are not possible due to delivery processes'
        );
        if (isset($this->serviceConfig->getProperties()[self::PROPERTY_DATE])) {
            $this->serviceInputBuilder->setValue($this->serviceConfig->getProperties()[self::PROPERTY_DATE]);
        }

        return [$this->serviceInputBuilder->create()];
    }

    /**
     * @return string
     */
    public function getDate()
    {
        $properties = $this->serviceConfig->getProperties();
        if (isset($properties[self::PROPERTY_DATE])) {
            return $properties[self::PROPERTY_DATE];
        }

        return '';
    }
}

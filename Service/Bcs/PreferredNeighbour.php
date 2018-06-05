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
 * DHL Business Customer Shipping Preferred Neighbour Service
 *
 * @package  Dhl\Shipping\Service
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class PreferredNeighbour extends AbstractService
{
    const CODE = 'preferredNeighbour';

    const PROPERTY_DETAILS = 'details';

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
        $this->serviceInputBuilder->setCode('details');
        $this->serviceInputBuilder->setInputType(ServiceInputInterface::INPUT_TYPE_TEXT);
        $this->serviceInputBuilder->setPlaceholder('Name, street and house number');
        $this->serviceInputBuilder->setValidationRules([
            'minLength' => 1,
            'maxLength' => 100,
        ]);
        $this->serviceInputBuilder->setLabel(__('Preferred Neighbor'));
        $this->serviceInputBuilder->setTooltip(
            __('Determine a person in your immediate neighborhood to whom we can hand out your parcel.
            This person should live in the same building, directly opposite, or next door.')
        );

        return [$this->serviceInputBuilder->create()];
    }

    /**
     * @return string
     */
    public function getSelectedValue()
    {
        return $this->getDetails();
    }

    /**
     * @return string
     */
    public function getDetails()
    {
        $properties = $this->serviceConfig->getProperties();
        if (isset($properties[self::PROPERTY_DETAILS])) {
            return $properties[self::PROPERTY_DETAILS];
        }

        return '';
    }
}

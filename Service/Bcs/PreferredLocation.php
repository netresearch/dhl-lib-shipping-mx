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

use Dhl\Shipping\Api\Data\Service\ServiceSettingsInterface;
use Dhl\Shipping\Api\Data\ServiceInterface;
use Dhl\Shipping\Util\ShippingRoutes\RoutesInterface;

/**
 * DHL Business Customer Shipping Preferred Location Service
 *
 * @package  Dhl\Shipping\Service
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class PreferredLocation implements ServiceInterface
{
    const CODE = 'preferredLocation';

    const PROPERTY_DETAILS = 'details';

    /**
     * @var bool
     */
    private $postalFacilitySupport = false;

    /**
     * Service can be booked on these routes.
     *
     * @var string[][]
     */
    private $routes = [
        'DE' => [
            'included' => [RoutesInterface::COUNTRY_CODE_GERMANY],
            'excluded' => [],
        ],
    ];

    /**
     * @var string[]
     */
    private $validationRules = [
        'minLength' => 1,
        'maxLength' => 100,
    ];

    /**
     * @var ServiceSettingsInterface
     */
    private $serviceConfig;

    /**
     * PreferredLocation constructor.
     * @param ServiceSettingsInterface $serviceConfig
     */
    public function __construct(ServiceSettingsInterface $serviceConfig)
    {
        $this->serviceConfig = $serviceConfig;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return self::CODE;
    }

    /**
     * Obtain service name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->serviceConfig->getName();
    }

    /**
     * @return string
     */
    public function getInputType()
    {
        return self::INPUT_TYPE_TEXT;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->serviceConfig->isEnabled();
    }

    /**
     * @return bool
     */
    public function isCustomerService()
    {
        return $this->serviceConfig->isCustomerService();
    }

    /**
     * @return bool
     */
    public function isMerchantService()
    {
        return $this->serviceConfig->isMerchantService();
    }

    /**
     * @return bool
     */
    public function isSelected()
    {
        return $this->serviceConfig->isSelected();
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

    /**
     * @return array
     */
    public function getOptions()
    {
        return [];
    }

    /**
     * Check if the service can be booked with postal facility deliveries.
     *
     * @return bool
     */
    public function isAvailableAtPostalFacility()
    {
        return $this->postalFacilitySupport;
    }

    /**
     * Obtain routes the service can be booked with.
     *
     * @return string[][]
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * Get Sort Order.
     *
     * @return int
     */
    public function getSortOrder()
    {
        return $this->serviceConfig->getSortOrder();
    }

    /**
     * @return string[]
     */
    public function getValidationRules()
    {
        return $this->validationRules;
    }
}

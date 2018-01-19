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
use Dhl\Shipping\Util\ShippingRoutes\RouteValidatorInterface;

/**
 * DHL Business Customer Shipping Visual Check Of Age Service
 *
 * @package  Dhl\Shipping\Service
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class VisualCheckOfAge implements ServiceInterface
{
    const CODE = 'visualCheckOfAge';

    const PROPERTY_AGE = 'age';

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
     * @var RouteValidatorInterface
     */
    private $routeValidator;

    /**
     * @var ServiceSettingsInterface
     */
    private $serviceConfig;

    /**
     * VisualCheckOfAge constructor.
     * @param RouteValidatorInterface $routeValidator
     * @param ServiceSettingsInterface $serviceConfig
     */
    public function __construct(
        RouteValidatorInterface $routeValidator,
        ServiceSettingsInterface $serviceConfig
    ) {
        $this->routeValidator = $routeValidator;
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
     * @return string
     */
    public function getInputType()
    {
        return self::INPUT_TYPE_SELECT;
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
    public function getAge()
    {
        $properties = $this->serviceConfig->getProperties();
        if (isset($properties[self::PROPERTY_AGE])) {
            return $properties[self::PROPERTY_AGE];
        }

        return '';
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->serviceConfig->getOptions();
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
     * Check if the service can be booked with the given route.
     *
     * @param string $originCountryId
     * @param string $destinationCountryId
     * @param string[] $euCountries
     * @return bool
     */
    public function canProcessRoute($originCountryId, $destinationCountryId, array $euCountries)
    {
        $canProcess = $this->routeValidator->isRouteSupported(
            $originCountryId,
            $destinationCountryId,
            $euCountries,
            $this->routes
        );

        return $canProcess;
    }
}

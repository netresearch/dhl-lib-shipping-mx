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
 * DHL Business Customer Shipping Additional Insurance Service
 *
 * @package  Dhl\Shipping\Service
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class Insurance implements ServiceInterface
{
    const CODE = 'additionalInsurance';

    const PROPERTY_AMOUNT = 'amount';
    const PROPERTY_CURRENCY_CODE = 'currency_code';

    /**
     * @var bool
     */
    private $postalFacilitySupport = true;

    /**
     * Service can be booked on these routes.
     *
     * @var string[][]
     */
    private $routes = [
        'DE' => [
            'included' => [RoutesInterface::REGION_INTERNATIONAL],
            'excluded' => [],
        ],
        'AT' => [
            'included' => [RoutesInterface::REGION_INTERNATIONAL],
            'excluded' => [],
        ]
    ];

    /**
     * @var string[]
     */
    private $validationRules = [];

    /**
     * @var ServiceSettingsInterface
     */
    private $serviceConfig;

    /**
     * Insurance constructor.
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
        // insurance amount is implicitly calculated from order amount
        return self::INPUT_TYPE_CHECKBOX;
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
     * @return mixed[]
     */
    public function getSelectedValue()
    {
        return [
            self::PROPERTY_AMOUNT => $this->getAmount(),
            self::PROPERTY_CURRENCY_CODE => $this->getCurrencyCode(),
        ];
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        $properties = $this->serviceConfig->getProperties();
        if (isset($properties[self::PROPERTY_AMOUNT])) {
            return (float) $properties[self::PROPERTY_AMOUNT];
        }

        return 0;
    }

    /**
     * @return string
     */
    public function getCurrencyCode()
    {
        $properties = $this->serviceConfig->getProperties();
        if (isset($properties[self::PROPERTY_CURRENCY_CODE])) {
            return $properties[self::PROPERTY_CURRENCY_CODE];
        }

        return 'EUR';
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

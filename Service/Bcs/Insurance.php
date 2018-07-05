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
 * DHL Business Customer Shipping Additional Insurance Service
 *
 * @package  Dhl\Shipping\Service
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class Insurance extends AbstractService
{
    const CODE = 'insurance';

    const PROPERTY_AMOUNT = 'amount';
    const PROPERTY_CURRENCY_CODE = 'currency_code';

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
     * @return ServiceInputInterface[]
     */
    protected function createInputs(): array
    {
        $this->serviceInputBuilder->setCode(self::PROPERTY_AMOUNT);
        $this->serviceInputBuilder->setInputType(ServiceInputInterface::INPUT_TYPE_NUMBER);
        if (isset($this->serviceConfig->getProperties()[self::PROPERTY_AMOUNT])) {
            $this->serviceInputBuilder->setValue($this->serviceConfig->getProperties()[self::PROPERTY_AMOUNT]);
        }
        $amountInput = $this->serviceInputBuilder->create();

        $this->serviceInputBuilder->setCode(self::PROPERTY_CURRENCY_CODE);
        $this->serviceInputBuilder->setInputType(ServiceInputInterface::INPUT_TYPE_TEXT);
        if (isset($this->serviceConfig->getProperties()[self::PROPERTY_CURRENCY_CODE])) {
            $this->serviceInputBuilder->setValue($this->serviceConfig->getProperties()[self::PROPERTY_CURRENCY_CODE]);
        }
        $currencyCodeInput = $this->serviceInputBuilder->create();
        return [$amountInput, $currencyCodeInput];
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        $properties = $this->serviceConfig->getProperties();
        if (isset($properties[self::PROPERTY_AMOUNT])) {
            return (float)$properties[self::PROPERTY_AMOUNT];
        }

        return 0;
    }

    /**
     * @return string
     */
    public function getCurrencyCode(): string
    {
        $properties = $this->serviceConfig->getProperties();
        if (isset($properties[self::PROPERTY_CURRENCY_CODE])) {
            return $properties[self::PROPERTY_CURRENCY_CODE];
        }

        return 'EUR';
    }
}

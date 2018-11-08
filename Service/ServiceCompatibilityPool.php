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
 * @package   Dhl\Shipping\Model
 * @author    Max Melzer <max.melzer@netresearch.de>
 * @copyright 2018 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Shipping\Service;

use Dhl\Shipping\Service\Bcs\PreferredLocation;
use Dhl\Shipping\Service\Bcs\PreferredNeighbour;

/**
 * Class ServiceCompatibilityPool.
 *
 * Holds compatibility information for different service combinations.
 *
 * @package Dhl\Shipping\Service
 */
class ServiceCompatibilityPool
{
    const KEY_TYPE    = 'type';
    const KEY_SUBJECT = 'subject';

    const TYPE_EXCLUSIVE = 'exclusive';
    const TYPE_INCLUSIVE = 'inclusive';

    /**
     * @var string[][]
     */
    private $rules = [
        [
            self::KEY_TYPE    => self::TYPE_EXCLUSIVE,
            self::KEY_SUBJECT => [
                PreferredLocation::CODE,
                PreferredNeighbour::CODE,
            ],
        ],
    ];

    /**
     * For now, this method returns a static list of rules.
     * When it becomes neccessary, the rule list should be collected dynamically.
     *
     * @param string $countryId
     * @param string $storeId
     *
     * @return string[]|ServiceCompatibilityInterface
     */
    public function getRules($countryId, $storeId)
    {
        return $this->rules;
    }
}

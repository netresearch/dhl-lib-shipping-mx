<?php
/**
 * Dhl Versenden
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
 * PHP version 5
 *
 * @category  Dhl
 * @package   Dhl\Versenden\Api\Info
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Versenden\Api\Info\Receiver;

/**
 * ParcelShop
 *
 * @category Dhl
 * @package  Dhl\Versenden\Api\Info
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class ParcelShop extends PostalFacility
{
    /** @var string */
    public $parcelShopNumber;

    /** @var string */
    public $streetName;

    /** @var string */
    public $streetNumber;

    /**
     * @param \stdClass $object
     *
     * @return ParcelShop|null
     */
    public static function fromObject(\stdClass $object)
    {
        /** @var ParcelShop $instance */
        $instance   =
            \Magento\Framework\App\ObjectManager::getInstance()->get('Dhl\Versenden\Api\Info\Receiver\ParcelShop');
        $properties = get_object_vars($object);
        $instance->fromArray($properties);

        return $instance;
    }
}

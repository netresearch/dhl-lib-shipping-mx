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
namespace Dhl\Shipping\Webservice\ResponseType\CreateShipment;

/**
 * LabelInterface
 *
 * @category Dhl
 * @package  Dhl\Shipping
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
interface LabelInterface
{
    /**
     * @return \Dhl\Shipping\Webservice\ResponseType\Generic\ItemStatusInterface
     */
    public function getStatus();

    /**
     * @return string
     */
    public function getSequenceNumber();

    /**
     * @return string
     */
    public function getTrackingNumber();

    /**
     * @return string
     */
    public function getLabel();

    /**
     * @return string
     */
    public function getReturnLabel();

    /**
     * @return string
     */
    public function getExportLabel();

    /**
     * @return string
     */
    public function getCodLabel();
    /**
     * @return string[]
     */
    public function getAllLabels();
}

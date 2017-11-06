<?php
/**
 * Dhl Shipping.
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
 *
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 *
 * @link      http://www.netresearch.de/
 */

namespace Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrder\CustomsDetails;

/**
 * Export position details as required for export documents.
 *
 * @category Dhl
 *
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 *
 * @link     http://www.netresearch.de/
 */
interface ExportPositionInterface
{
    /**
     * Obtain quantity of the commodity.
     *
     * @return int
     */
    public function getQty();

    /**
     * @return string
     */
    public function getSkuNumber();

    /**
     * @return string
     */
    public function getItemDescription();

    /**
     * Obtain the commercial value of the commodity (per each).
     *
     * @return \Dhl\Shipping\Webservice\RequestType\Generic\Package\MonetaryValueInterface
     */
    public function getDeclaredValue();

    /**
     * Obtain the net weight of the commodity (per each).
     *
     * @return \Dhl\Shipping\Webservice\RequestType\Generic\Package\WeightInterface
     */
    public function getWeight();

    /**
     * Obtain ISO-2-Alpha country code for the item's origin manufacturer country.
     *
     * @return string
     */
    public function getCountryOfOrigin();

    /**
     * Obtain HS Code, also referred to as Customs Tariff Number.
     *
     * @return string
     */
    public function getHsCode();
}

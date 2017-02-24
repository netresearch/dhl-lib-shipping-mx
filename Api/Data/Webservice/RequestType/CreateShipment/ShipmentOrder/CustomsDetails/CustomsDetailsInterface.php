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
 * @package   Dhl\Shipping\Api
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Shipping\Api\Data\Webservice\RequestType\CreateShipment\ShipmentOrder\CustomsDetails;

/**
 * Customs details as required for export documents
 *
 * @category Dhl
 * @package  Dhl\Shipping\Api
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
interface CustomsDetailsInterface
{
    /**
     * @return string
     */
    public function getInvoiceNumber();

    /**
     * @return ExportTypeInterface
     */
    public function getExportType();

    /**
     * Obtain terms of trade incoterm code, e.g.:
     * - DDP: Delivery Duty Paid
     * - DXV: Delivery Duty Paid (excl. VAT)
     * - DDU: Delivery Duty Unpaid
     * - DDX: Delivery Duty Paid (excl. Duties, taxes and VAT)
     *
     * @return string
     */
    public function getTermsOfTrade();

    /**
     * @return string
     */
    public function getPlaceOfCommital();

    /**
     * @return string
     */
    public function getAdditionalFee();

    /**
     * @return string
     */
    public function getPermitNumber();

    /**
     * @return string
     */
    public function getAttestationNumber();

    /**
     * @return bool
     */
    public function isWithElectronicExportNtfctn();

    /**
     * @return ExportPositionInterface[]
     */
    public function getPositions();
}

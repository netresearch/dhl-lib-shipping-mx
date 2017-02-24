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
interface ExportTypeInterface
{
    const EXPORT_TYPE_PRESENT  = 'PRESENT';
    const EXPORT_TYPE_SAMPLE   = 'COMMERCIAL_SAMPLE';
    const EXPORT_TYPE_DOCUMENT = 'DOCUMENT';
    const EXPORT_TYPE_RETURN   = 'RETURN_OF_GOODS';
    const EXPORT_TYPE_OTHER    = 'OTHER';

    /**
     * @return string
     */
    public function getType();

    /**
     * @return string
     */
    public function getDescription();
}

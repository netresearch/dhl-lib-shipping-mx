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
namespace Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrder\CustomsDetails;

use \Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrder\CustomsDetails\CustomsDetailsInterface;
use \Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrder\CustomsDetails\ExportPositionInterface;
use \Dhl\Shipping\Webservice\RequestType\CreateShipment\ShipmentOrder\CustomsDetails\ExportTypeInterface;

/**
 * Platform independent shipment order customs details
 *
 * @category Dhl
 * @package  Dhl\Shipping
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class CustomsDetails implements CustomsDetailsInterface
{
    /**
     * @var string
     */
    private $invoiceNumber;

    /**
     * @var ExportTypeInterface
     */
    private $exportType;

    /**
     * @var string
     */
    private $termsOfTrade;

    /**
     * @var string
     */
    private $placeOfCommital;

    /**
     * @var string
     */
    private $additionalFee;

    /**
     * @var string
     */
    private $permitNumber;

    /**
     * @var string
     */
    private $attestationNumber;

    /**
     * @var bool
     */
    private $isWithElectronicExportNtfctn;

    /**
     * @var ExportPositionInterface[]
     */
    private $positions;

    /**
     * CustomsDetails constructor.
     * @param string $invoiceNumber
     * @param ExportTypeInterface $exportType
     * @param string $termsOfTrade
     * @param string $placeOfCommital
     * @param string $additionalFee
     * @param string $permitNumber
     * @param string $attestationNumber
     * @param bool $isWithElectronicExportNtfctn
     * @param ExportPositionInterface[] $positions
     */
    public function __construct(
        $invoiceNumber,
        $exportType,
        $termsOfTrade,
        $placeOfCommital,
        $additionalFee,
        $permitNumber,
        $attestationNumber,
        $isWithElectronicExportNtfctn,
        array $positions
    ) {
        $this->invoiceNumber = $invoiceNumber;
        $this->exportType = $exportType;
        $this->termsOfTrade = $termsOfTrade;
        $this->placeOfCommital = $placeOfCommital;
        $this->additionalFee = $additionalFee;
        $this->permitNumber = $permitNumber;
        $this->attestationNumber = $attestationNumber;
        $this->isWithElectronicExportNtfctn = $isWithElectronicExportNtfctn;
        $this->positions = $positions;
    }

    /**
     * @return string
     */
    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    /**
     * @return ExportTypeInterface
     */
    public function getExportType()
    {
        return $this->exportType;
    }

    /**
     * Obtain terms of trade incoterm code, e.g.:
     * - DDP: Delivery Duty Paid
     * - DXV: Delivery Duty Paid (excl. VAT)
     * - DDU: Delivery Duty Unpaid
     * - DDX: Delivery Duty Paid (excl. Duties, taxes and VAT)
     *
     * @return string
     */
    public function getTermsOfTrade()
    {
        return $this->termsOfTrade;
    }

    /**
     * @return string
     */
    public function getPlaceOfCommital()
    {
        return $this->placeOfCommital;
    }

    /**
     * @return string
     */
    public function getAdditionalFee()
    {
        return $this->additionalFee;
    }

    /**
     * @return string
     */
    public function getPermitNumber()
    {
        return $this->permitNumber;
    }

    /**
     * @return string
     */
    public function getAttestationNumber()
    {
        return $this->attestationNumber;
    }

    /**
     * @return bool
     */
    public function isWithElectronicExportNtfctn()
    {
        return $this->isWithElectronicExportNtfctn;
    }

    /**
     * @return ExportPositionInterface[]
     */
    public function getPositions()
    {
        return $this->positions;
    }
}

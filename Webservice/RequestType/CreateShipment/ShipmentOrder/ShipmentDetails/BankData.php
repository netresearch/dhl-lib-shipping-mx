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
 * PHP version 7
 *
 * @category  Dhl
 * @package   Dhl\Versenden\Api
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Versenden\Webservice\RequestType\CreateShipment\ShipmentOrder\ShipmentDetails;

use \Dhl\Versenden\Api\Data\Webservice\RequestType\CreateShipment\ShipmentOrder\ShipmentDetails\BankDataInterface;

/**
 * Platform independent shipment order details: bank data
 *
 * @category Dhl
 * @package  Dhl\Versenden\Api
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class BankData implements BankDataInterface
{
    /**
     * @var string
     */
    private $accountOwner;

    /**
     * @var string
     */
    private $bankName;

    /**
     * @var string
     */
    private $iban;

    /**
     * @var string
     */
    private $bic;

    /**
     * @var string[]
     */
    private $notes;

    /**
     * @var string
     */
    private $accountReference;

    /**
     * BankData constructor.
     * @param string $accountOwner
     * @param string $bankName
     * @param string $iban
     * @param string $bic
     * @param \string[] $notes
     * @param string $accountReference
     */
    public function __construct($accountOwner, $bankName, $iban, $bic, array $notes, $accountReference)
    {
        $this->accountOwner = $accountOwner;
        $this->bankName = $bankName;
        $this->iban = $iban;
        $this->bic = $bic;
        $this->notes = $notes;
        $this->accountReference = $accountReference;
    }

    /**
     * @return string
     */
    public function getAccountOwner()
    {
        return $this->accountOwner;
    }

    /**
     * @return string
     */
    public function getBankName()
    {
        return $this->bankName;
    }

    /**
     * @return string
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * @return string
     */
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * @return string[]
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @return string
     */
    public function getAccountReference()
    {
        return $this->accountReference;
    }
}

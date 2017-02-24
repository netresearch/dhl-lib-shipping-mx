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
namespace Dhl\Shipping\Webservice\ResponseType\CreateShipment;

use \Dhl\Shipping\Api\Data\Webservice\ResponseType\CreateShipment\LabelInterface;
use \Dhl\Shipping\Api\Data\Webservice\ResponseType\Generic\ItemStatusInterface;

/**
 * Label
 *
 * @category Dhl
 * @package  Dhl\Shipping\Api
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class Label implements LabelInterface
{
    /**
     * @var ItemStatusInterface
     */
    private $status;

    /**
     * @var string
     */
    private $sequenceNumber;

    /**
     * @var string
     */
    private $trackingNumber;

    /**
     * @var string
     */
    private $label;

    /**
     * @var string
     */
    private $returnLabel;

    /**
     * @var string
     */
    private $exportLabel;

    /**
     * @var string
     */
    private $codLabel;

    /**
     * Label constructor.
     * @param ItemStatusInterface $status
     * @param string $sequenceNumber
     * @param string $trackingNumber
     * @param string $label
     * @param string $returnLabel
     * @param string $exportLabel
     * @param string $codLabel
     */
    public function __construct(
        ItemStatusInterface $status,
        $sequenceNumber,
        $trackingNumber,
        $label,
        $returnLabel,
        $exportLabel,
        $codLabel
    ) {
        $this->status = $status;
        $this->sequenceNumber = $sequenceNumber;
        $this->trackingNumber = $trackingNumber;
        $this->label = $label;
        $this->returnLabel = $returnLabel;
        $this->exportLabel = $exportLabel;
        $this->codLabel = $codLabel;
    }

    /**
     * @return ItemStatusInterface
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getSequenceNumber()
    {
        return $this->sequenceNumber;
    }

    /**
     * @return string
     */
    public function getTrackingNumber()
    {
        return $this->trackingNumber;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getReturnLabel()
    {
        return $this->returnLabel;
    }

    /**
     * @return string
     */
    public function getExportLabel()
    {
        return $this->exportLabel;
    }

    /**
     * @return string
     */
    public function getCodLabel()
    {
        return $this->codLabel;
    }
}

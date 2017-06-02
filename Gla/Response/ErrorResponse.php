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
 * @package   Dhl\Shipping\Webservice
 * @author    Benjamin Heuer <benjamin.heuer@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */

namespace Dhl\Shipping\Gla\Response;

/**
 * ErrorResponse
 *
 * @category Dhl
 * @package  Dhl\Shipping\Webservice
 * @author   Benjamin Heuer <benjamin.heuer@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class ErrorResponse
{
    /**
     * @var \Dhl\Shipping\Gla\Response\Type\ShipmentErrorResponseReasonsType
     */
    private $reasons;

    /**
     * @var \Dhl\Shipping\Gla\Response\Type\ShipmentErrorResponseDetailsType
     */
    private $details;

    //TODO(nr) Currently we get only this message field unlike to the documentation, remove when obsolete
    /**
     * @var string
     */
    private $message;

    /**
     * @return \Dhl\Shipping\Gla\Response\Type\ShipmentErrorResponseReasonsType
     */
    public function getReasons()
    {
        return $this->reasons;
    }

    /**
     * @param \Dhl\Shipping\Gla\Response\Type\ShipmentErrorResponseReasonsType $reasons
     */
    public function setReasons($reasons)
    {
        $this->reasons = $reasons;
    }

    /**
     * @return \Dhl\Shipping\Gla\Response\Type\ShipmentErrorResponseDetailsType
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param \Dhl\Shipping\Gla\Response\Type\ShipmentErrorResponseDetailsType $details
     */
    public function setDetails($details)
    {
        $this->details = $details;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
}

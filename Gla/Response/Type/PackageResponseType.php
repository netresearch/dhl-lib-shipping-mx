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
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */

namespace Dhl\Shipping\Gla\Response\Type;

/**
 * PackageResponseType
 *
 * @category Dhl
 * @package  Dhl\Shipping\Webservice
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class PackageResponseType
{
    /**
     * @var \Dhl\Shipping\Gla\Response\Type\ResponseDetailsResponseType
     */
    private $responseDetails;

    /**
     * @var \Dhl\Shipping\Gla\Response\Type\ErrorResponseType[]
     */
    private $errors;

    /**
     * @var \Dhl\Shipping\Gla\Response\Type\PackageDetailsResponseType
     */
    private $packageDetails;

    /**
     * @return \Dhl\Shipping\Gla\Response\Type\ResponseDetailsResponseType
     */
    public function getResponseDetails()
    {
        return $this->responseDetails;
    }

    /**
     * @param \Dhl\Shipping\Gla\Response\Type\ResponseDetailsResponseType $responseDetails
     */
    public function setResponseDetails($responseDetails)
    {
        $this->responseDetails = $responseDetails;
    }

    /**
     * @return \Dhl\Shipping\Gla\Response\Type\ErrorResponseType[]
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param \Dhl\Shipping\Gla\Response\Type\ErrorResponseType[] $errors
     */
    public function setErrors($errors)
    {
        $this->errors = $errors;
    }

    /**
     * @return \Dhl\Shipping\Gla\Response\Type\PackageDetailsResponseType
     */
    public function getPackageDetails()
    {
        return $this->packageDetails;
    }

    /**
     * @param \Dhl\Shipping\Gla\Response\Type\PackageDetailsResponseType $packageDetails
     */
    public function setPackageDetails($packageDetails)
    {
        $this->packageDetails = $packageDetails;
    }
}

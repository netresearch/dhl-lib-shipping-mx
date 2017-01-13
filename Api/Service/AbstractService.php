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
 * @package   Dhl\Versenden\Bcs\Api
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Versenden\Bcs\Api\Service;

/**
 * AbstractService
 *
 * @category Dhl
 * @package  Dhl\Versenden\Bcs\Api\Service
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
abstract class AbstractService implements ServiceInterface
{
    /**
     * @var bool
     */
    private $postalFacility;

    /**
     * @var bool
     */
    private $merchantSelection;

    /**
     * @var bool
     */
    private $customerSelection;

    /**
     * AbstractService constructor.
     * @param bool $postalFacility
     * @param bool $merchantSelection
     * @param bool $customerSelection
     */
    public function __construct($postalFacility, $merchantSelection, $customerSelection)
    {
        $this->postalFacility = $postalFacility;
        $this->merchantSelection = $merchantSelection;
        $this->customerSelection = $customerSelection;
    }

    /**
     * @return string
     */
    abstract public function getCode();

    /**
     * @return bool
     */
    public function isApplicableToPostalFacility()
    {
        return $this->postalFacility;
    }

    /**
     * @return bool
     */
    public function isApplicableToMerchantSelection()
    {
        return $this->merchantSelection;
    }

    /**
     * @return bool
     */
    public function isApplicableToCustomerSelection()
    {
        return $this->customerSelection;
    }
}

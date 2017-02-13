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
namespace Dhl\Versenden\Webservice\Request\Type\Generic\Package;

use \Dhl\Versenden\Api\Data\Webservice\Request\Type\Generic\Package\DimensionsInterface;

/**
 * Platform independent package dimensions
 *
 * @category Dhl
 * @package  Dhl\Versenden\Api
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class Dimensions implements DimensionsInterface
{
    /**
     * @var int
     */
    private $length;

    /**
     * @var int
     */
    private $width;

    /**
     * @var int
     */
    private $height;

    /**
     * @var string
     */
    private $unitOfMeasurement;

    /**
     * Dimensions constructor.
     * @param int $length
     * @param int $width
     * @param int $height
     * @param string $unitOfMeasurement
     */
    public function __construct($length, $width, $height, $unitOfMeasurement)
    {
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
        $this->unitOfMeasurement = $unitOfMeasurement;
    }

    /**
     * @param string $unitOfMeasurement
     * @return int
     */
    public function getLength($unitOfMeasurement)
    {
        // TODO: convert to target unit.
        return $this->length;
    }

    /**
     * @param string $unitOfMeasurement
     * @return int
     */
    public function getWidth($unitOfMeasurement)
    {
        // TODO: convert to target unit.
        return $this->width;
    }

    /**
     * @param string $unitOfMeasurement
     * @return int
     */
    public function getHeight($unitOfMeasurement)
    {
        // TODO: convert to target unit.
        return $this->height;
    }
}

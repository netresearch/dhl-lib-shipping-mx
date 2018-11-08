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
 * @package   Dhl\Shipping
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2018 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Shipping\Webservice\RequestType\Generic\Package;

use Dhl\Shipping\Webservice\UnitConverterInterface;

/**
 * Platform independent package dimensions
 *
 * @package  Dhl\Shipping
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class Dimensions extends AbstractConvertibleValue implements DimensionsInterface
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
     *
     * @param UnitConverterInterface $unitConverter
     * @param int | string           $length
     * @param int | string           $width
     * @param int | string           $height
     * @param string                 $unitOfMeasurement
     */
    public function __construct(UnitConverterInterface $unitConverter, $length, $width, $height, $unitOfMeasurement)
    {
        $this->length = $length;
        $this->width = $width;
        $this->height = $height;
        $this->unitOfMeasurement = $unitOfMeasurement;

        parent::__construct($unitConverter);
    }

    /**
     * @param string $unitOfMeasurement
     *
     * @return int|null
     */
    public function getLength($unitOfMeasurement)
    {
        $length = $this->unitConverter->convertDimension($this->length, $this->unitOfMeasurement, $unitOfMeasurement);
        return $length;
    }

    /**
     * @param string $unitOfMeasurement
     *
     * @return int|null
     */
    public function getWidth($unitOfMeasurement)
    {
        $width = $this->unitConverter->convertDimension($this->width, $this->unitOfMeasurement, $unitOfMeasurement);
        return $width;
    }

    /**
     * @param string $unitOfMeasurement
     *
     * @return int|null
     */
    public function getHeight($unitOfMeasurement)
    {
        $height = $this->unitConverter->convertDimension($this->height, $this->unitOfMeasurement, $unitOfMeasurement);
        return $height;
    }

    /**
     * @return string
     */
    public function getUnitOfMeasurement()
    {
        return $this->unitOfMeasurement;
    }
}

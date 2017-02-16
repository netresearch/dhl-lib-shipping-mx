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

use \Dhl\Versenden\Api\Data\Webservice\Request\Type\Generic\Package\WeightInterface;
use \Dhl\Versenden\Api\Webservice\UnitConverterInterface;

/**
 * Platform independent package weight
 *
 * @category Dhl
 * @package  Dhl\Versenden\Api
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class Weight extends AbstractConvertibleValue implements WeightInterface
{
    /**
     * @var int
     */
    private $value;

    /**
     * @var string
     */
    private $unitOfMeasurement;

    /**
     * Weight constructor.
     * @param UnitConverterInterface $unitConverter
     * @param int $value
     * @param string $unitOfMeasurement
     */
    public function __construct(UnitConverterInterface $unitConverter, $value, $unitOfMeasurement)
    {
        $this->value = $value;
        $this->unitOfMeasurement = $unitOfMeasurement;

        parent::__construct($unitConverter);
    }

    /**
     * @param string $unitOfMeasurement
     * @return float
     */
    public function getValue($unitOfMeasurement)
    {
        $value = $this->unitConverter->convertWeight($this->value, $this->unitOfMeasurement, $unitOfMeasurement);
        return $value;
    }
}

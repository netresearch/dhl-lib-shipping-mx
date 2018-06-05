<?php
/**
 * /**
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
 * @package   Dhl\Shipping\Service
 * @author    Max Melzer <max.melzer@netresearch.de>
 * @copyright 2018 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Shipping\Service;

use Dhl\Shipping\Api\Data\Service\ServiceInputInterface;

/**
 * Class Text
 *
 * @package Dhl\Shipping\Service
 */
class ServiceInput implements ServiceInputInterface
{
    /**
     * @var string
     */
    private $inputType;

    /**
     * @var string
     */
    private $code;

    /**
     * @var mixed
     */
    private $value;

    /**
     * @var string
     */
    private $label;

    /**
     * @var string[]
     */
    private $options;

    /**
     * @var string
     */
    private $placeholder;

    /**
     * @var int
     */
    private $sortOrder;

    /**
     * @var string[]
     */
    private $validationRules;

    /**
     * ServiceInput constructor.
     *
     * @param string $inputType
     * @param string $code
     * @param string $label
     * @param string[] $options
     * @param string $placeholder
     * @param int $sortOrder
     * @param string[] $validationRules
     */
    public function __construct(
        string $inputType,
        string $code,
        string $label,
        array $validationRules,
        array $options,
        string $placeholder,
        int $sortOrder
    ) {
        $this->inputType = $inputType;
        $this->code = $code;
        $this->label = $label;
        $this->options = $options;
        $this->placeholder = $placeholder;
        $this->sortOrder = $sortOrder;
        $this->validationRules = $validationRules;
    }

    /**
     * @return string
     */
    public function getInputType(): string
    {
        return $this->inputType;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return string[]
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * @return string
     */
    public function getPlaceholder(): string
    {
        return $this->placeholder;
    }

    /**
     * @return int
     */
    public function getSortOrder(): int
    {
        return $this->sortOrder;
    }

    /**
     * @return string[]
     */
    public function getValidationRules(): array
    {
        return $this->validationRules;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }
}

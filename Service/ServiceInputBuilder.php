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

/***
 * Class ServiceInputBuilder
 *
 * @package Dhl\Shipping\Service\Input
 */
class ServiceInputBuilder
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
    private $value = null;

    /**
     * @var string
     */
    private $label = '';

    /**
     * @var string[]
     */
    private $options = [];

    /**
     * @var string
     */
    private $tooltip = '';

    /**
     * @var string
     */
    private $placeholder = '';

    /**
     * @var int
     */
    private $sortOrder = 0;

    /**
     * @var string[]
     */
    private $validationRules = [];

    /**
     * @return ServiceInputInterface
     */
    public function create()
    {
        $result = new ServiceInput(
            $this->inputType,
            $this->code,
            $this->label,
            $this->validationRules,
            $this->options,
            $this->tooltip,
            $this->placeholder,
            $this->sortOrder,
            $this->value
        );

        $this->inputType = null;
        $this->code = null;
        $this->label = '';
        $this->options = [];
        $this->tooltip = '';
        $this->placeholder = '';
        $this->sortOrder = 0;
        $this->validationRules = [];
        $this->value = null;

        return $result;
    }

    /**
     * @param string $inputType
     */
    public function setInputType(string $inputType)
    {
        $this->inputType = $inputType;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code)
    {
        $this->code = $code;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @param string $label
     */
    public function setLabel(string $label)
    {
        $this->label = $label;
    }

    /**
     * @param string[] $options
     */
    public function setOptions(array $options)
    {
        $this->options = $options;
    }

    /**
     * @param string $tooltip
     */
    public function setTooltip(string $tooltip)
    {
        $this->tooltip = $tooltip;
    }

    /**
     * @param string $placeholder
     */
    public function setPlaceholder(string $placeholder)
    {
        $this->placeholder = $placeholder;
    }

    /**
     * @param int $sortOrder
     */
    public function setSortOrder(int $sortOrder)
    {
        $this->sortOrder = $sortOrder;
    }

    /**
     * @param string[] $validationRules
     */
    public function setValidationRules(array $validationRules)
    {
        $this->validationRules = $validationRules;
    }
}

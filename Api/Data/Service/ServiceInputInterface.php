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
 * @package   Dhl\Shipping\Api
 * @author    Max Melzer <max.melzer@netresearch.de>
 * @copyright 2018 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Shipping\Api\Data\Service;

/**
 * ServiceInputInterface
 *
 * @package  Dhl\Shipping\Api
 * @author   Max Melzer <max.melzer@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
interface ServiceInputInterface
{
    const INPUT_TYPE_CHECKBOX = 'checkbox';
    const INPUT_TYPE_DATE     = 'date';
    const INPUT_TYPE_NUMBER   = 'number';
    const INPUT_TYPE_RADIO    = 'radio';
    const INPUT_TYPE_SELECT   = 'select';
    const INPUT_TYPE_TEXT     = 'text';
    const INPUT_TYPE_TIME     = 'time';

    /**
     * Get the display type of the current service input.
     *
     * @return string
     */
    public function getInputType();

    /**
     * @return string
     */
    public function getCode();

    /**
     * Obtain the value of a service input.
     * May be boolean true or a date or a monetary value, whatever the service offers.
     *
     * @return mixed
     */
    public function getValue();

    /**
     * Obtain the label corresponding to the input
     *
     * @return string
     */
    public function getLabel();

    /**
     * Obtain a pre-defined set of allowed values.
     *
     * @return string[]
     */
    public function getOptions();

    /**
     * Obtain help text to be displayed with input
     *
     * @return string
     */
    public function getTooltip();

    /**
     * Obtain a placeholder text to be displayed when no value has been entered yet.
     *
     * @return string
     */
    public function getPlaceholder();

    /**
     * Get Sort Order.
     *
     * @return int
     */
    public function getSortOrder();

    /**
     * Get rules for user input validation. For a list of mapped rules see:
     *
     * @file view/frontend/web/js/model/service-validation-map.js
     *
     * @return string[]
     */
    public function getValidationRules();

    /**
     * @return string
     */
    public function getInfoText();

    /**
     * @return boolean
     */
    public function hasAsterisk();
}

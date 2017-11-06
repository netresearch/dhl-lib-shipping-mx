<?php
/**
 * Dhl Shipping.
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
 *
 * @author    Benjamin Heuer <benjamin.heuer@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 *
 * @link      http://www.netresearch.de/
 */

namespace Dhl\Shipping\Webservice\Exception;

/**
 * Webservice connection to Global Label API could not be established, reason
 * cannot be parsed from any response.
 *
 * @category Dhl
 *
 * @author   Benjamin Heuer <benjamin.heuer@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 *
 * @link     http://www.netresearch.de/
 */
class GlCommunicationException extends \Exception
{
    const SETUP_EXCEPTION_MESSAGE = 'API connection could not be prepared, please check your configuration.';
    const RUNTIME_EXCEPTION_MESSAGE = 'API connection could not be established.';

    /**
     * @param string $message
     *
     * @return static
     */
    public static function setup($message)
    {
        $message = sprintf('%s %s', self::SETUP_EXCEPTION_MESSAGE, $message);

        return new static($message);
    }

    /**
     * @param string $message
     *
     * @return static
     */
    public static function runtime($message)
    {
        $message = sprintf('%s %s', self::RUNTIME_EXCEPTION_MESSAGE, $message);

        return new static($message);
    }
}

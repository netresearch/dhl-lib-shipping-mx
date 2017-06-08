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
 * @package   Dhl\Shipping\Api
 * @author    Benjamin Heuer <benjamin.heuer@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */

namespace Dhl\Shipping\Webservice\Exception;

/**
 * Webservice connection to Global Label API was established but operation failed.
 * Reason is given in response.
 *
 * @category Dhl
 * @package  Dhl\Shipping\Api
 * @author   Benjamin Heuer <benjamin.heuer@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class GlOperationException extends \Exception
{
    /**
     * @param string $responseBody
     * @return static
     */
    public static function create($responseBody)
    {
        $response = json_decode($responseBody, true);
        if ($response && isset($response['message'])) {
            $message = $response['message'];
        } else {
            $message = sprintf('API operation failed. Response: "%s"', $responseBody);
        }

        return new static($message);
    }
}

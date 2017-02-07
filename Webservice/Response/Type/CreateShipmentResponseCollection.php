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
namespace Dhl\Versenden\Webservice\Response\Type;

use Dhl\Versenden\Api\Webservice\Response\Type\CreateShipmentResponseInterface;
use \Dhl\Versenden\Api\Webservice\Response\Type\Generic\ResponseStatusInterface;

/**
 * CreateShipmentResponseCollection
 *
 * @category Dhl
 * @package  Dhl\Versenden\Api
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class CreateShipmentResponseCollection extends \ArrayIterator
{
    const STATUS_CREATED = 0;
    const STATUS_PARTIALLY_CREATED = 1;
    const STATUS_NOT_CREATED = 2;

    /**
     * @var ResponseStatusInterface
     */
    private $status;

    /**
     * CreateShipmentResponseCollection constructor.
     * @param ResponseStatusInterface $status
     * @param CreateShipmentResponseInterface[] $array
     * @param int $flags
     */
    public function __construct(ResponseStatusInterface $status, array $array = [], $flags = 0)
    {
        $this->status = $status;
        parent::__construct($array, $flags);
    }

    /**
     * @return ResponseStatusInterface
     */
    public function getStatus()
    {
        return $this->status;
    }
}

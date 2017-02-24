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
 * @package   Dhl\Shipping\Bcs\Test\Unit
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Shipping\Api\Service;

use Dhl\Shipping\Api\BcsAccessData;
use Dhl\Shipping\Api\Service\Filter\CustomerSelectionFilter;
use Dhl\Shipping\Api\Service\Filter\MerchantSelectionFilter;
use Dhl\Shipping\Api\Service\Filter\PostalFacilityFilter;
use Dhl\Shipping\Api\Service\Filter\ProductFilter;

/**
 * ServiceCollectionTest
 *
 * @category Dhl
 * @package  Dhl\Shipping\Bcs\Test\Unit
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class ServiceCollectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function serviceFactory()
    {
        $codCode = Cod::CODE;

        $codService = ServiceFactory::get($codCode);
        $this->assertInstanceOf(Cod::class, $codService);
        $this->assertSame($codCode, $codService->getCode());

        $fooCode = 'foo';
        $fooService = ServiceFactory::get($fooCode);
        $this->assertNull($fooService);
    }

    /**
     * @test
     */
    public function createCollection()
    {
        $services = ServiceFactory::getAll();

        $collection = new ServiceCollection($services);
        $this->assertSame(count($services), count($collection));
        foreach ($services as $service) {
            $this->assertTrue(isset($collection[$service->getCode()]));
        }
    }

    /**
     * @test
     */
    public function productFilterPositive()
    {
        $codService = new Cod(true, false, false);
        $collection = new ServiceCollection([Cod::CODE => $codService]);

        $productFilter = ProductFilter::create(['code' => BcsAccessData::CODE_PAKET_NATIONAL]);
        $result = $collection->filter($productFilter);

        // array copy access
        $services = $result->getArrayCopy();
        $this->assertInternalType('array', $services);
        $this->assertContainsOnly(ServiceInterface::class, $services);
        $this->assertCount(1, $services);
        $this->assertArrayHasKey(Cod::CODE, $services);

        // direct access
        $this->assertTrue(isset($result[Cod::CODE]));
        $this->assertInstanceOf(ServiceInterface::class, $result[Cod::CODE]);
    }

    /**
     * @test
     */
    public function productFilterNegative()
    {
        $codService = new Cod(true, false, false);
        $collection = new ServiceCollection([Cod::CODE => $codService]);

        // valid code, not applicable to service
        $productFilter = ProductFilter::create(['code' => BcsAccessData::CODE_WELTPAKET]);
        $result = $collection->filter($productFilter);

        $services = $result->getArrayCopy();
        $this->assertInternalType('array', $services);
        $this->assertCount(0, $services);

        // invalid code
        $productFilter = ProductFilter::create(['code' => 'F01BAR']);
        $result = $collection->filter($productFilter);

        $services = $result->getArrayCopy();
        $this->assertInternalType('array', $services);
        $this->assertCount(0, $services);

        // no code
        $productFilter = ProductFilter::create();
        $result = $collection->filter($productFilter);

        $services = $result->getArrayCopy();
        $this->assertInternalType('array', $services);
        $this->assertCount(0, $services);
    }

    /**
     * @test
     */
    public function customerSelectionFilter()
    {
        $codService = new Cod(true, false, false);
        $preferredDayService = new PreferredDay(false, true, true);
        $collection = new ServiceCollection([
            COD::CODE => $codService,
            PreferredDay::CODE => $preferredDayService,
        ]);

        $selectionFilter = CustomerSelectionFilter::create();
        $result = $collection->filter($selectionFilter);

        $services = $result->getArrayCopy();
        $this->assertInternalType('array', $services);
        $this->assertContainsOnly(ServiceInterface::class, $services);
        $this->assertCount(1, $services);
        $this->assertArrayHasKey(PreferredDay::CODE, $services);
        $this->assertArrayNotHasKey(Cod::CODE, $services);
    }

    /**
     * @test
     */
    public function merchantSelectionFilter()
    {
        $codService = new Cod(true, false, false);
        $preferredDayService = new PreferredDay(false, true, true);
        $printOnlyIfCodeableService = new PrintOnlyIfCodeable(true, false, false);
        $collection = new ServiceCollection([
            COD::CODE => $codService,
            PreferredDay::CODE => $preferredDayService,
            PrintOnlyIfCodeable::CODE => $printOnlyIfCodeableService,
        ]);

        $selectionFilter = MerchantSelectionFilter::create();
        $result = $collection->filter($selectionFilter);

        $services = $result->getArrayCopy();
        $this->assertInternalType('array', $services);
        $this->assertContainsOnly(ServiceInterface::class, $services);
        $this->assertCount(1, $services);
        $this->assertArrayHasKey(PreferredDay::CODE, $services);
        $this->assertArrayNotHasKey(Cod::CODE, $services);
        $this->assertArrayNotHasKey(PrintOnlyIfCodeable::CODE, $services);
    }

    /**
     * @test
     */
    public function postalFacilityFilter()
    {
        $codService = new Cod(true, false, false);
        $preferredDayService = new PreferredDay(false, true, true);
        $printOnlyIfCodeableService = new PrintOnlyIfCodeable(true, false, false);
        $collection = new ServiceCollection([
            COD::CODE => $codService,
            PreferredDay::CODE => $preferredDayService,
            PrintOnlyIfCodeable::CODE => $printOnlyIfCodeableService,
        ]);

        $postalFacilityFilter = PostalFacilityFilter::create();
        $result = $collection->filter($postalFacilityFilter);

        $services = $result->getArrayCopy();
        $this->assertInternalType('array', $services);
        $this->assertContainsOnly(ServiceInterface::class, $services);
        $this->assertCount(2, $services);
        $this->assertArrayHasKey(PrintOnlyIfCodeable::CODE, $services);
        $this->assertArrayHasKey(Cod::CODE, $services);
        $this->assertArrayNotHasKey(PreferredDay::CODE, $services);
    }
}

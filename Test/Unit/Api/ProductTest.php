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
 * @package   Dhl\Versenden\Bcs\Test\Unit
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Versenden\Api;

/**
 * ProductTest
 *
 * @category Dhl
 * @package  Dhl\Versenden\Bcs\Test\Unit
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
class ProductTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function getCodes()
    {
        $codes = Product::getCodes();
        $this->assertInternalType('array', $codes);
        $this->assertNotEmpty($codes);
        $this->assertContainsOnly('string', $codes);
    }

    /**
     * @test
     */
    public function getProcedure()
    {
        $codes = Product::getCodes();
        foreach ($codes as $code) {
            $procedure = Product::getProcedure($code);
            $this->assertInternalType('string', $procedure);

            $this->assertFalse(is_numeric($code));
            $this->assertTrue(is_numeric($procedure));

            $this->assertNotEmpty($procedure);
        }

        $this->assertEmpty(Product::getProcedure('F01BAR'));
    }

    /**
     * @test
     */
    public function getProcedureReturn()
    {
        $codes = Product::getCodes();

        $allProcedures = array_map(function ($code) {
            return Product::getProcedureReturn($code);
        }, $codes);
        $this->assertInternalType('array', $allProcedures);
        $this->assertNotEmpty($allProcedures);

        $validProcedures = array_filter($allProcedures, function ($procedure) {
            return ($procedure !== '');
        });
        $this->assertInternalType('array', $validProcedures);
        $this->assertNotEmpty($validProcedures);
    }

    /**
     * @test
     */
    public function getCodesByCountry()
    {
        $euCountries = ['DE', 'AT', 'PL'];

        // DE merchant
        $shipperCountry = 'DE';
        $recipientCountry = 'DE';
        $products = Product::getCodesByCountry($shipperCountry, $recipientCountry, $euCountries);

        $this->assertInternalType('array', $products);
        $this->assertNotEmpty($products);
        $this->assertContains(Product::CODE_PAKET_NATIONAL, $products);

        $shipperCountry = 'DE';
        $recipientCountry = 'PL';
        $products = Product::getCodesByCountry($shipperCountry, $recipientCountry, $euCountries);

        $this->assertInternalType('array', $products);
        $this->assertNotEmpty($products);
        $this->assertContains(Product::CODE_WELTPAKET, $products);

        $shipperCountry = 'DE';
        $recipientCountry = 'NZ';
        $products = Product::getCodesByCountry($shipperCountry, $recipientCountry, $euCountries);

        $this->assertInternalType('array', $products);
        $this->assertNotEmpty($products);
        $this->assertContains(Product::CODE_WELTPAKET, $products);

        // AT merchant
        $shipperCountry = 'AT';
        $recipientCountry = 'AT';
        $products = Product::getCodesByCountry($shipperCountry, $recipientCountry, $euCountries);

        $this->assertInternalType('array', $products);
        $this->assertNotEmpty($products);
        $this->assertContains(Product::CODE_PAKET_AUSTRIA, $products);

        $shipperCountry = 'AT';
        $recipientCountry = 'PL';
        $products = Product::getCodesByCountry($shipperCountry, $recipientCountry, $euCountries);

        $this->assertInternalType('array', $products);
        $this->assertNotEmpty($products);
        $this->assertContains(Product::CODE_PAKET_CONNECT, $products);

        $shipperCountry = 'AT';
        $recipientCountry = 'NZ';
        $products = Product::getCodesByCountry($shipperCountry, $recipientCountry, $euCountries);

        $this->assertInternalType('array', $products);
        $this->assertNotEmpty($products);
        $this->assertContains(Product::CODE_PAKET_INTERNATIONAL, $products);

        $shipperCountry = 'AU';
        $recipientCountry = 'NZ';
        $products = Product::getCodesByCountry($shipperCountry, $recipientCountry, $euCountries);

        $this->assertInternalType('array', $products);
        $this->assertEmpty($products);
    }
}

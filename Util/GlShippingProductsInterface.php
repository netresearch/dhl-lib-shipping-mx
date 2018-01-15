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
namespace Dhl\Shipping\Util;

/**
 * GlShippingProductsInterface
 *
 * @package  Dhl\Shipping
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
interface GlShippingProductsInterface extends ShippingProductsInterface
{
    // APAC INTERNATIONAL
    // ==================
    // GM Packet Economy
    const CODE_APAC_PKG = 'PKG';
    // GM Packet Standard
    const CODE_APAC_PKD = 'PKD';
    // GM Packet Priority Manifest
    const CODE_APAC_PKM = 'PKM';
    // GM Packet Plus Standard
    const CODE_APAC_PPS = 'PPS';
    // GM Packet Plus Priority Manifest
    const CODE_APAC_PPM = 'PPM';
    // Parcel International Standard
    const CODE_APAC_PLD = 'PLD';
    // Parcel International Direct Expedited
    const CODE_APAC_PLE = 'PLE';

    // APAC DOMESTIC
    // =============
    // DHL Parcel Domestic
    const CODE_APAC_PDO = 'PDO';
    // DHL Parcel Domestic Expedited
    const CODE_APAC_PDE = 'PDE';

    // AMER INTERNATIONAL
    // ==================
    // DHL GlobalMail Packet Standard
    const CODE_AMER_PKD = 'PKD';
    // DHL GlobalMail Packet Priority
    const CODE_AMER_PKY = 'PKY';
    // DHL GlobalMail Packet Plus
    const CODE_AMER_PKT = 'PKT';
    const CODE_AMER_29 = '29';
    // DHL Parcel International Standard
    const CODE_AMER_PLY = 'PLY';
    const CODE_AMER_54 = '54';
    const CODE_AMER_60 = '60';
    // DHL Parcel International Direct Standard
    const CODE_AMER_PID = 'PID';
    const CODE_AMER_22 = '22';
    // DHL Parcel International Expedited
    const CODE_AMER_PLX = 'PLX';

    // AMER DOMESTIC
    // =============
    // DHL SM BPM Expedited
    const CODE_AMER_76 = '76';
    // DHL SM BPM Ground
    const CODE_AMER_77 = '77';
    // DHL SM Parcel Plus Expedited
    const CODE_AMER_36 = '36';
    // DHL SM Parcel Plus Ground
    const CODE_AMER_83 = '83';
    // DHL SM Parcel Expedited
    const CODE_AMER_81 = '81';
    // DHL SM Parcel Ground
    const CODE_AMER_82 = '82';
    // DHL SM Parcel Expedited Max
    const CODE_AMER_631 = '631';

    // AMER RETURNS
    // ============
    // DHL SM Parcel Return Light
    const CODE_AMER_531 = '531';
    // DHL SM Parcel Return Plus
    const CODE_AMER_491 = '491';
    // DHL SM Parcel Return Ground
    const CODE_AMER_532 = '532';

    // MULTIPLE REGIONS
    // ================
    // DHL Parcel International Direct
    const CODE_PLT = 'PLT';
}

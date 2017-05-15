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
 * @package   Dhl\Shipping
 * @author    Christoph Aßmann <christoph.assmann@netresearch.de>
 * @copyright 2017 Netresearch GmbH & Co. KG
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      http://www.netresearch.de/
 */
namespace Dhl\Shipping\Api\Util;

/**
 * GlShippingProductsInterface
 *
 * @category Dhl
 * @package  Dhl\Shipping
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
interface GlShippingProductsInterface extends ShippingProductsInterface
{
    // APAC INTERNATIONAL
    // GM Packet Plus Priority Manifest
    const CODE_APAC_PPM = 'PPM';
    // GM Packet Plus Standard
    const CODE_APAC_PPS = 'PPS';
    // GM Packet Priority Manifest
    const CODE_APAC_PKM = 'PKM';
    // GM Packet Standard
    const CODE_APAC_PKD = 'PKD';
    // Parcel International Direct
    const CODE_APAC_PLT = 'PLT';
    // Parcel International Direct Expedited
    const CODE_APAC_PLE = 'PLE';
    // Parcel International Standard
    const CODE_APAC_PLD = 'PLD';

    // APAC DOMESTIC
    // Parcel Thailand
    const CODE_APAC_PDO = 'PDO';

    // AMER INTERNATIONAL
    // DHL GM Business Canada Post Lettermail
    const CODE_AMER_43 = '43';
    // DHL GM Business IPA
    const CODE_AMER_41 = '41';
    // DHL GM Business ISAL
    const CODE_AMER_42 = '42';
    // DHL GM Business Priority
    const CODE_AMER_34 = '34';
    // DHL GM Business Standard
    const CODE_AMER_35 = '35';
    // DHL GM Direct Canada Post Admail
    const CODE_AMER_46 = '46';
    // Workshare DHL GM Business Priority
    const CODE_AMER_44 = '44';
    // Workshare DHL GM Business Standard
    const CODE_AMER_45 = '45';
    // DHL GM Other
    const CODE_AMER_69 = '69';
    // DHL GM Packet Plus
    const CODE_AMER_29 = '29';
    // DHL GM Parcel Direct Express
    const CODE_AMER_58 = '58';
    // DHL GM Parcel Canada Parcel Standard
    const CODE_AMER_59 = '59';
    // DHL Parcel International Standard
    const CODE_AMER_54 = '54';
    // DHL Parcel International Direct
    const CODE_AMER_60 = '60';
    // DHL GM Publication Canada Publication
    const CODE_AMER_51 = '51';
    // DHL GM Publication Priority
    const CODE_AMER_47 = '47';
    // DHL GM Publication Standard
    const CODE_AMER_48 = '48';

    // AMER INTERNATIONAL
    // DHL SM BPM Expedited
    const CODE_AMER_76 = '76';
    // DHL SM BPM Ground
    const CODE_AMER_77 = '77';
    // DHL SM Flats Expedited
    const CODE_AMER_72 = '72';
    // DHL SM Flats Ground
    const CODE_AMER_73 = '73';
    // SM Marketing Parcel Expedited
    const CODE_AMER_384 = '384';
    // SM Marketing Parcel Ground
    const CODE_AMER_383 = '383';
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
    // DHL SM Parcel Return Light
    const CODE_AMER_531 = '531';
    // DHL SM Parcel Return Plus
    const CODE_AMER_491 = '491';
    // DHL SM Parcel Return Ground
    const CODE_AMER_532 = '532';
}

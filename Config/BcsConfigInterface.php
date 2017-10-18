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
namespace Dhl\Shipping\Config;

/**
 * BcsConfigInterface
 *
 * @category Dhl
 * @package  Dhl\Shipping
 * @author   Christoph Aßmann <christoph.assmann@netresearch.de>
 * @license  http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     http://www.netresearch.de/
 */
interface BcsConfigInterface
{
    const CONFIG_XML_PATH_ENDPOINT = 'carriers/dhlshipping/bcs_api_endpoint';
    const CONFIG_XML_PATH_AUTH_USERNAME = 'carriers/dhlshipping/bcs_api_auth_username';
    const CONFIG_XML_PATH_AUTH_PASSWORD = 'carriers/dhlshipping/bcs_api_auth_password';
    const CONFIG_XML_PATH_ACCOUNT_USER = 'carriers/dhlshipping/bcs_account_user';
    const CONFIG_XML_PATH_ACCOUNT_SIGNATURE = 'carriers/dhlshipping/bcs_account_signature';
    const CONFIG_XML_PATH_ACCOUNT_EKP = 'carriers/dhlshipping/bcs_account_ekp';
    const CONFIG_XML_PATH_ACCOUNT_PARTICIPATIONS = 'carriers/dhlshipping/bcs_account_participations';

    const CONFIG_XML_PATH_SANDBOX_ENDPOINT = 'carriers/dhlshipping/bcs_sandbox_api_endpoint';
    const CONFIG_XML_PATH_SANDBOX_AUTH_USERNAME = 'carriers/dhlshipping/bcs_sandbox_api_auth_username';
    const CONFIG_XML_PATH_SANDBOX_AUTH_PASSWORD = 'carriers/dhlshipping/bcs_sandbox_api_auth_password';
    const CONFIG_XML_PATH_SANDBOX_ACCOUNT_USER = 'carriers/dhlshipping/bcs_sandbox_account_user';
    const CONFIG_XML_PATH_SANDBOX_ACCOUNT_SIGNATURE = 'carriers/dhlshipping/bcs_sandbox_account_signature';
    const CONFIG_XML_PATH_SANDBOX_ACCOUNT_EKP = 'carriers/dhlshipping/bcs_sandbox_account_ekp';
    const CONFIG_XML_PATH_SANDBOX_ACCOUNT_PARTICIPATIONS = 'carriers/dhlshipping/bcs_sandbox_account_participations';

    const CONFIG_XML_PATH_SHIPMENT_PRINTONLYIFCODEABLE = 'carriers/dhlshipping/bcs_shipment_printonlyifcodeable';

    const CONFIG_XML_PATH_BANKDATA_ACCOUNT_OWNER = 'carriers/dhlshipping/bcs_bankdata_account_owner';
    const CONFIG_XML_PATH_BANKDATA_BANKNAME = 'carriers/dhlshipping/bcs_bankdata_bankname';
    const CONFIG_XML_PATH_BANKDATA_IBAN = 'carriers/dhlshipping/bcs_bankdata_iban';
    const CONFIG_XML_PATH_BANKDATA_BIC = 'carriers/dhlshipping/bcs_bankdata_bic';
    const CONFIG_XML_PATH_BANKDATA_NOTE1 = 'carriers/dhlshipping/bcs_bankdata_note1';
    const CONFIG_XML_PATH_BANKDATA_NOTE2 = 'carriers/dhlshipping/bcs_bankdata_note2';
    const CONFIG_XML_PATH_BANKDATA_ACCOUNT_REFERENCE = 'carriers/dhlshipping/bcs_bankdata_account_reference';

    const CONFIG_XML_PATH_SHIPPER_CONTACT_COMPANYADDITION = 'carriers/dhlshipping/bcs_shipper_contact_company_addition';
    const CONFIG_XML_PATH_SHIPPER_CONTACT_DISPATCHINFO = 'carriers/dhlshipping/bcs_shipper_contact_dispatchinfo';

    /**
     * @deprecated since 0.6.0
     * @see BcsConfigInterface::CONFIG_XML_PATH_ACCOUNT_PARTICIPATIONS
     */
    const CONFIG_XML_PATH_ACCOUNT_PARTICIPATION = 'carriers/dhlshipping/bcs_account_participation';

    /**
     * @deprecated since 0.6.0
     * @see BcsConfigInterface::CONFIG_XML_PATH_SANDBOX_ACCOUNT_PARTICIPATIONS
     */
    const CONFIG_XML_PATH_SANDBOX_ACCOUNT_PARTICIPATION = 'carriers/dhlshipping/bcs_sandbox_account_participation';

    /**
     * Obtain API endpoint.
     *
     * @param mixed $store
     * @return string
     */
    public function getApiEndpoint($store = null);

    /**
     * Obtain auth credentials: username.
     *
     * @param mixed $store
     * @return string
     */
    public function getAuthUsername($store = null);

    /**
     * Obtain auth credentials: password.
     *
     * @param mixed $store
     * @return string
     */
    public function getAuthPassword($store = null);

    /**
     * Obtain DHL Business Customer Shipping contract data: username.
     *
     * @param mixed $store
     * @return string
     */
    public function getAccountUser($store = null);

    /**
     * Obtain DHL Business Customer Shipping contract data: signature.
     *
     * @param mixed $store
     * @return string
     */
    public function getAccountSignature($store = null);

    /**
     * Obtain DHL Business Customer Shipping contract data: ekp.
     *
     * @param mixed $store
     * @return string
     */
    public function getAccountEkp($store = null);

    /**
     * Obtain DHL Business Customer Shipping contract data: participation numbers.
     *
     * @param mixed $store
     * @return string[]
     */
    public function getAccountParticipations($store = null);

    /**
     * Obtain DHL Business Customer Shipping contract data: participation number for a given procedure.
     *
     * @param string $procedure
     * @param mixed  $store
     *
     * @return string
     */
    public function getAccountParticipation($procedure, $store = null);

    /**
     * @param mixed $store
     * @return string
     */
    public function getBankDataAccountOwner($store = null);

    /**
     * @param mixed $store
     * @return string
     */
    public function getBankDataBankName($store = null);

    /**
     * @param mixed $store
     * @return string
     */
    public function getBankDataIban($store = null);

    /**
     * @param mixed $store
     * @return string
     */
    public function getBankDataBic($store = null);

    /**
     * @param mixed $store
     * @return string[]
     */
    public function getBankDataNote($store = null);

    /**
     * @param mixed $store
     * @return string
     */
    public function getBankDataAccountReference($store = null);

    /**
     * Obtain name of shipper (first name part)
     *
     * @deprecated Shipment request uses name of currently logged in admin
     * @see \Magento\Shipping\Model\Shipping\Labels::requestToShipment()
     * @see \Magento\User\Model\User::getName()
     *
     * @param mixed $store
     * @return string
     */
    public function getShipperName($store = null);

    /**
     * Obtain shipper company name (second name part)
     *
     * @deprecated Shipment request uses config general/store_information/name
     * @see \Magento\Shipping\Model\Shipping\Labels::requestToShipment()
     * @see \Magento\Store\Model\Information::XML_PATH_STORE_INFO_NAME
     *
     * @param mixed $store
     * @return string
     */
    public function getShipperCompany($store = null);

    /**
     * Obtain shipper company name (third name part)
     *
     * @param mixed $store
     * @return string
     */
    public function getShipperCompanyAddition($store = null);

    /**
     * @deprecated Shipment request uses config general/store_information/name
     * @see \Magento\Shipping\Model\Shipping\Labels::requestToShipment()
     * @see \Magento\Store\Model\Information::XML_PATH_STORE_INFO_PHONE
     *
     * @param mixed $store
     * @return string
     */
    public function getShipperPhone($store = null);

    /**
     * @deprecated Shipment request uses email of currently logged in admin
     * @see \Magento\Shipping\Model\Shipping\Labels::requestToShipment()
     * @see \Magento\User\Model\User::getEmail()
     *
     * @param mixed $store
     * @return string
     */
    public function getShipperEmail($store = null);

    /**
     * @deprecated Shipment request uses config shipping/origin/street_line1
     * @see \Magento\Shipping\Model\Shipping\Labels::requestToShipment()
     * @see \Magento\Sales\Model\Order\Shipment::XML_PATH_STORE_ADDRESS1
     *
     * @param mixed $store
     * @return string
     */
    public function getShipperStreet($store = null);

    /**
     * @deprecated Shipment request uses config shipping/origin/street_line1
     * @see \Magento\Shipping\Model\Shipping\Labels::requestToShipment()
     * @see \Magento\Sales\Model\Order\Shipment::XML_PATH_STORE_ADDRESS1
     *
     * @param mixed $store
     * @return string
     */
    public function getShipperStreetNumber($store = null);

    /**
     * @deprecated Shipment request uses config shipping/origin/postcode
     * @see \Magento\Shipping\Model\Shipping\Labels::requestToShipment()
     * @see \Magento\Sales\Model\Order\Shipment::XML_PATH_STORE_ZIP
     *
     * @param mixed $store
     * @return string
     */
    public function getShipperPostalCode($store = null);

    /**
     * @deprecated Shipment request uses config shipping/origin/city
     * @see \Magento\Shipping\Model\Shipping\Labels::requestToShipment()
     * @see \Magento\Sales\Model\Order\Shipment::XML_PATH_STORE_CITY
     *
     * @param mixed $store
     * @return string
     */
    public function getShipperCity($store = null);

    /**
     * @deprecated Shipment request uses config shipping/origin/region_id
     * @see \Magento\Shipping\Model\Shipping\Labels::requestToShipment()
     * @see \Magento\Sales\Model\Order\Shipment::XML_PATH_STORE_REGION_ID
     *
     * @param mixed $store
     * @return string
     */
    public function getShipperRegion($store = null);

    /**
     * @deprecated Shipment request uses config shipping/origin/country_id
     * @see \Magento\Shipping\Model\Shipping\Labels::requestToShipment()
     * @see \Magento\Sales\Model\Order\Shipment::XML_PATH_STORE_COUNTRY_ID
     *
     * @param mixed $store
     * @return string
     */
    public function getShipperCountryISOCode($store = null);

    /**
     * @param mixed $store
     * @return string
     */
    public function getDispatchingInformation($store = null);
}

<?php

namespace Dhl\Shipping\Bcs;

class GVAPI_2_0_de extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
      'Version' => 'Dhl\\Shipping\\Bcs\\Version',
      'GetVersionResponse' => 'Dhl\\Shipping\\Bcs\\GetVersionResponse',
      'CreateShipmentOrderRequest' => 'Dhl\\Shipping\\Bcs\\CreateShipmentOrderRequest',
      'CreateShipmentOrderResponse' => 'Dhl\\Shipping\\Bcs\\CreateShipmentOrderResponse',
      'ShipmentOrderType' => 'Dhl\\Shipping\\Bcs\\ShipmentOrderType',
      'Shipment' => 'Dhl\\Shipping\\Bcs\\Shipment',
      'ShipmentDetailsTypeType' => 'Dhl\\Shipping\\Bcs\\ShipmentDetailsTypeType',
      'ShipmentDetailsType' => 'Dhl\\Shipping\\Bcs\\ShipmentDetailsType',
      'ShipmentItemType' => 'Dhl\\Shipping\\Bcs\\ShipmentItemType',
      'ShipmentService' => 'Dhl\\Shipping\\Bcs\\ShipmentService',
      'ServiceconfigurationDateOfDelivery' => 'Dhl\\Shipping\\Bcs\\ServiceconfigurationDateOfDelivery',
      'ServiceconfigurationDeliveryTimeframe' => 'Dhl\\Shipping\\Bcs\\ServiceconfigurationDeliveryTimeframe',
      'ServiceconfigurationISR' => 'Dhl\\Shipping\\Bcs\\ServiceconfigurationISR',
      'Serviceconfiguration' => 'Dhl\\Shipping\\Bcs\\Serviceconfiguration',
      'ServiceconfigurationShipmentHandling' => 'Dhl\\Shipping\\Bcs\\ServiceconfigurationShipmentHandling',
      'ServiceconfigurationEndorsement' => 'Dhl\\Shipping\\Bcs\\ServiceconfigurationEndorsement',
      'ServiceconfigurationVisualAgeCheck' => 'Dhl\\Shipping\\Bcs\\ServiceconfigurationVisualAgeCheck',
      'ServiceconfigurationDetails' => 'Dhl\\Shipping\\Bcs\\ServiceconfigurationDetails',
      'ServiceconfigurationCashOnDelivery' => 'Dhl\\Shipping\\Bcs\\ServiceconfigurationCashOnDelivery',
      'ServiceconfigurationAdditionalInsurance' => 'Dhl\\Shipping\\Bcs\\ServiceconfigurationAdditionalInsurance',
      'ServiceconfigurationIC' => 'Dhl\\Shipping\\Bcs\\ServiceconfigurationIC',
      'Ident' => 'Dhl\\Shipping\\Bcs\\Ident',
      'ShipmentNotificationType' => 'Dhl\\Shipping\\Bcs\\ShipmentNotificationType',
      'BankType' => 'Dhl\\Shipping\\Bcs\\BankType',
      'ShipperType' => 'Dhl\\Shipping\\Bcs\\ShipperType',
      'ShipperTypeType' => 'Dhl\\Shipping\\Bcs\\ShipperTypeType',
      'NameType' => 'Dhl\\Shipping\\Bcs\\NameType',
      'NativeAddressType' => 'Dhl\\Shipping\\Bcs\\NativeAddressType',
      'CountryType' => 'Dhl\\Shipping\\Bcs\\CountryType',
      'CommunicationType' => 'Dhl\\Shipping\\Bcs\\CommunicationType',
      'ReceiverType' => 'Dhl\\Shipping\\Bcs\\ReceiverType',
      'ReceiverTypeType' => 'Dhl\\Shipping\\Bcs\\ReceiverTypeType',
      'ReceiverNativeAddressType' => 'Dhl\\Shipping\\Bcs\\ReceiverNativeAddressType',
      'cis:PackStationType' => 'Dhl\\Shipping\\Bcs\\PackStationType',
      'cis:PostfilialeType' => 'Dhl\\Shipping\\Bcs\\PostfilialeType',
      'cis:ParcelShopType' => 'Dhl\\Shipping\\Bcs\\ParcelShopType',
      'ExportDocumentType' => 'Dhl\\Shipping\\Bcs\\ExportDocumentType',
      'ExportDocPosition' => 'Dhl\\Shipping\\Bcs\\ExportDocPosition',
      'Statusinformation' => 'Dhl\\Shipping\\Bcs\\Statusinformation',
      'CreationState' => 'Dhl\\Shipping\\Bcs\\CreationState',
      'LabelData' => 'Dhl\\Shipping\\Bcs\\LabelData',
      'DeleteShipmentOrderRequest' => 'Dhl\\Shipping\\Bcs\\DeleteShipmentOrderRequest',
      'DeleteShipmentOrderResponse' => 'Dhl\\Shipping\\Bcs\\DeleteShipmentOrderResponse',
      'DeletionState' => 'Dhl\\Shipping\\Bcs\\DeletionState',
    );

    /**
     * @param array $options A array of config values
     * @param string $wsdl The wsdl file to use
     */
    public function __construct(array $options = array(), $wsdl = null)
    {
      foreach (self::$classmap as $key => $value) {
        if (!isset($options['classmap'][$key])) {
          $options['classmap'][$key] = $value;
        }
      }
      $options = array_merge(array (
      'features' => 1,
    ), $options);
      if (!$wsdl) {
        $wsdl = 'https://cig.dhl.de/cig-wsdls/com/dpdhl/wsdl/geschaeftskundenversand-api/2.2/geschaeftskundenversand-api-2.2.wsdl';
      }
      parent::__construct($wsdl, $options);
    }

    /**
     * Returns the actual version of the implementation of the whole ISService
     *         webservice.
     *
     * @param Version $part1
     * @return GetVersionResponse
     */
    public function getVersion(Version $part1)
    {
      return $this->__soapCall('getVersion', array($part1));
    }

    /**
     * Creates shipments.
     *
     * @param CreateShipmentOrderRequest $part1
     * @return CreateShipmentOrderResponse
     */
    public function createShipmentOrder(CreateShipmentOrderRequest $part1)
    {
      return $this->__soapCall('createShipmentOrder', array($part1));
    }

    /**
     * Deletes the requested shipments.
     *
     * @param DeleteShipmentOrderRequest $part1
     * @return DeleteShipmentOrderResponse
     */
    public function deleteShipmentOrder(DeleteShipmentOrderRequest $part1)
    {
      return $this->__soapCall('deleteShipmentOrder', array($part1));
    }

}

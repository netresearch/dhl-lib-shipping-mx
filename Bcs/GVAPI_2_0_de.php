<?php

namespace Dhl\Versenden\Bcs;

class GVAPI_2_0_de extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
      'Version' => 'Dhl\\Versenden\\Bcs\\Version',
      'GetVersionResponse' => 'Dhl\\Versenden\\Bcs\\GetVersionResponse',
      'CreateShipmentOrderRequest' => 'Dhl\\Versenden\\Bcs\\CreateShipmentOrderRequest',
      'CreateShipmentOrderResponse' => 'Dhl\\Versenden\\Bcs\\CreateShipmentOrderResponse',
      'ShipmentOrderType' => 'Dhl\\Versenden\\Bcs\\ShipmentOrderType',
      'Shipment' => 'Dhl\\Versenden\\Bcs\\Shipment',
      'ShipmentDetailsTypeType' => 'Dhl\\Versenden\\Bcs\\ShipmentDetailsTypeType',
      'ShipmentDetailsType' => 'Dhl\\Versenden\\Bcs\\ShipmentDetailsType',
      'ShipmentItemType' => 'Dhl\\Versenden\\Bcs\\ShipmentItemType',
      'ShipmentService' => 'Dhl\\Versenden\\Bcs\\ShipmentService',
      'ServiceconfigurationDateOfDelivery' => 'Dhl\\Versenden\\Bcs\\ServiceconfigurationDateOfDelivery',
      'ServiceconfigurationDeliveryTimeframe' => 'Dhl\\Versenden\\Bcs\\ServiceconfigurationDeliveryTimeframe',
      'ServiceconfigurationISR' => 'Dhl\\Versenden\\Bcs\\ServiceconfigurationISR',
      'Serviceconfiguration' => 'Dhl\\Versenden\\Bcs\\Serviceconfiguration',
      'ServiceconfigurationShipmentHandling' => 'Dhl\\Versenden\\Bcs\\ServiceconfigurationShipmentHandling',
      'ServiceconfigurationEndorsement' => 'Dhl\\Versenden\\Bcs\\ServiceconfigurationEndorsement',
      'ServiceconfigurationVisualAgeCheck' => 'Dhl\\Versenden\\Bcs\\ServiceconfigurationVisualAgeCheck',
      'ServiceconfigurationDetails' => 'Dhl\\Versenden\\Bcs\\ServiceconfigurationDetails',
      'ServiceconfigurationCashOnDelivery' => 'Dhl\\Versenden\\Bcs\\ServiceconfigurationCashOnDelivery',
      'ServiceconfigurationAdditionalInsurance' => 'Dhl\\Versenden\\Bcs\\ServiceconfigurationAdditionalInsurance',
      'ServiceconfigurationIC' => 'Dhl\\Versenden\\Bcs\\ServiceconfigurationIC',
      'Ident' => 'Dhl\\Versenden\\Bcs\\Ident',
      'ShipmentNotificationType' => 'Dhl\\Versenden\\Bcs\\ShipmentNotificationType',
      'BankType' => 'Dhl\\Versenden\\Bcs\\BankType',
      'ShipperType' => 'Dhl\\Versenden\\Bcs\\ShipperType',
      'ShipperTypeType' => 'Dhl\\Versenden\\Bcs\\ShipperTypeType',
      'NameType' => 'Dhl\\Versenden\\Bcs\\NameType',
      'NativeAddressType' => 'Dhl\\Versenden\\Bcs\\NativeAddressType',
      'CountryType' => 'Dhl\\Versenden\\Bcs\\CountryType',
      'CommunicationType' => 'Dhl\\Versenden\\Bcs\\CommunicationType',
      'ReceiverType' => 'Dhl\\Versenden\\Bcs\\ReceiverType',
      'ReceiverTypeType' => 'Dhl\\Versenden\\Bcs\\ReceiverTypeType',
      'ReceiverNativeAddressType' => 'Dhl\\Versenden\\Bcs\\ReceiverNativeAddressType',
      'cis:PackStationType' => 'Dhl\\Versenden\\Bcs\\PackStationType',
      'cis:PostfilialeType' => 'Dhl\\Versenden\\Bcs\\PostfilialeType',
      'cis:ParcelShopType' => 'Dhl\\Versenden\\Bcs\\ParcelShopType',
      'ExportDocumentType' => 'Dhl\\Versenden\\Bcs\\ExportDocumentType',
      'ExportDocPosition' => 'Dhl\\Versenden\\Bcs\\ExportDocPosition',
      'Statusinformation' => 'Dhl\\Versenden\\Bcs\\Statusinformation',
      'CreationState' => 'Dhl\\Versenden\\Bcs\\CreationState',
      'LabelData' => 'Dhl\\Versenden\\Bcs\\LabelData',
      'DeleteShipmentOrderRequest' => 'Dhl\\Versenden\\Bcs\\DeleteShipmentOrderRequest',
      'DeleteShipmentOrderResponse' => 'Dhl\\Versenden\\Bcs\\DeleteShipmentOrderResponse',
      'DeletionState' => 'Dhl\\Versenden\\Bcs\\DeletionState',
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

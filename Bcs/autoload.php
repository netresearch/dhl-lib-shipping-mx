<?php


 function autoload_cb7a1e3c1c35d7211bbe881b51042ac1($class)
{
    $classes = array(
        'Dhl\Versenden\Bcs\GVAPI_2_0_de' => __DIR__ .'/GVAPI_2_0_de.php',
        'Dhl\Versenden\Bcs\Version' => __DIR__ .'/Version.php',
        'Dhl\Versenden\Bcs\GetVersionResponse' => __DIR__ .'/GetVersionResponse.php',
        'Dhl\Versenden\Bcs\CreateShipmentOrderRequest' => __DIR__ .'/CreateShipmentOrderRequest.php',
        'Dhl\Versenden\Bcs\CreateShipmentOrderResponse' => __DIR__ .'/CreateShipmentOrderResponse.php',
        'Dhl\Versenden\Bcs\ShipmentOrderType' => __DIR__ .'/ShipmentOrderType.php',
        'Dhl\Versenden\Bcs\Shipment' => __DIR__ .'/Shipment.php',
        'Dhl\Versenden\Bcs\ShipmentDetailsTypeType' => __DIR__ .'/ShipmentDetailsTypeType.php',
        'Dhl\Versenden\Bcs\ShipmentDetailsType' => __DIR__ .'/ShipmentDetailsType.php',
        'Dhl\Versenden\Bcs\ShipmentItemType' => __DIR__ .'/ShipmentItemType.php',
        'Dhl\Versenden\Bcs\ShipmentService' => __DIR__ .'/ShipmentService.php',
        'Dhl\Versenden\Bcs\ServiceconfigurationDateOfDelivery' => __DIR__ .'/ServiceconfigurationDateOfDelivery.php',
        'Dhl\Versenden\Bcs\ServiceconfigurationDeliveryTimeframe' => __DIR__ .'/ServiceconfigurationDeliveryTimeframe.php',
        'Dhl\Versenden\Bcs\ServiceconfigurationISR' => __DIR__ .'/ServiceconfigurationISR.php',
        'Dhl\Versenden\Bcs\Serviceconfiguration' => __DIR__ .'/Serviceconfiguration.php',
        'Dhl\Versenden\Bcs\ServiceconfigurationShipmentHandling' => __DIR__ .'/ServiceconfigurationShipmentHandling.php',
        'Dhl\Versenden\Bcs\ServiceconfigurationEndorsement' => __DIR__ .'/ServiceconfigurationEndorsement.php',
        'Dhl\Versenden\Bcs\ServiceconfigurationVisualAgeCheck' => __DIR__ .'/ServiceconfigurationVisualAgeCheck.php',
        'Dhl\Versenden\Bcs\ServiceconfigurationDetails' => __DIR__ .'/ServiceconfigurationDetails.php',
        'Dhl\Versenden\Bcs\ServiceconfigurationCashOnDelivery' => __DIR__ .'/ServiceconfigurationCashOnDelivery.php',
        'Dhl\Versenden\Bcs\ServiceconfigurationAdditionalInsurance' => __DIR__ .'/ServiceconfigurationAdditionalInsurance.php',
        'Dhl\Versenden\Bcs\ServiceconfigurationIC' => __DIR__ .'/ServiceconfigurationIC.php',
        'Dhl\Versenden\Bcs\Ident' => __DIR__ .'/Ident.php',
        'Dhl\Versenden\Bcs\ShipmentNotificationType' => __DIR__ .'/ShipmentNotificationType.php',
        'Dhl\Versenden\Bcs\BankType' => __DIR__ .'/BankType.php',
        'Dhl\Versenden\Bcs\ShipperType' => __DIR__ .'/ShipperType.php',
        'Dhl\Versenden\Bcs\ShipperTypeType' => __DIR__ .'/ShipperTypeType.php',
        'Dhl\Versenden\Bcs\NameType' => __DIR__ .'/NameType.php',
        'Dhl\Versenden\Bcs\NativeAddressType' => __DIR__ .'/NativeAddressType.php',
        'Dhl\Versenden\Bcs\CountryType' => __DIR__ .'/CountryType.php',
        'Dhl\Versenden\Bcs\CommunicationType' => __DIR__ .'/CommunicationType.php',
        'Dhl\Versenden\Bcs\ReceiverType' => __DIR__ .'/ReceiverType.php',
        'Dhl\Versenden\Bcs\ReceiverTypeType' => __DIR__ .'/ReceiverTypeType.php',
        'Dhl\Versenden\Bcs\ReceiverNativeAddressType' => __DIR__ .'/ReceiverNativeAddressType.php',
        'Dhl\Versenden\Bcs\PackStationType' => __DIR__ .'/PackStationType.php',
        'Dhl\Versenden\Bcs\PostfilialeType' => __DIR__ .'/PostfilialeType.php',
        'Dhl\Versenden\Bcs\ParcelShopType' => __DIR__ .'/ParcelShopType.php',
        'Dhl\Versenden\Bcs\ExportDocumentType' => __DIR__ .'/ExportDocumentType.php',
        'Dhl\Versenden\Bcs\ExportDocPosition' => __DIR__ .'/ExportDocPosition.php',
        'Dhl\Versenden\Bcs\Statusinformation' => __DIR__ .'/Statusinformation.php',
        'Dhl\Versenden\Bcs\CreationState' => __DIR__ .'/CreationState.php',
        'Dhl\Versenden\Bcs\LabelData' => __DIR__ .'/LabelData.php',
        'Dhl\Versenden\Bcs\DeleteShipmentOrderRequest' => __DIR__ .'/DeleteShipmentOrderRequest.php',
        'Dhl\Versenden\Bcs\DeleteShipmentOrderResponse' => __DIR__ .'/DeleteShipmentOrderResponse.php',
        'Dhl\Versenden\Bcs\DeletionState' => __DIR__ .'/DeletionState.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_cb7a1e3c1c35d7211bbe881b51042ac1');

// Do nothing. The rest is just leftovers from the code generation.
{
}

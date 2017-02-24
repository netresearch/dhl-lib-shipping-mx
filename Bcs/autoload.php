<?php


 function autoload_cb7a1e3c1c35d7211bbe881b51042ac1($class)
{
    $classes = array(
        'Dhl\Shipping\Bcs\GVAPI_2_0_de' => __DIR__ .'/GVAPI_2_0_de.php',
        'Dhl\Shipping\Bcs\Version' => __DIR__ .'/Version.php',
        'Dhl\Shipping\Bcs\GetVersionResponse' => __DIR__ .'/GetVersionResponse.php',
        'Dhl\Shipping\Bcs\CreateShipmentOrderRequest' => __DIR__ .'/CreateShipmentOrderRequest.php',
        'Dhl\Shipping\Bcs\CreateShipmentOrderResponse' => __DIR__ .'/CreateShipmentOrderResponse.php',
        'Dhl\Shipping\Bcs\ShipmentOrderType' => __DIR__ .'/ShipmentOrderType.php',
        'Dhl\Shipping\Bcs\Shipment' => __DIR__ .'/Shipment.php',
        'Dhl\Shipping\Bcs\ShipmentDetailsTypeType' => __DIR__ .'/ShipmentDetailsTypeType.php',
        'Dhl\Shipping\Bcs\ShipmentDetailsType' => __DIR__ .'/ShipmentDetailsType.php',
        'Dhl\Shipping\Bcs\ShipmentItemType' => __DIR__ .'/ShipmentItemType.php',
        'Dhl\Shipping\Bcs\ShipmentService' => __DIR__ .'/ShipmentService.php',
        'Dhl\Shipping\Bcs\ServiceconfigurationDateOfDelivery' => __DIR__ .'/ServiceconfigurationDateOfDelivery.php',
        'Dhl\Shipping\Bcs\ServiceconfigurationDeliveryTimeframe' => __DIR__ .'/ServiceconfigurationDeliveryTimeframe.php',
        'Dhl\Shipping\Bcs\ServiceconfigurationISR' => __DIR__ .'/ServiceconfigurationISR.php',
        'Dhl\Shipping\Bcs\Serviceconfiguration' => __DIR__ .'/Serviceconfiguration.php',
        'Dhl\Shipping\Bcs\ServiceconfigurationShipmentHandling' => __DIR__ .'/ServiceconfigurationShipmentHandling.php',
        'Dhl\Shipping\Bcs\ServiceconfigurationEndorsement' => __DIR__ .'/ServiceconfigurationEndorsement.php',
        'Dhl\Shipping\Bcs\ServiceconfigurationVisualAgeCheck' => __DIR__ .'/ServiceconfigurationVisualAgeCheck.php',
        'Dhl\Shipping\Bcs\ServiceconfigurationDetails' => __DIR__ .'/ServiceconfigurationDetails.php',
        'Dhl\Shipping\Bcs\ServiceconfigurationCashOnDelivery' => __DIR__ .'/ServiceconfigurationCashOnDelivery.php',
        'Dhl\Shipping\Bcs\ServiceconfigurationAdditionalInsurance' => __DIR__ .'/ServiceconfigurationAdditionalInsurance.php',
        'Dhl\Shipping\Bcs\ServiceconfigurationIC' => __DIR__ .'/ServiceconfigurationIC.php',
        'Dhl\Shipping\Bcs\Ident' => __DIR__ .'/Ident.php',
        'Dhl\Shipping\Bcs\ShipmentNotificationType' => __DIR__ .'/ShipmentNotificationType.php',
        'Dhl\Shipping\Bcs\BankType' => __DIR__ .'/BankType.php',
        'Dhl\Shipping\Bcs\ShipperType' => __DIR__ .'/ShipperType.php',
        'Dhl\Shipping\Bcs\ShipperTypeType' => __DIR__ .'/ShipperTypeType.php',
        'Dhl\Shipping\Bcs\NameType' => __DIR__ .'/NameType.php',
        'Dhl\Shipping\Bcs\NativeAddressType' => __DIR__ .'/NativeAddressType.php',
        'Dhl\Shipping\Bcs\CountryType' => __DIR__ .'/CountryType.php',
        'Dhl\Shipping\Bcs\CommunicationType' => __DIR__ .'/CommunicationType.php',
        'Dhl\Shipping\Bcs\ReceiverType' => __DIR__ .'/ReceiverType.php',
        'Dhl\Shipping\Bcs\ReceiverTypeType' => __DIR__ .'/ReceiverTypeType.php',
        'Dhl\Shipping\Bcs\ReceiverNativeAddressType' => __DIR__ .'/ReceiverNativeAddressType.php',
        'Dhl\Shipping\Bcs\PackStationType' => __DIR__ .'/PackStationType.php',
        'Dhl\Shipping\Bcs\PostfilialeType' => __DIR__ .'/PostfilialeType.php',
        'Dhl\Shipping\Bcs\ParcelShopType' => __DIR__ .'/ParcelShopType.php',
        'Dhl\Shipping\Bcs\ExportDocumentType' => __DIR__ .'/ExportDocumentType.php',
        'Dhl\Shipping\Bcs\ExportDocPosition' => __DIR__ .'/ExportDocPosition.php',
        'Dhl\Shipping\Bcs\Statusinformation' => __DIR__ .'/Statusinformation.php',
        'Dhl\Shipping\Bcs\CreationState' => __DIR__ .'/CreationState.php',
        'Dhl\Shipping\Bcs\LabelData' => __DIR__ .'/LabelData.php',
        'Dhl\Shipping\Bcs\DeleteShipmentOrderRequest' => __DIR__ .'/DeleteShipmentOrderRequest.php',
        'Dhl\Shipping\Bcs\DeleteShipmentOrderResponse' => __DIR__ .'/DeleteShipmentOrderResponse.php',
        'Dhl\Shipping\Bcs\DeletionState' => __DIR__ .'/DeletionState.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_cb7a1e3c1c35d7211bbe881b51042ac1');

// Do nothing. The rest is just leftovers from the code generation.
{
}

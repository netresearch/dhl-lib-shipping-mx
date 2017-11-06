<?php

namespace Dhl\Shipping\Bcs;

class ExportDocumentType
{
    /**
     * @var invoiceNumber
     */
    protected $invoiceNumber = null;

    /**
     * @var exportType
     */
    protected $exportType = null;

    /**
     * @var exportTypeDescription
     */
    protected $exportTypeDescription = null;

    /**
     * @var termsOfTrade
     */
    protected $termsOfTrade = null;

    /**
     * @var placeOfCommital
     */
    protected $placeOfCommital = null;

    /**
     * @var additionalFee
     */
    protected $additionalFee = null;

    /**
     * @var permitNumber
     */
    protected $permitNumber = null;

    /**
     * @var attestationNumber
     */
    protected $attestationNumber = null;

    /**
     * @var Serviceconfiguration
     */
    protected $WithElectronicExportNtfctn = null;

    /**
     * @var ExportDocPosition[]
     */
    protected $ExportDocPosition = null;

    /**
     * @param string $exportType
     * @param string $placeOfCommital
     * @param float  $additionalFee
     */
    public function __construct($exportType, $placeOfCommital, $additionalFee)
    {
        $this->exportType = $exportType;
        $this->placeOfCommital = $placeOfCommital;
        $this->additionalFee = $additionalFee;
    }

    /**
     * @return string
     */
    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    /**
     * @param string $invoiceNumber
     *
     * @return \Dhl\Shipping\Bcs\ExportDocumentType
     */
    public function setInvoiceNumber($invoiceNumber)
    {
        $this->invoiceNumber = $invoiceNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getExportType()
    {
        return $this->exportType;
    }

    /**
     * @param string $exportType
     *
     * @return \Dhl\Shipping\Bcs\ExportDocumentType
     */
    public function setExportType($exportType)
    {
        $this->exportType = $exportType;

        return $this;
    }

    /**
     * @return string
     */
    public function getExportTypeDescription()
    {
        return $this->exportTypeDescription;
    }

    /**
     * @param string $exportTypeDescription
     *
     * @return \Dhl\Shipping\Bcs\ExportDocumentType
     */
    public function setExportTypeDescription($exportTypeDescription)
    {
        $this->exportTypeDescription = $exportTypeDescription;

        return $this;
    }

    /**
     * @return string
     */
    public function getTermsOfTrade()
    {
        return $this->termsOfTrade;
    }

    /**
     * @param string $termsOfTrade
     *
     * @return \Dhl\Shipping\Bcs\ExportDocumentType
     */
    public function setTermsOfTrade($termsOfTrade)
    {
        $this->termsOfTrade = $termsOfTrade;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlaceOfCommital()
    {
        return $this->placeOfCommital;
    }

    /**
     * @param string $placeOfCommital
     *
     * @return \Dhl\Shipping\Bcs\ExportDocumentType
     */
    public function setPlaceOfCommital($placeOfCommital)
    {
        $this->placeOfCommital = $placeOfCommital;

        return $this;
    }

    /**
     * @return float
     */
    public function getAdditionalFee()
    {
        return $this->additionalFee;
    }

    /**
     * @param float $additionalFee
     *
     * @return \Dhl\Shipping\Bcs\ExportDocumentType
     */
    public function setAdditionalFee($additionalFee)
    {
        $this->additionalFee = $additionalFee;

        return $this;
    }

    /**
     * @return string
     */
    public function getPermitNumber()
    {
        return $this->permitNumber;
    }

    /**
     * @param string $permitNumber
     *
     * @return \Dhl\Shipping\Bcs\ExportDocumentType
     */
    public function setPermitNumber($permitNumber)
    {
        $this->permitNumber = $permitNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getAttestationNumber()
    {
        return $this->attestationNumber;
    }

    /**
     * @param string $attestationNumber
     *
     * @return \Dhl\Shipping\Bcs\ExportDocumentType
     */
    public function setAttestationNumber($attestationNumber)
    {
        $this->attestationNumber = $attestationNumber;

        return $this;
    }

    /**
     * @return Serviceconfiguration
     */
    public function getWithElectronicExportNtfctn()
    {
        return $this->WithElectronicExportNtfctn;
    }

    /**
     * @param Serviceconfiguration $WithElectronicExportNtfctn
     *
     * @return \Dhl\Shipping\Bcs\ExportDocumentType
     */
    public function setWithElectronicExportNtfctn($WithElectronicExportNtfctn)
    {
        $this->WithElectronicExportNtfctn = $WithElectronicExportNtfctn;

        return $this;
    }

    /**
     * @return ExportDocPosition[]
     */
    public function getExportDocPosition()
    {
        return $this->ExportDocPosition;
    }

    /**
     * @param ExportDocPosition[] $ExportDocPosition
     *
     * @return \Dhl\Shipping\Bcs\ExportDocumentType
     */
    public function setExportDocPosition(array $ExportDocPosition = null)
    {
        $this->ExportDocPosition = $ExportDocPosition;

        return $this;
    }
}

<?php

namespace Dhl\Shipping\Bcs;

class CreationState
{
    /**
     * @var SequenceNumber
     */
    protected $sequenceNumber = null;

    /**
     * @var LabelData
     */
    protected $LabelData = null;

    /**
     * @param SequenceNumber $sequenceNumber
     * @param LabelData      $LabelData
     */
    public function __construct($sequenceNumber, $LabelData)
    {
        $this->sequenceNumber = $sequenceNumber;
        $this->LabelData = $LabelData;
    }

    /**
     * @return SequenceNumber
     */
    public function getSequenceNumber()
    {
        return $this->sequenceNumber;
    }

    /**
     * @param SequenceNumber $sequenceNumber
     *
     * @return \Dhl\Shipping\Bcs\CreationState
     */
    public function setSequenceNumber($sequenceNumber)
    {
        $this->sequenceNumber = $sequenceNumber;

        return $this;
    }

    /**
     * @return LabelData
     */
    public function getLabelData()
    {
        return $this->LabelData;
    }

    /**
     * @param LabelData $LabelData
     *
     * @return \Dhl\Shipping\Bcs\CreationState
     */
    public function setLabelData($LabelData)
    {
        $this->LabelData = $LabelData;

        return $this;
    }
}

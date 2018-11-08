<?php

namespace Dhl\Shipping\Webservice\Schema\Bcs;

/**
 * Class Version
 */
class Version
{

    /**
     * @var majorRelease $majorRelease
     */
    protected $majorRelease;

    /**
     * @var minorRelease $minorRelease
     */
    protected $minorRelease;

    /**
     * @var build $build
     */
    protected $build;

    /**
     * @param majorRelease $majorRelease
     * @param minorRelease $minorRelease
     * @param build        $build
     */
    public function __construct($majorRelease, $minorRelease, $build)
    {
        $this->majorRelease = $majorRelease;
        $this->minorRelease = $minorRelease;
        $this->build = $build;
    }

    /**
     * @return majorRelease
     */
    public function getMajorRelease()
    {
        return $this->majorRelease;
    }

    /**
     * @param majorRelease $majorRelease
     *
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\Version
     */
    public function setMajorRelease($majorRelease)
    {
        $this->majorRelease = $majorRelease;
        return $this;
    }

    /**
     * @return minorRelease
     */
    public function getMinorRelease()
    {
        return $this->minorRelease;
    }

    /**
     * @param minorRelease $minorRelease
     *
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\Version
     */
    public function setMinorRelease($minorRelease)
    {
        $this->minorRelease = $minorRelease;
        return $this;
    }

    /**
     * @return build
     */
    public function getBuild()
    {
        return $this->build;
    }

    /**
     * @param build $build
     *
     * @return \Dhl\Shipping\Webservice\Schema\Bcs\Version
     */
    public function setBuild($build)
    {
        $this->build = $build;
        return $this;
    }

}

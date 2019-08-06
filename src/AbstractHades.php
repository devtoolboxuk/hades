<?php

namespace devtoolboxuk\hades;

use devtoolboxuk\hades\asphodel\AsphodelService;
use devtoolboxuk\hades\tartarus\TartarusService;
use devtoolboxuk\internetaddress\IP;
use devtoolboxuk\utilitybundle\UtilityService;

abstract class AbstractHades
{

    private $arrayUtility;

    protected $ban_period;
    protected $options;
    protected $interval;
    protected $infractions = [];
    protected $ban = 1;
    protected $ban_type = 1;

    protected $tartarusService;
    protected $asphodelService;
    public function __construct()
    {
        $utilityService = new UtilityService();
        $this->arrayUtility = $utilityService->arrays();

        $this->setOptions();

        $this->tartarusService = new TartarusService($this->options);
        $this->asphodelService = new AsphodelService($this->options);
    }

    /**
     * @param array $options
     * @return $this
     */
    public function setOptions($options = [])
    {
        $baseOptions = new BaseOptions();
        $this->options = (isset($this->options['Hades'])) ? $this->arrayUtility->arrayMergeRecursiveDistinct($baseOptions->getOptions(), $options) : $baseOptions->getOptions();

        $this->ban_period = (isset($this->options['Hades'])) ? $this->options['Hades']['ban_period'] : null;
        $this->interval = (isset($this->options['Hades'])) ? $this->options['Hades']['interval'] : null;
        $this->infractions = (isset($this->options['Hades'])) ? $this->options['Hades']['infractions'] : null;
        $this->ban = (isset($this->options['Hades'])) ? $this->options['Hades']['ban'] : null;
        $this->ban_type = (isset($this->options['Hades'])) ? $this->options['Hades']['type'] : null;
        return $this;
    }


    protected function convertIpAddressToLong($ip_address)
    {
        return IP::parse($ip_address)->toLong();
    }

    protected function getBanPeriod()
    {
        return $this->ban_period;
    }

    protected function getInterval()
    {
        return $this->interval;
    }

    protected function getInfractions()
    {
        return $this->infractions;
    }
}

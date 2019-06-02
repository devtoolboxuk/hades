<?php

namespace devtoolboxuk\hades;

use devtoolboxuk\utilitybundle\UtilityService;

abstract class AbstractHades
{
    /**
     * @var UtilityService
     */
    protected $utilityService;

    /**
     * @var array
     */
    protected $options = [];


    public function __construct($test)
    {
        $this->utilityService = new UtilityService();
        $baseOptions = new BaseOptions();
        $options = $baseOptions->getOptions();
        $this->options = $options['Hades'];
    }

    /**
     * @param array $options
     */
    public function setOptions($options = [])
    {
        if (isset($options['Hades'])) {
            $this->options = $this->utilityService->arrays()->arrayMergeRecursiveDistinct($this->options, $options['Hades']);
        }
    }

    /**
     * @param $name
     * @return |null
     */
    protected function getOption($name)
    {
        if (!$this->hasOption($name)) {
            return null;
        }
        return $this->options[$name];
    }

    /**
     * @param $name
     * @return bool
     */
    private function hasOption($name)
    {
        return isset($this->options[$name]);
    }

}

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

    public function __construct()
    {
        $this->utilityService = new UtilityService();
    }

    /**
     * @param array $options
     */
    public function setOptions($options = [])
    {
        $baseOptions = new BaseOptions();
        if (isset($options['Hades'])) {
            $this->options = $this->utilityService->arrays()->arrayMergeRecursiveDistinct($baseOptions->getOptions(), $options['Hades']);
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

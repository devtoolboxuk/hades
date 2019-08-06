<?php

namespace devtoolboxuk\hades\asphodel;

interface AsphodelRepository
{
    public function getInfractions(AsphodelLog $log);

    public function addToLog(AsphodelLog $log);
}

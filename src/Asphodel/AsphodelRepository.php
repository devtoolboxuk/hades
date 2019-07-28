<?php

namespace devtoolboxuk\hades\asphodel;

interface AsphodelRepository
{
    public function countInfractions(AsphodelLog $log);

    public function addLog(AsphodelLog $log);
}

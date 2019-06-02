<?php

namespace devtoolboxuk\hades\tartarus;

interface TartarusRepository
{
    public function checkTartarus(TartarusLog $log);

    public function removeTemporaryBan(TartarusLog $log);
}

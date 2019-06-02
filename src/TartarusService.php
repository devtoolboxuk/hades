<?php

namespace devtoolboxuk\hades;

use devtoolboxuk\hades\repositories\TartarusRepository;

class TartarusService
{
    private $tartarusRepository;

    public function __construct(TartarusRepository $tartarusRepository)
    {
        $this->tartarusRepository = $tartarusRepository;
    }

    public function checkTartarus()
    {

    }

}

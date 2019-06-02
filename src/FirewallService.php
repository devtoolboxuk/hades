<?php

namespace devtoolboxuk\hades;

use devtoolboxuk\hades\repositories\TartarusRepository;

final class FirewallService
{
    /**
     * @var TartarusService
     */
    private $tartarus;

    /**
     * @var TartarusRepository
     */
    private $tartarusRepository;

    public function __construct(TartarusRepository $tartarusRepository)
    {
        $this->tartarusRepository = $tartarusRepository;
        $this->tartarus = new TartarusService($tartarusRepository);
    }

    public function checkTartarus()
    {

    }
}

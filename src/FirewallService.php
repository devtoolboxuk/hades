<?php

namespace devtoolboxuk\hades;

use devtoolboxuk\hades\asphodel\AsphodelService;
use devtoolboxuk\hades\tartarus\TartarusService;
use devtoolboxuk\hades\tartarus\TartarusRepository;


class FirewallService extends AbstractHades
{
    protected $handlers = [];


    public function pushFireWallRepository(TartarusRepository $tartarusRepository)
    {
        return $this->tartarusService->pushFireWallRepository($tartarusRepository);
    }


    public function isBlocked($ip_address)
    {
        return $this->tartarusService->isBlocked($ip_address);
    }

    public function blockIp($ip_address, $type = 'T')
    {
        return $this->tartarusService->blockIp($ip_address, $type);
    }
}

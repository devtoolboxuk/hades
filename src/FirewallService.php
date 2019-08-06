<?php

namespace devtoolboxuk\hades;

use devtoolboxuk\hades\asphodel\AsphodelRepository;
use devtoolboxuk\hades\tartarus\TartarusRepository;

class FirewallService extends AbstractHades
{
    public function pushFireWallRepository(TartarusRepository $tartarusRepository)
    {
         $this->tartarusService->pushFireWallRepository($tartarusRepository);
         return $this;
    }

    public function pushLogRepository(AsphodelRepository $asphodelRepository)
    {
        $this->asphodelService->pushLogRepository($asphodelRepository);
        return $this;
    }

    public function isBlocked($ip_address)
    {
        return $this->tartarusService->isBlocked($ip_address);
    }

    public function blockIp($ip_address, $type = 'T')
    {
        return $this->tartarusService->blockIp($ip_address, $type);
    }

    public function addToLog($ip_address = '', $score = 0, $reference = '', $type = '', $comment = '')
    {
        $this->asphodelService->addToLog($ip_address, $score, $reference, $type, $comment);
    }

    public function checkInfractions($ip_address='',$type='')
    {
        return $this->asphodelService->checkInfractions($ip_address,$type);
    }

    public function countInfractions($ip_address,$type='')
    {
        return $this->asphodelService->countInfractions($ip_address,$type);
    }

    public function getInfractionsScore($ip_address,$type='')
    {
        return $this->asphodelService->getInfractionsScore($ip_address,$type);
    }
}

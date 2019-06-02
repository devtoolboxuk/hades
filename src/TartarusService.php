<?php

namespace devtoolboxuk\hades;

use devtoolboxuk\hades\tartarus\Log;
use devtoolboxuk\hades\tartarus\TartarusRepository;

class TartarusService
{
    private $tartarusRepository;
    private $log;

    public function __construct(TartarusRepository $tartarusRepository)
    {
        $this->tartarusRepository = $tartarusRepository;
        $this->log = new Log();
    }

    public function getTartarus($ip_address)
    {
        $this->log->setIpAddress($ip_address);
        return $this->tartarusRepository->checkTartarus($this->log);
    }

}

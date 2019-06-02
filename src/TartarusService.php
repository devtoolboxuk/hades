<?php

namespace devtoolboxuk\hades;

use devtoolboxuk\hades\tartarus\TartarusLog;
use devtoolboxuk\hades\tartarus\TartarusRepository;

final class TartarusService
{
    /**
     * @var TartarusRepository
     */
    private $tartarusRepository;

    /**
     * @var TartarusLog
     */
    private $tartarusLog;

    public function __construct(TartarusRepository $tartarusRepository)
    {
        $this->tartarusRepository = $tartarusRepository;
        $this->tartarusLog = new TartarusLog();
    }

    /**
     * @param $ip_address
     * @return mixed
     */
    public function getTartarus($ip_address)
    {
        $this->tartarusLog->setIpAddress($ip_address);
        return $this->tartarusRepository->checkTartarus($this->tartarusLog);
    }

    /**
     * @param $ip_address
     * @return mixed
     */
    public function removeTemporaryBan($ip_address)
    {
        $this->tartarusLog->setIpAddress($ip_address);
        return $this->tartarusRepository->removeTemporaryBan($this->tartarusLog);
    }


}

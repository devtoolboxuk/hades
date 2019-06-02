<?php

namespace devtoolboxuk\hades;

use devtoolboxuk\hades\Log\TartarusModel;
use devtoolboxuk\hades\tartarus\TartarusRepository;

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

    private function getTartarus($ip_address)
    {
        $data = $this->tartarus->getTartarus($ip_address);

        return new TartarusModel(
            isset($data['ip_address']) ? $data['ip_address'] : 0,
            isset($data['type']) ? $data['type'] : '',
            isset($data['comment']) ? $data['comment'] : '',
            isset($data['updated_at']) ? $data['updated_at'] : null
        );
    }

    public function minos($ip_address)
    {
        $tartarus = $this->getTartarus($ip_address);
        return $tartarus->isBlocked();
    }
}

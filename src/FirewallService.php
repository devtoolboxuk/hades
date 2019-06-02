<?php

namespace devtoolboxuk\hades;

use devtoolboxuk\hades\Model\TartarusModel;
use devtoolboxuk\hades\tartarus\TartarusRepository;
use devtoolboxuk\internetaddress\IP;
use devtoolboxuk\utilitybundle\UtilityService;

final class FirewallService extends AbstractHades
{
    /**
     * @var TartarusService
     */
    private $tartarus;

    /**
     * @var TartarusRepository
     */
    private $tartarusRepository;

    /**
     * FirewallService constructor.
     * @param TartarusRepository $tartarusRepository
     */
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
            isset($data['updated_at']) ? $data['updated_at'] : null,
            $this->getOption('ban_period')

        );
    }

    /**
     * @param $ip_address
     * @param string $ipType
     * @return bool|null
     */
    public function minos($ip_address,$ipType = 'v4')
    {

        $ip_address = $this->convertIpAddress($ip_address,$ipType);

        $tartarus = $this->getTartarus($ip_address);

        if ($tartarus->removeBan()) {
            $this->removeTemporaryBan($ip_address);
        }

        return $tartarus->isBlocked();
    }

    /**
     * @param $ip_address
     */
    private function removeTemporaryBan($ip_address)
    {
        $this->tartarus->removeTemporaryBan($ip_address);
    }

    /**
     * @param $ip_address
     * @param string $ipType
     * @return string|null
     */
    private function convertIpAddress($ip_address,$ipType = 'v4')
    {
        $ip = null;
        switch ($ipType) {
            case 'v6':
                //TODO
                break;
            case 'v4':
            default:
                $ip = IP::parse($ip_address)->toLong();
                break;
        }

        return $ip;
    }
}

<?php

namespace devtoolboxuk\hades\tartarus;

use devtoolboxuk\hades\AbstractHades;

class TartarusService extends AbstractHades
{

    protected $tartarusRepositories = [];
    private $tartarusLog;

    public function __construct($options = [])
    {
        $this->setOptions($options);
        $this->tartarusLog = new TartarusLog();
    }

    public function pushFireWallRepository(TartarusRepository $tartarusRepository)
    {
        array_unshift($this->tartarusRepositories, $tartarusRepository);
        return $this;
    }

    public function blockIp($ip_address, $type = 'T')
    {
        $this->tartarusLog->setIpAddress($this->convertIpAddressToLong($ip_address));
    }

    public function isBlocked($ip_address)
    {
        $this->tartarusLog->setIpAddress($this->convertIpAddressToLong($ip_address));

        foreach ($this->tartarusRepositories as $tartarusRepository) {

            $data = $tartarusRepository->checkTartarus($this->tartarusLog);

            $tartarus = new TartarusModel(
                isset($data['ip_address']) ? $data['ip_address'] : 0,
                isset($data['type']) ? $data['type'] : '',
                isset($data['comment']) ? $data['comment'] : '',
                isset($data['created']) ? $data['created'] : null,
                $this->getBanPeriod()
            );

            if ($this->getBlockedStatus($tartarus)) {
                return true;
            }
        }
        return false;
    }


    private function getBlockedStatus(TartarusModel $tartarus)
    {
        if (!$tartarus->isBlocked()) {
            if ($tartarus->removeBan()) {
                $this->removeBan($tartarus);
            }
            return null;
        }
        return true;
    }

    private function removeBan(TartarusModel $tartarus)
    {
        $this->tartarusLog->setIpAddress($tartarus->getIpAddress());
        foreach ($this->tartarusRepositories as $tartarusRepository) {
            $tartarusRepository->removeTemporaryBan($this->tartarusLog);
        }
    }

}

<?php

namespace devtoolboxuk\hades\asphodel;

use devtoolboxuk\hades\AbstractHades;

class AsphodelService extends AbstractHades
{

    protected $asphodelMeadowRepositories = [];

    private $asphodelLog;

    public function __construct($options = [])
    {
        $this->setOptions($options);
        $this->asphodelLog = new AsphodelLog();
    }

    public function pushLogRepository(AsphodelRepository $tartarusRepository)
    {
        array_unshift($this->asphodelMeadowRepositories, $tartarusRepository);
        return $this;
    }

    public function addLog($ip_address, $type = 'T')
    {
        $this->asphodelLog->setIpAddress($this->convertIpAddressToLong($ip_address));
    }

    public function countInfractions($ip_address,$type)
    {
        $this->asphodelLog->setIpAddress($this->convertIpAddressToLong($ip_address));

        foreach ($this->asphodelMeadowRepositories as $asphodelMeadowRepository) {

            $data = $asphodelMeadowRepository->checkTartarus($this->asphodelLog);

            $asphodel = new AsphodelModel(
                isset($data['ip_address']) ? $data['ip_address'] : 0,
                isset($data['type']) ? $data['type'] : '',
                isset($data['comment']) ? $data['comment'] : '',
                isset($data['updated_at']) ? $data['updated_at'] : null
            );

            if ($this->getBlockedStatus($asphodel)) {
                return true;
            }
        }
        return false;
    }

}

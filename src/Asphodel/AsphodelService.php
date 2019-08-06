<?php

namespace devtoolboxuk\hades\asphodel;

use devtoolboxuk\hades\AbstractHades;
use devtoolboxuk\utilitybundle\UtilityService;

class AsphodelService extends AbstractHades
{

    protected $asphodelMeadowRepositories = [];

    private $asphodelLog;
    private $utilityService;


    public function __construct($options = [])
    {
        $this->setOptions($options);
        $this->asphodelLog = new AsphodelLog();
        $this->utilityService = new UtilityService();
        $this->infractions = [];
    }

    public function pushLogRepository(AsphodelRepository $tartarusRepository)
    {
        array_unshift($this->asphodelMeadowRepositories, $tartarusRepository);
        return $this;
    }

    public function addToLog($ip_address = '', $score = 0, $reference = '', $type = '', $comment = '')
    {
        $this->asphodelLog->setLog(new AsphodelModel(
            $this->convertIpAddressToLong($ip_address),
            $score,
            $reference,
            $type,
            $comment
        ));

        foreach ($this->asphodelMeadowRepositories as $asphodelMeadowRepository) {
            $asphodelMeadowRepository->addToLog($this->asphodelLog);
        }
    }

    public function checkInfractions($ip_address, $type = '')
    {
        $checkDate = $this->utilityService->date()->modify(sprintf('-%d seconds', $this->interval));

        $this->asphodelLog->setInfraction(new AsphodelModel(
            $this->convertIpAddressToLong($ip_address),
            0,
            '',
            $type,
            '',
            $checkDate
        ));

        foreach ($this->asphodelMeadowRepositories as $asphodelMeadowRepository) {

            $data = $asphodelMeadowRepository->getInfractions($this->asphodelLog);

            if ($type != '') {
                $this->infractions[$ip_address][$type] = $data;
            } else {
                $this->infractions[$ip_address] = $data;
            }


        }
    }

    public function countInfractions($ip_address, $type = '')
    {
        $none = 0;

        switch ($type) {
            case '':
                if (isset($this->infractions[$ip_address]) && isset($this->infractions[$ip_address])) {
                    return count($this->infractions[$ip_address]);
                }
                return $none;
                break;
            default:
                if (isset($this->infractions[$ip_address]) && isset($this->infractions[$ip_address][$type])) {
                    return count($this->infractions[$ip_address][$type]);
                }
                return $none;
                break;
        }
    }


    public function getInfractionsScore($ip_address, $type = '')
    {
        $score = 0;

        switch ($type) {
            case '':
                if (isset($this->infractions[$ip_address]) && isset($this->infractions[$ip_address])) {
                    $score = $this->loopInfractions($score, $this->infractions[$ip_address]);
                }
                return $score;
                break;
            default:
                if (isset($this->infractions[$ip_address]) && isset($this->infractions[$ip_address][$type])) {
                    $score = $this->loopInfractions($score, $this->infractions[$ip_address][$type]);
                }
                return $score;
                break;
        }
    }

    private function loopInfractions($score, $infractions)
    {
        foreach ($infractions as $infraction) {
            $score += $infraction['score'];
        }
        return $score;
    }


}

<?php

namespace devtoolboxuk\hades\tartarus;

final class TartarusLog
{

    /**
     * @var integer
     */
    private $ip_address;

    /**
     * @return int
     */
    public function getIpAddress()
    {
        return $this->ip_address;
    }

    /**
     * @param $ipAddress
     */
    public function setIpAddress($ipAddress)
    {
        $this->ip_address = $ipAddress;
    }

}

<?php

namespace devtoolboxuk\hades\tartarus;

final class Log
{

    /**
     * @var integer
     */
    private $ip_address;

    /**
     * @var string
     */
    private $type;


    /**
     * @return int
     */
    public function getIpAddress()
    {
        return $this->ip_address;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    public function setIpAddress($ipAddress)
    {
        $this->ip_address = $ipAddress;
    }
}

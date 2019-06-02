<?php

namespace devtoolboxuk\hades\tartarus;

final class Tartarus
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

}

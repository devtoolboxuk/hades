<?php

namespace devtoolboxuk\hades\Log;

class LogModel
{
    private $ip_address;
    private $score;
    private $reference;
    private $type;
    private $comment;

    function __construct($ip_address, $score, $reference, $type, $comment)
    {
        $this->ip_address = $ip_address;
        $this->score = $score;
        $this->reference = $reference;
        $this->type = $type;
        $this->comment = $comment;
    }

    function setComment($data)
    {
        $this->comment = $data;
    }

    function setType($data)
    {
        $this->type = $data;
    }

    function setScore($data)
    {
        $this->score = $data;
    }

    function setReference($data)
    {
        $this->reference = $data;
    }

    public function setIpAddress()
    {
        return $this->ip_address;
    }


    public function getComment()
    {
        return $this->comment;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function getReference()
    {
        return $this->reference;
    }

    public function getIpAddress()
    {
        return $this->ip_address;
    }


}

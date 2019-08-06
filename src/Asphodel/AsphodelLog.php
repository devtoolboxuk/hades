<?php

namespace devtoolboxuk\hades\asphodel;

final class AsphodelLog
{

    private $ip_address;
    private $score;
    private $type;
    private $date;
    private $reference;
    private $comment;
    private $created;

    /**
     * @return int
     */
    public function getIpAddress()
    {
        return $this->ip_address;
    }

    public function setLog(AsphodelModel $model)
    {
        $this->ip_address = $model->getIpAddress();
        $this->score = $model->getScore();
        $this->reference = $model->getReference();
        $this->type = $model->getType();
        $this->comment = $model->getComment();
    }

    public function setInfraction(AsphodelModel $model)
    {
        $this->ip_address = $model->getIpAddress();
        $this->created = $model->getCreated();
    }


    public function toArray()
    {
        return [
            'ip_address'=>$this->getIpAddress(),
            'score'=>$this->getScore(),
            'reference'=>$this->getReference(),
            'type'=>$this->getType(),
            'comment'=>$this->getComment(),
            'created'=>$this->getCreated(),
        ];
    }
    /**
     * @param $ipAddress
     */
    public function setIpAddress($ipAddress)
    {
        $this->ip_address = $ipAddress;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }

    public function getComment()
    {
        return ($this->comment) ? $this->comment : null;
    }

    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function setScore($score)
    {
        $this->score = $score;
    }

    public function getReference()
    {
        return $this->reference;
    }

    public function setReference($reference)
    {
        $this->reference = $reference;
    }

}

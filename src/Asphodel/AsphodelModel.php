<?php

namespace devtoolboxuk\hades\asphodel;

use devtoolboxuk\utilitybundle\UtilityService;

class AsphodelModel
{

    private $ip_address;
    private $score;
    private $reference;
    private $type;
    private $comment;
    private $created;

    /**
     * @var UtilityService
     */
    private $utilityService;

    /**
     * AsphodelModel constructor.
     * @param int $ip_address
     * @param int $score
     * @param string $reference
     * @param string $type
     * @param string $comment
     * @param null $updated_at
     */
    function __construct($ip_address = 0, $score = 0, $reference = '', $type = '', $comment = '', $created = null)
    {

        $this->ip_address = $ip_address;
        $this->score = $score;
        $this->reference = $reference;
        $this->type = $type;
        $this->comment = $comment;
        $this->created = $created;
        $this->utilityService = new UtilityService();
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'ip_address' => $this->getIpAddress(),
            'score' => $this->getScore(),
            'reference' => $this->getReference(),
            'type' => $this->getType(),
            'comment' => $this->getComment(),
            'created' => $this->getCreated(),
        ];
    }

    /**
     * @return int
     */
    public function getIpAddress()
    {
        return $this->ip_address;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @return \DateTime|null
     */
    public function getCreated()
    {
        return $this->created;
    }

}

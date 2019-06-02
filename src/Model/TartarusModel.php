<?php

namespace devtoolboxuk\hades\Log;

class TartarusModel
{

    /**
     * @var integer
     */
    private $ip_address;

    /**
     * @var string
     */
    private $blockType;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var \DateTime|null
     */
    private $updated_at;

    /**
     * TartarusModel constructor.
     * @param int $ip_address
     * @param string $blockType
     * @param string $comment
     * @param null $updated_at
     */
    function __construct($ip_address = 0, $blockType = '', $comment = '', $updated_at = null)
    {
        $this->ip_address = $ip_address;
        $this->blockType = $blockType;
        $this->comment = $comment;
        $this->updated_at = $updated_at;
    }

    /**
     * @param $ip_address
     */
    public function setIpAddress($ip_address)
    {
        $this->ip_address = $ip_address;
    }

    /**
     * @return int
     */
    public function getIpAddress()
    {
        return $this->ip_address;
    }

    /**
     * @param $blockType
     */
    public function setBlockType($blockType)
    {
        $this->blockType = $blockType;
    }

    /**
     * @return string
     */
    public function getBlockType()
    {
        return $this->blockType;
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
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }


}

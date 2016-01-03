<?php
namespace Redbox\Twitch\Entity;

/**
 * Class Stream
 * @package Redbox\Twitch\Entity
 */
class StreamSummary
{
    /**
     * @var int
     */
    protected $channels = 0;

    /**
     * @var int
     */
    protected $viewers = 0;

    /**
     * @return int
     */
    public function getChannels()
    {
        return $this->channels;
    }

    /**
     * @param int $channels
     */
    public function setChannels($channels)
    {
        $this->channels = $channels;
    }

    /**
     * @return int
     */
    public function getViewers()
    {
        return $this->viewers;
    }

    /**
     * @param int $viewers
     */
    public function setViewers($viewers)
    {
        $this->viewers = $viewers;
    }

}
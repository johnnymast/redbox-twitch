<?php
namespace Redbox\Twitch\Entity;

/**
 * Class Stream
 * @package Redbox\Twitch\Entity
 */
class Stream {

    /**
     * @var string
     */
    protected $video_height;

    /**
     * @var string
     */
    protected $average_fps;

    /**
     * @var string
     */
    protected $is_playlist;

    /**
     * @var string
     */
    protected $created_at;

    /**
     * @var \stdClass
     */
    protected $channel;

    /**
     * @var bool
     */
    protected $online;

    /**
     * @var \stdClass
     */
    protected $preview;

    /**
     * @var string
     */
    protected $viewers;

    /**
     * @var string
     */
    protected $delay;

    /**
     * @var string
     */
    protected $game;

    /**
     * @var int
     */
    protected $id;

    /**
     * @return string
     */
    public function getVideoHeight()
    {
        return $this->video_height;
    }

    /**
     * @param string $video_height
     */
    public function setVideoHeight($video_height)
    {
        $this->video_height = $video_height;
    }

    /**
     * @return string
     */
    public function getAverageFps()
    {
        return $this->average_fps;
    }

    /**
     * @param string $average_fps
     */
    public function setAverageFps($average_fps)
    {
        $this->average_fps = $average_fps;
    }

    /**
     * @return string
     */
    public function getIsPlaylist()
    {
        return $this->is_playlist;
    }

    /**
     * @param string $is_playlist
     */
    public function setIsPlaylist($is_playlist)
    {
        $this->is_playlist = $is_playlist;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param string $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return \stdClass
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * @param \stdClass $channel
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;
    }

    /**
     * @return boolean
     */
    public function isOnline()
    {
        return $this->online;
    }

    /**
     * @param boolean $online
     */
    public function setOnline($online)
    {
        $this->online = $online;
    }

    /**
     * @return \stdClass
     */
    public function getPreview()
    {
        return $this->preview;
    }

    /**
     * @param \stdClass $preview
     */
    public function setPreview($preview)
    {
        $this->preview = $preview;
    }

    /**
     * @return string
     */
    public function getViewers()
    {
        return $this->viewers;
    }

    /**
     * @param string $viewers
     */
    public function setViewers($viewers)
    {
        $this->viewers = $viewers;
    }

    /**
     * @return string
     */
    public function getDelay()
    {
        return $this->delay;
    }

    /**
     * @param string $delay
     */
    public function setDelay($delay)
    {
        $this->delay = $delay;
    }

    /**
     * @return string
     */
    public function getGame()
    {
        return $this->game;
    }

    /**
     * @param string $game
     */
    public function setGame($game)
    {
        $this->game = $game;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


}
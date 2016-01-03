<?php
namespace Redbox\Twitch\Entity;

/**
 * Class Stream
 * @package Redbox\Twitch\Entity
 */
class FeaturedStream
{
    /**
     * @var bool
     */
    protected $sponsored;

    /**
     * @var bool
     */
    protected $scheduled;

    /**
     * @var bool
     */
    protected $priority;

    /**
     * @var Stream;
     */
    protected $stream;

    /**
     * @var string
     */
    protected $image;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $text;

    /**
     * @return boolean
     */
    public function isSponsored()
    {
        return $this->sponsored;
    }

    /**
     * @param boolean $sponsored
     */
    public function setSponsored($sponsored)
    {
        $this->sponsored = $sponsored;
    }

    /**
     * @return boolean
     */
    public function isScheduled()
    {
        return $this->scheduled;
    }

    /**
     * @param boolean $scheduled
     */
    public function setScheduled($scheduled)
    {
        $this->scheduled = $scheduled;
    }

    /**
     * @return boolean
     */
    public function isPriority()
    {
        return $this->priority;
    }

    /**
     * @param boolean $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * @return Stream
     */
    public function getStream()
    {
        return $this->stream;
    }

    /**
     * @param Stream $stream
     */
    public function setStream($stream)
    {
        $this->stream = $stream;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }
}
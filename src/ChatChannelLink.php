<?php
namespace Redbox\Twitch;

class ChatChannelLink {

    /**
     * @var string
     */
    protected $emoticons;

    /**
     * @var string
     */
    protected $badges;

    /**
     * @var string
     */
    protected $self;

    /**
     * @return string
     */
    public function getEmoticons()
    {
        return $this->emoticons;
    }

    /**
     * @param string $emoticons
     */
    public function setEmoticons($emoticons)
    {
        $this->emoticons = $emoticons;
    }

    /**
     * @return string
     */
    public function getBadges()
    {
        return $this->badges;
    }

    /**
     * @param string $badges
     */
    public function setBadges($badges)
    {
        $this->badges = $badges;
    }

    /**
     * @return string
     */
    public function getSelf()
    {
        return $this->self;
    }

    /**
     * @param string $self
     */
    public function setSelf($self)
    {
        $this->self = $self;
    }

}
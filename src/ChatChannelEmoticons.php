<?php
namespace Redbox\Twitch;

class ChatChannelEmoticons
{
    /**
     * @var array
     */
    protected $emoticons = [];

    /**
     * @return array
     */
    public function getEmoticons()
    {
        return $this->emoticons;
    }

    /**
     * @param array $emoticons
     */
    public function setEmoticons($emoticons)
    {
        $this->emoticons = $emoticons;
    }
}
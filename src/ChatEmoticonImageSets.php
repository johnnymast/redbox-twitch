<?php
namespace Redbox\Twitch;

class ChatEmoticonImageSets {

    /**
     * @var array
     */
    protected $emoticon_sets = [];

    /**
     * @return array
     */
    public function getEmoticonSets()
    {
        return $this->emoticon_sets;
    }

    /**
     * @param array $emoticon_sets
     */
    public function setEmoticonSets($emoticon_sets)
    {
        $this->emoticon_sets = $emoticon_sets;
    }
}
<?php
namespace Redbox\Twitch\Resource;
use Redbox\Twitch\Exception;
use Redbox\Twitch;

class Chat extends ResourceAbstract
{

    public function getChannelLinks($args = array())
    {
        $response = $this->call('getChannelLinks', $args);

        if (is_object($response) === true && isset($response->_links) === true) {
            $channel_link = new Twitch\ChatChannelLink;
            $channel_link->setEmoticons($response->_links->emoticons);
            $channel_link->setBadges($response->_links->badges);
            $channel_link->setSelf($response->_links->self);

            return $channel_link;
        }
        return false;
    }

    /**
     * NOTE: /chat/emoticons seems no longer supported a since march 2015 it returns a 504
     * see https://github.com/johnnymast/redbox-twitch/issues/4
     *
     * @deprecated
     * @param array $args
     * @throws Exception\RuntimeException
     */
    public function getEmoticons($args = array())
    {
        // TODO Not done
        throw new Exception\RuntimeException('Not implemented do to 504 on twitch API.');
    }

    public function getChannelEmoticons($args = array())
    {
        $response = $this->call('getChannelEmoticons', $args);

        $channel_emoticons = new Twitch\ChatChannelEmoticons;

        if (is_object($response) === true && isset($response->emoticons) === true) {
            $channel_emoticons->setEmoticons($response->emoticons);
            return $channel_emoticons;
        }
        return false;
    }

    public function getChannelBadges($args = array())
    {
        $response = $this->call('getChannelBadges', $args);

        $channel_badges = new Twitch\ChatChannelBadges;

        if (is_object($response) === true && isset($response->broadcaster) === true) {

            $channel_badges->setAdmin($response->admin);
            $channel_badges->setBroadcaster($response->broadcaster);
            $channel_badges->setSubscriber($response->subscriber);
            $channel_badges->setGlobalMod($response->global_mod);
            $channel_badges->setStaff($response->staff);
            $channel_badges->setTurbo($response->turbo);
            $channel_badges->setMod($response->mod);
            return $channel_badges;
        }
        return false;
    }

    public function getEmoticonImages($args = array())
    {
        $response = $this->call('getEmoticonImages', $args);

        $emoticon_images = new Twitch\ChatEmoticonImages;

        if (is_object($response) === true && isset($response->emoticons) === true) {
            $emoticon_images->setEmoticons($response->emoticons);
        }

        return $emoticon_images;
    }

    public function getEmoticonSets($args = array())
    {
        $response = $this->call('getEmoticonSets', $args);

        $emoticon_sets = new Twitch\ChatEmoticonImageSets;
    print_r($emoticon_sets);
        if (is_object($response) === true && isset($response->emoticon_sets) === true) {
            $emoticon_sets->setEmoticonSets($response->emoticon_sets);
        }

        return $emoticon_sets;
    }

}
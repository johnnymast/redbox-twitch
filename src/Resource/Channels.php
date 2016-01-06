<?php
namespace Redbox\Twitch\Resource;
use Redbox\Twitch\Exception;
use Redbox\Twitch\Entity;

class Channels extends ResourceAbstract
{
    public function getChannel($args = array())
    {
        $response = $this->call('getChannel', $args);

        $channel = new Entity\Channel;

        if (isset($response->profile_banner_background_color)) {
            $channel->setProfileBannerBackgroundColor($response->profile_banner_background_color);
            $channel->setBroadcasterLanguage($response->broadcaster_language);
            $channel->setProfileBanner($response->profile_banner);
            $channel->setVideoBanner($response->video_banner);
            $channel->setDisplayName($response->display_name);
            $channel->setCreatedAt($response->created_at);
            $channel->setUpdatedAt($response->updated_at);
            $channel->setBackground($response->background);
            $channel->setStreamKey($response->stream_key);
            $channel->setFollowers($response->followers);
            $channel->setLanguage($response->language);
            $channel->setPartner($response->partner);
            $channel->setBanner($response->banner);
            $channel->setMature($response->mature);
            $channel->setStatus($response->status);
            $channel->setDelay($response->delay);
            $channel->setViews($response->views);
            $channel->setEmail($response->email);
            $channel->setGame($response->game);
            $channel->setName($response->name);
            $channel->setLogo($response->logo);
            $channel->setUrl($response->url);
        }

        return $channel;
    }

    public function getChannelByName($args = array())
    {
        $response = $this->call('getChannelByName', $args);

        $channel = new Entity\Channel;

        if (isset($response->profile_banner_background_color)) {
            $channel->setProfileBannerBackgroundColor($response->profile_banner_background_color);
            $channel->setBroadcasterLanguage($response->broadcaster_language);
            $channel->setProfileBanner($response->profile_banner);
            $channel->setVideoBanner($response->video_banner);
            $channel->setDisplayName($response->display_name);
            $channel->setCreatedAt($response->created_at);
            $channel->setUpdatedAt($response->updated_at);
            $channel->setBackground($response->background);
            $channel->setStreamKey($response->stream_key);
            $channel->setFollowers($response->followers);
            $channel->setLanguage($response->language);
            $channel->setPartner($response->partner);
            $channel->setBanner($response->banner);
            $channel->setMature($response->mature);
            $channel->setStatus($response->status);
            $channel->setDelay($response->delay);
            $channel->setViews($response->views);
            $channel->setEmail($response->email);
            $channel->setGame($response->game);
            $channel->setName($response->name);
            $channel->setLogo($response->logo);
            $channel->setUrl($response->url);
        }

        return $channel;
    }

    public function getChannelVideos($args = array())
    {
        $response = $this->call('getChannelVideos', $args);

        $videos = [];

        if (is_object($response) === true) {
            if (isset($response->videos) === true) {
                foreach($response->videos as $vid) {
                    $video = new Entity\Video();
                    $video->setTitle($vid->title);
                    $video->setDescription($vid->description);
                    $video->setBroadcastId($vid->broadcast_id);
                    $video->setStatus($vid->status);
                    $video->setTagList($vid->tag_list);
                    $video->setRecordedAt($vid->recorded_at);
                    $video->setGame($vid->game);
                    $video->setLength($vid->length);
                    if (isset($vid->delete_at)) $video->setDeleteAt($vid->delete_at);
                    if (isset($vid->vod_type)) $video->setVodType($vid->vod_type);
                    $video->setIsMuted($vid->is_muted);
                    $video->setPreview($vid->preview);
                    $video->setThumbnails($vid->thumbnails);
                    $video->setResolutions($vid->resolutions);
                    $video->setBroadcastType($vid->broadcast_type);
                    $video->setCreatedAt($vid->created_at);
                    $video->setChannel($vid->channel);
                    $video->setFps($vid->fps);
                    $video->setViews($vid->views);
                    $video->setUrl($vid->url);
                    $video->setId($vid->_id);
                    $videos[] = $video;
                }
            }
        }
        return $videos;

    }

    public function getChannelEditors($args = array())
    {
        $response = $this->call('getChannelEditors', $args);

        $editors = [];

        if (is_object($response) === true) {
            if (isset($response->users) === true) {
                foreach($response->users as $editor) {
                    $user = new Entity\User;
                    $user->setDisplayName($editor->display_name);
                    $user->setName($editor->name);
                    $user->setType($editor->type);
                    $user->setType($editor->type);
                    $user->setBio($editor->bio);
                    $user->setCreatedAt($editor->created_at);
                    $user->setUpdatedAt($editor->updated_at);
                    $user->setLogo($editor->logo);
                    $user->setId($editor->_id);
                    $editors[] = $user;
                }
            }
        }

        return $editors;
    }

    public function updateChannelByName($args = array())
    {
        $response = $this->call('updateChannelByName', $args);
        
    }

}
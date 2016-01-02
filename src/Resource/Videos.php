<?php
namespace Redbox\Twitch\Resource;
use Redbox\Twitch;

class Videos extends ResourceAbstract
{
    public function listTopVideos($args = array())
    {
        $response = $this->call('listTopVideos', $args);

        $videos = [];

        if (is_object($response) === true) {
            if (isset($response->videos) === true) {
                foreach($response->videos as $vid) {
                    $video = new Twitch\Video();
                    $video->setTitle($vid->title);
                    $video->setDescription($vid->description);
                    $video->setBroadcastId($vid->broadcast_id);
                    $video->setStatus($vid->status);
                    $video->setTagList($vid->tag_list);
                    $video->setRecordedAt($vid->recorded_at);
                    $video->setGame($vid->game);
                    $video->setLength($vid->length);
                    $video->setDeleteAt($vid->delete_at);
                    $video->setVodType($vid->vod_type);
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

    public function getVideo($args = array())
    {
        $response = $this->call('getVideo', $args);

        if(is_object($response) && isset($response->title))
        {
            $video = new Twitch\Video();
            $video->setTitle($response->title);
            $video->setDescription($response->description);
            $video->setBroadcastId($response->broadcast_id);
            $video->setStatus($response->status);
            $video->setTagList($response->tag_list);
            $video->setRecordedAt($response->recorded_at);
            $video->setGame($response->game);
            $video->setLength($response->length);
            $video->setDeleteAt($response->delete_at);
            $video->setVodType($response->vod_type);
            $video->setIsMuted($response->is_muted);
            $video->setPreview($response->preview);
            $video->setThumbnails($response->thumbnails);
            $video->setResolutions($response->resolutions);
            $video->setBroadcastType($response->broadcast_type);
            $video->setCreatedAt($response->created_at);
            $video->setChannel($response->channel);
            $video->setFps($response->fps);
            $video->setViews($response->views);
            $video->setUrl($response->url);
            $video->setId($response->_id);
            return $video;
        }
        return false;
    }

    public function listChannelVideos($args = array())
    {
        $response = $this->call('listChannelVideos', $args);

        $videos = [];

        if (is_object($response) === true) {
            if (isset($response->videos) === true) {
                foreach($response->videos as $vid) {
                    $video = new Twitch\Video();
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

    public function listVideosFollowed($args = array())
    {
        $response = $this->call('listVideosFollowed', $args);

        $videos = [];

        if (isset($response->videos) === true) {
            foreach($response->videos as $vid) {

                $video = new Twitch\Video();
                $video->setTitle($vid->title);
                $video->setDescription($vid->description);
                $video->setBroadcastId($vid->broadcast_id);
                $video->setStatus($vid->status);
                $video->setTagList($vid->tag_list);
                $video->setRecordedAt($vid->recorded_at);
                $video->setGame($vid->game);
                $video->setLength($vid->length);
                $video->setDeleteAt($vid->delete_at);
                $video->setVodType($vid->vod_type);
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

        return $videos;
    }
}
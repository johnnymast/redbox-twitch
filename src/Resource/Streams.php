<?php
namespace Redbox\Twitch\Resource;
use Redbox\Twitch\Entity;

class Streams extends ResourceAbstract
{

    public function getStreamByChannel($args = [])
    {
        $response = $this->call('getStreamByChannel', $args);

        $stream = new Entity\Stream;
        $stream->setOnline(false);

        if ($response->stream) {
            $info = $response->stream;
            $stream->setOnline(true);
            $stream->setGame($info->game);
            $stream->setViewers($info->viewers);
            $stream->setCreatedAt($info->created_at);
            $stream->setVideoheight($info->video_height);
            $stream->setAverageFps($info->average_fps);
            $stream->setDelay($info->delay);
            $stream->setIsPlaylist($info->is_playlist);
            $stream->setPreview($info->preview);
            $stream->setChannel($info->channel);
            $stream->setId($info->_id);
        }
        return $stream;
    }

    public function getStreams($args = [])
    {
        $response = $this->call('getStreams', $args);

        $streams = [];

        if ($response->streams) {
            foreach($response->streams as $info)
            {
                $stream = new Entity\Stream;
                $stream->setOnline(true);
                $stream->setGame($info->game);
                $stream->setViewers($info->viewers);
                $stream->setCreatedAt($info->created_at);
                $stream->setVideoheight($info->video_height);
                $stream->setAverageFps($info->average_fps);
                $stream->setDelay($info->delay);
                $stream->setIsPlaylist($info->is_playlist);
                $stream->setPreview($info->preview);
                $stream->setChannel($info->channel);
                $stream->setId($info->_id);
                $streams[] = $stream;
            }
        }
        return $streams;
    }

    public function getFeaturedStreams($args = [])
    {
        $response = $this->call('getFeaturedStreams', $args);

        $streams = [];

        if ($response->featured) {
            foreach($response->featured as $info)
            {
                $featured = new Entity\FeaturedStream;
                $featured->setText($info->text);
                $featured->setImage($info->image);
                $featured->setTitle($info->title);
                $featured->setPriority($info->priority);
                $featured->setScheduled($info->scheduled);

                $steam_info = $info->stream;
                $stream = new Entity\Stream;
                $stream->setOnline(true);
                $stream->setGame($steam_info->game);
                $stream->setViewers($steam_info->viewers);
                $stream->setCreatedAt($steam_info->created_at);
                $stream->setVideoheight($steam_info->video_height);
                $stream->setAverageFps($steam_info->average_fps);
                $stream->setDelay($steam_info->delay);
                $stream->setIsPlaylist($steam_info->is_playlist);
                $stream->setPreview($steam_info->preview);
                $stream->setChannel($steam_info->channel);
                $stream->setId($steam_info->_id);

                $featured->setStream($stream);
                $streams[] = $featured;
            }
        }
        return $streams;
    }

    public function getStreamsSummary($args = [])
    {
        $response = $this->call('getStreamsSummary', $args);
        $summary = new Entity\StreamSummary;

        if (isset($response->channels) === true) {
            $summary->setChannels($response->channels);
            $summary->setViewers($response->viewers);
        }

        return $summary;
    }

    public function getStreamsFollowed($args = [])
    {
        $response = $this->call('getStreamsFollowed', $args);

        $streams = [];

        if ($response->streams) {
            foreach($response->streams as $info)
            {
                $stream = new Entity\Stream;
                $stream->setOnline(true);
                $stream->setGame($info->game);
                $stream->setViewers($info->viewers);
                $stream->setCreatedAt($info->created_at);
                $stream->setVideoheight($info->video_height);
                $stream->setAverageFps($info->average_fps);
                $stream->setDelay($info->delay);
                $stream->setIsPlaylist($info->is_playlist);
                $stream->setPreview($info->preview);
                $stream->setChannel($info->channel);
                $stream->setId($info->_id);
                $streams[] = $stream;
            }
        }
        return $streams;
    }

}
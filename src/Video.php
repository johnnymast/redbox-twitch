<?php
namespace Redbox\Twitch;

class Video
{
    /**
     * @var string
     */
    protected $broadcast_type;

    /**
     * @var string
     */
    protected $broadcast_id;

    /**
     * @var string
     */
    protected $recorded_at;

    /**
     * @var string
     */
    protected $created_at;

    /**
     * @var stdClass
     */
    protected $resolutions;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var array
     */
    protected $thumbnails;

    /**
     * @var string
     */
    protected $tag_list;

    /**
     * @var string
     */
    protected $delete_at;

    /**
     * @var string
     */
    protected $vod_type;

    /**
     * @var bool
     */
    protected $is_muted;

    /**
     * @var string
     */
    protected $preview;

    /**
     * @var string
     */
    protected $channel;

    /**
     * @var string
     */
    protected $length;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $views;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $game;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var stdClass
     */
    protected $fps;

    /**
     * @var string $id
     */
    protected $id;

    /**
     * @return string
     */
    public function getBroadcastType()
    {
        return $this->broadcast_type;
    }

    /**
     * @param string $broadcast_type
     */
    public function setBroadcastType($broadcast_type)
    {
        $this->broadcast_type = $broadcast_type;
    }

    /**
     * @return string
     */
    public function getBroadcastId()
    {
        return $this->broadcast_id;
    }

    /**
     * @param string $broadcast_id
     */
    public function setBroadcastId($broadcast_id)
    {
        $this->broadcast_id = $broadcast_id;
    }

    /**
     * @return string
     */
    public function getRecordedAt()
    {
        return $this->recorded_at;
    }

    /**
     * @param string $recorded_at
     */
    public function setRecordedAt($recorded_at)
    {
        $this->recorded_at = $recorded_at;
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
     * @return stdClass
     */
    public function getResolutions()
    {
        return $this->resolutions;
    }

    /**
     * @param stdClass $resolutions
     */
    public function setResolutions($resolutions)
    {
        $this->resolutions = $resolutions;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return array
     */
    public function getThumbnails()
    {
        return $this->thumbnails;
    }

    /**
     * @param array $thumbnails
     */
    public function setThumbnails($thumbnails)
    {
        $this->thumbnails = $thumbnails;
    }

    /**
     * @return string
     */
    public function getTagList()
    {
        return $this->tag_list;
    }

    /**
     * @param string $tag_list
     */
    public function setTagList($tag_list)
    {
        $this->tag_list = $tag_list;
    }

    /**
     * @return string
     */
    public function getDeleteAt()
    {
        return $this->delete_at;
    }

    /**
     * @param string $delete_at
     */
    public function setDeleteAt($delete_at)
    {
        $this->delete_at = $delete_at;
    }

    /**
     * @return string
     */
    public function getVodType()
    {
        return $this->vod_type;
    }

    /**
     * @param string $vod_type
     */
    public function setVodType($vod_type)
    {
        $this->vod_type = $vod_type;
    }

    /**
     * @return boolean
     */
    public function isIsMuted()
    {
        return $this->is_muted;
    }

    /**
     * @param boolean $is_muted
     */
    public function setIsMuted($is_muted)
    {
        $this->is_muted = $is_muted;
    }

    /**
     * @return string
     */
    public function getPreview()
    {
        return $this->preview;
    }

    /**
     * @param string $preview
     */
    public function setPreview($preview)
    {
        $this->preview = $preview;
    }

    /**
     * @return string
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * @param string $channel
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;
    }

    /**
     * @return string
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param string $length
     */
    public function setLength($length)
    {
        $this->length = $length;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * @param string $views
     */
    public function setViews($views)
    {
        $this->views = $views;
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
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return stdClass
     */
    public function getFps()
    {
        return $this->fps;
    }

    /**
     * @param stdClass $fps
     */
    public function setFps($fps)
    {
        $this->fps = $fps;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

}
<?php
namespace Redbox\Twitch\Entity;

class Channel
{

    /**
     * @var string
     */
    protected $profile_banner_background_color;

    /**
     * @var string
     */
    protected $broadcaster_language;

    /**
     * @var string
     */
    protected $profile_banner;

    /**
     * @var string
     */
    protected $video_banner;

    /**
     * @var string
     */
    protected $display_name;

    /**
     * @var string
     */
    protected $created_at;

    /**
     * @var  string
     */
    protected $updated_at;

    /**
     * @var string
     */
    protected $background;

    /**
     * @var string
     */
    protected $stream_key;

    /**
     * @var string
     */
    protected $followers;

    /**
     * @var string
     */
    protected $language;

    /**
     * @var bool
     */
    protected $partner;

    /**
     * @var string
     */
    protected $banner;

    /**
     * @var string
     */
    protected $mature;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var int
     */
    protected $delay;

    /**
     * @var int
     */
    protected $views;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $game;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $logo;

    /**
     * @var string
     */
    protected $url;

    /**
     * @return string
     */
    public function getProfileBannerBackgroundColor()
    {
        return $this->profile_banner_background_color;
    }

    /**
     * @param string $profile_banner_background_color
     */
    public function setProfileBannerBackgroundColor($profile_banner_background_color)
    {
        $this->profile_banner_background_color = $profile_banner_background_color;
    }

    /**
     * @return string
     */
    public function getBroadcasterLanguage()
    {
        return $this->broadcaster_language;
    }

    /**
     * @param string $broadcaster_language
     */
    public function setBroadcasterLanguage($broadcaster_language)
    {
        $this->broadcaster_language = $broadcaster_language;
    }

    /**
     * @return string
     */
    public function getProfileBanner()
    {
        return $this->profile_banner;
    }

    /**
     * @param string $profile_banner
     */
    public function setProfileBanner($profile_banner)
    {
        $this->profile_banner = $profile_banner;
    }

    /**
     * @return string
     */
    public function getVideoBanner()
    {
        return $this->video_banner;
    }

    /**
     * @param string $video_banner
     */
    public function setVideoBanner($video_banner)
    {
        $this->video_banner = $video_banner;
    }

    /**
     * @return string
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * @param string $display_name
     */
    public function setDisplayName($display_name)
    {
        $this->display_name = $display_name;
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
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param string $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    /**
     * @return string
     */
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * @param string $background
     */
    public function setBackground($background)
    {
        $this->background = $background;
    }

    /**
     * @return string
     */
    public function getStreamKey()
    {
        return $this->stream_key;
    }

    /**
     * @param string $stream_key
     */
    public function setStreamKey($stream_key)
    {
        $this->stream_key = $stream_key;
    }

    /**
     * @return string
     */
    public function getFollowers()
    {
        return $this->followers;
    }

    /**
     * @param string $followers
     */
    public function setFollowers($followers)
    {
        $this->followers = $followers;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    }

    /**
     * @return boolean
     */
    public function isPartner()
    {
        return $this->partner;
    }

    /**
     * @param boolean $partner
     */
    public function setPartner($partner)
    {
        $this->partner = $partner;
    }

    /**
     * @return string
     */
    public function getBanner()
    {
        return $this->banner;
    }

    /**
     * @param string $banner
     */
    public function setBanner($banner)
    {
        $this->banner = $banner;
    }

    /**
     * @return string
     */
    public function getMature()
    {
        return $this->mature;
    }

    /**
     * @param string $mature
     */
    public function setMature($mature)
    {
        $this->mature = $mature;
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
     * @return int
     */
    public function getDelay()
    {
        return $this->delay;
    }

    /**
     * @param int $delay
     */
    public function setDelay($delay)
    {
        $this->delay = $delay;
    }

    /**
     * @return int
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * @param int $views
     */
    public function setViews($views)
    {
        $this->views = $views;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
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
}
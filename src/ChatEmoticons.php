<?php
namespace Redbox\Twitch;

class ChatEmoticons
{
    /**
     * @var string
     */
    protected $images;

    /**
     * @var string
     */
    protected $regex;

    /**
     * @return string
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * @param string $images
     */
    public function setImages($images)
    {
        $this->images = $images;
    }

    /**
     * @return string
     */
    public function getRegex()
    {
        return $this->regex;
    }

    /**
     * @param string $regex
     */
    public function setRegex($regex)
    {
        $this->regex = $regex;
    }
}
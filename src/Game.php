<?php
namespace Redbox\Twitch;

class Game {

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $box_large;

    /**
     * @var string
     */
    protected $box_medium;

    /**
     * @var string
     */
    protected $box_small;

    /**
     * @var string
     */
    protected $box_template;

    /**
     * @var string
     */
    protected $logo_large;

    /**
     * @var string
     */
    protected $logo_medium;

    /**
     * @var string
     */
    protected $logo_small;

    /**
     * @var string
     */
    protected $logo_template;

    /**
     * @var string
     */
    protected $viewers;

    /**
     * @var string
     */
    protected $channels;

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
    public function getBoxLarge()
    {
        return $this->box_large;
    }

    /**
     * @param string $box_large
     */
    public function setBoxLarge($box_large)
    {
        $this->box_large = $box_large;
    }

    /**
     * @return string
     */
    public function getBoxMedium()
    {
        return $this->box_medium;
    }

    /**
     * @param string $box_medium
     */
    public function setBoxMedium($box_medium)
    {
        $this->box_medium = $box_medium;
    }

    /**
     * @return string
     */
    public function getBoxSmall()
    {
        return $this->box_small;
    }

    /**
     * @param string $box_small
     */
    public function setBoxSmall($box_small)
    {
        $this->box_small = $box_small;
    }

    /**
     * @return string
     */
    public function getBoxTemplate()
    {
        return $this->box_template;
    }

    /**
     * @param string $box_template
     */
    public function setBoxTemplate($box_template)
    {
        $this->box_template = $box_template;
    }

    /**
     * @return string
     */
    public function getLogoLarge()
    {
        return $this->logo_large;
    }

    /**
     * @param string $logo_large
     */
    public function setLogoLarge($logo_large)
    {
        $this->logo_large = $logo_large;
    }

    /**
     * @return string
     */
    public function getLogoMedium()
    {
        return $this->logo_medium;
    }

    /**
     * @param string $logo_medium
     */
    public function setLogoMedium($logo_medium)
    {
        $this->logo_medium = $logo_medium;
    }

    /**
     * @return string
     */
    public function getLogoSmall()
    {
        return $this->logo_small;
    }

    /**
     * @param string $logo_small
     */
    public function setLogoSmall($logo_small)
    {
        $this->logo_small = $logo_small;
    }

    /**
     * @return string
     */
    public function getLogoTemplate()
    {
        return $this->logo_template;
    }

    /**
     * @param string $logo_template
     */
    public function setLogoTemplate($logo_template)
    {
        $this->logo_template = $logo_template;
    }

    /**
     * @return string
     */
    public function getViewers()
    {
        return $this->viewers;
    }

    /**
     * @param string $viewers
     */
    public function setViewers($viewers)
    {
        $this->viewers = $viewers;
    }

    /**
     * @return string
     */
    public function getChannels()
    {
        return $this->channels;
    }

    /**
     * @param string $channels
     */
    public function setChannels($channels)
    {
        $this->channels = $channels;
    }
}
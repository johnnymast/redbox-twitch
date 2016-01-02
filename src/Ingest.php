<?php
namespace Redbox\Twitch;

class Ingest
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var bool
     */
    protected $default;

    /**
     * @var string
     */
    protected $url_template;

    /**
     * @var string
     */
    protected $availability;

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
     * @return boolean
     */
    public function isDefault()
    {
        return $this->default;
    }

    /**
     * @param boolean $default
     */
    public function setDefault($default)
    {
        $this->default = $default;
    }

    /**
     * @return string
     */
    public function getUrlTemplate()
    {
        return $this->url_template;
    }

    /**
     * @param string $url_template
     */
    public function setUrlTemplate($url_template)
    {
        $this->url_template = $url_template;
    }

    /**
     * @return string
     */
    public function getAvailability()
    {
        return $this->availability;
    }

    /**
     * @param string $availability
     */
    public function setAvailability($availability)
    {
        $this->availability = $availability;
    }


}
<?php
namespace Redbox\Twitch\Entity;

/**
 * Class Stream
 * @package Redbox\Twitch\Entity
 */
class Stream extends EntityAbstract{

    /**
     * @var string
     */
    protected $video_height;

    /**
     * @var string
     */
    protected $average_fps;

    /**
     * @var string
     */
    protected $is_playlist;

    /**
     * @var string
     */
    protected $created_at;

    /**
     * @var \stdClass
     */
    protected $channel;

    /**
     * @var \stdClass
     */
    protected $preview;

    /**
     * @var string
     */
    protected $viewers;

    /**
     * @var string
     */
    protected $delay;

    /**
     * @var string
     */
    protected $game;

    /**
     * @var int
     */
    protected $id;
}
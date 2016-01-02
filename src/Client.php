<?php
namespace Redbox\Twitch;
use Redbox\Twitch\Transport\TransportInterface;
use Redbox\Twitch\Transport\HttpRequest;
use Redbox\Twitch\Transport\Http;
use Redbox\Twitch\Commands;
use Redbox\Twitch\Auth\AuthModel;

class Client
{

    /**
     * @var TransportInterface
     */
    protected $transport;

    /**
     * @var string
     */
    protected $client_id;

    /**
     * @var string
     */
    protected $redirect_uri;

    /**
     * @var string
     */
    protected $client_secret;

    /**
     * @var bool
     */
    protected $force_relogin;

    /**
     * @var string
     */
    protected $access_token;

    /*
     * @var string
     */
    protected $api_url;

    // --- NEW --

    /**
     * @var array
     */
    protected $resources = [];

    /**
     * @var Resource\Auth
     */
    public $auth;

    /**
     * @var Resource\Game
     */
    public $games;

    /**
     * @var Resource\Root
     */
    public $root;

    /**
     * @var Resource\Teams
     */
    public $teams;

    /**
     * @var Resource\Videos
     */
    public $videos;

    /**
     * @var Resource\Ingests
     */
    public $ingests;

    public function __construct()
    {
        $this->setApiUrl('https://api.twitch.tv/kraken');


        $this->auth = new Resource\Auth(
            $this,
            "Auth",
            array(
                'methods' => array(
                    'requestAccessToken' => array(
                        'path'        => 'oauth2/token',
                        'httpMethod'  => HttpRequest::REQUEST_METHOD_POST,
                        'requiresAuth'=> false,
                    )
                )
            )
        );
        $this->games = new Resource\Games(
            $this,
            "Games",
            array(
                'methods' => array(
                    'listTopGames' => array(
                        'path'        => 'games/top',
                        'httpMethod'  => HttpRequest::REQUEST_METHOD_GET,
                        'requiresAuth'=> false,
                        'parameters'  => array (
                            'limit'   => array (
                                'type'    => 'integer',
                                'min'     => 0,
                                'max'     => 100,
                            ),
                            'offset'  => array (
                                'type'    => 'integer',
                            )
                        )
                    )
                )
            )
        );
        $this->root = new Resource\Root(
            $this,
            "Root",
            array(
                'methods' => array(
                    'getRoot' => array(
                        'path'        => '/',
                        'httpMethod'  => HttpRequest::REQUEST_METHOD_GET,
                        'requiresAuth'=> false,
                        'parameters'  => array()
                    )
                )
            )
        );
        $this->ingests = new Resource\Ingests(
            $this,
            "Ingests",
            array(
                'methods' => array(
                    'get' => array(
                        'path'        => '/ingests',
                        'httpMethod'  => HttpRequest::REQUEST_METHOD_GET,
                        'requiresAuth'=> false,
                        'parameters'  => array()
                    )
                )
            )
        );

        $this->teams = new Resource\Teams(
            $this,
            "Teams",
            array(
                'methods' => array(
                    'listTeams' => array(
                        'path'        => '/teams',
                        'httpMethod'  => HttpRequest::REQUEST_METHOD_GET,
                        'requiresAuth'=> false,
                        'parameters'  => array (
                            'limit'   => array (
                                'type'    => 'integer',
                                'min'     => 0,
                                'max'     => 100,
                            ),
                            'offset'  => array (
                                'type'    => 'integer',
                            )
                        )
                    ),
                    'getTeamByName' => array(
                        'path'        => '/teams/:team/',
                        'httpMethod'  => HttpRequest::REQUEST_METHOD_GET,
                        'requiresAuth'=> false,
                        'parameters'  => array (
                            'team'   => array (
                                'type'      => 'string',
                                'url_part'  => true,
                            )
                        )
                    )
                )
            )
        );
        $this->videos = new Resource\Videos(
            $this,
            "Videos",
            array(
                'methods' => array(
                    'listTopVideos' => array(
                        'path'        => 'videos/top',
                        'httpMethod'  => HttpRequest::REQUEST_METHOD_GET,
                        'requiresAuth'=> false,
                        'parameters'  => array (
                            'limit'   => array (
                                'type'    => 'integer',
                                'min'     => 0,
                                'max'     => 100,
                            ),
                            'offset' => array (
                                'type' => 'integer',
                            ),
                            'game' => array (
                                'type' => 'string',
                            ),
                            'period' => array (
                                'type'             => 'string',
                                'restricted_value' => array(
                                    'week', 'month', 'all'
                                )
                            )
                        )
                    ),
                    'getVideo' => array(
                        'path'        => 'videos/:id/',
                        'httpMethod'  => HttpRequest::REQUEST_METHOD_GET,
                        'requiresAuth'=> false,
                        'parameters'  => array (
                            'id'   => array (
                                'type'      => 'string',
                                'url_part'  => true,
                            )
                        )
                    ),
                    'getChannelVideos' => array(
                        'path'        => 'channels/:channel/videos',
                        'httpMethod'  => HttpRequest::REQUEST_METHOD_GET,
                        'requiresAuth'=> false,
                        'parameters'  => array (
                            'limit'   => array (
                                'type'    => 'integer',
                                'min'     => 0,
                                'max'     => 100,
                            ),
                            'offset' => array (
                                'type' => 'integer',
                            ),
                            'broadcasts' => array (
                                'type' => 'bool',
                            ),
                            'hls' => array(
                                'type' => 'bool'
                            ),
                            'channel'   => array (
                                'type'      => 'string',
                                'url_part'  => true,
                            )
                        )
                    )
                )
            )
        );
    }

    public function registerResource($name="", Resource\ResourceAbstract $instance) {
        $this->resources[$name] = $instance;
    }

    public function getSupportedFunctions() {
        return $this->resources;
    }

    /* -- Setters */

    /**
     * @param string $client_id
     */
    public function setClientId($client_id)
    {
        $this->client_id = $client_id;
        return $this;
    }

    /**
     * @param string $redirect_uri
     */
    public function setRedirectUri($redirect_uri)
    {
        $this->redirect_uri = $redirect_uri;
        return $this;
    }

    /**
     * @param string $client_secret
     */
    public function setClientSecret($client_secret)
    {
        $this->client_secret = $client_secret;
        return $this;
    }

    /**
     * @param string $api_url
     */
    public function setApiUrl($api_url)
    {
        $this->api_url = $api_url;
        return $this;
    }

    /**
     * @param boolean $force_relogin
     */
    public function setForceRelogin($force_relogin)
    {
        $this->force_relogin = $force_relogin;
        return $this;
    }

    /**
     * @param string $access_token
     */
    public function setAccessToken($access_token)
    {
        $this->access_token = $access_token;
    }


    /* -- Getters  */

    /**
     * @return string
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * @return string
     */
    public function getRedirectUri()
    {
        return $this->redirect_uri;
    }

    /**
     * @return string
     */
    public function getClientSecret()
    {
        return $this->client_secret;
    }

    /**
     * @return string
     */
    public function getApiUrl()
    {
        return $this->api_url;
    }

    /**
     * @return boolean
     */
    public function isForceRelogin()
    {
        return $this->force_relogin;
    }

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->access_token;
    }

    public function getAuthModel() {
        return new AuthModel($this);
    }

    /**
     * Send command to server
     *
     * @param CommandInterface $command Phue command
     *
     * @return mixed Command result
     */
    public function sendCommand(Commands\CommandInterface $command)
    {
        return $command->send($this);
    }

    /**
     * Get transport
     *
     * @return TransportInterface Transport
     */
    public function getTransport()
    {
        // Set transport if haven't
        if ($this->transport === null) {
            $this->setTransport(new Http($this));
        }
        return $this->transport;
    }

    /**
     * Set transport
     *
     * @param TransportInterface $transport Transport
     *
     * @return self This object
     */
    public function setTransport(TransportInterface $transport)
    {
        $this->transport = $transport;
        return $this;
    }

}
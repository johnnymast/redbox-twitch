<?php
namespace Redbox\Twitch;
use Redbox\Twitch\Transport\TransportInterface;
use Redbox\Twitch\Transport\Http;
use Redbox\Twitch\Commands;

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
     * @var string
     */
    protected $api_url;


    public function __construct()
    {
        $this->setApiUrl('https://api.twitch.tv/kraken');
    }

    /* -- Setters */

    /**
     * @param string $client_id
     */
    public function setClientId($client_id)
    {
        $this->client_id = $client_id;
    }

    /**
     * @param string $redirect_uri
     */
    public function setRedirectUri($redirect_uri)
    {
        $this->redirect_uri = $redirect_uri;
    }

    /**
     * @param string $client_secret
     */
    public function setClientSecret($client_secret)
    {
        $this->client_secret = $client_secret;
    }

    /**
     * @param string $api_url
     */
    public function setApiUrl($api_url)
    {
        $this->api_url = $api_url;
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


    /*  -- Commands -- */

    public function getTopGames()
    {
        return $this->sendCommand(
            new Commands\GetTopGames
        );
    }

    public function getToken()
    {
        return $this->sendCommand(
            new Commands\getToken
        );
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
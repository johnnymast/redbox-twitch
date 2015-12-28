<?php
namespace Redbox\Twitch;
use Redbox\Twitch\Transport;
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


    public function __construct()
    {
        /*
        $this->_client->setClientId(config_item('twitch_client_id'));
        $this->_client->setRedirectUri(config_item('twitch_redirect_uri'));
        $this->_client->setClientSecret(config_item('twitch_client_secret'));
        */
    }

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

    public function getTopGames()
    {
        return $this->sendCommand(
            new Commands\GetTopGames
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
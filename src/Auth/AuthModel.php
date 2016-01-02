<?php
namespace Redbox\Twitch\Auth;
use Redbox\Twitch\Client;

class AuthModel
{
    /**
     * @var Client
     */
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function createAuthUrl($scopes = '', $state = null) {
        $addy = '';
        if ($this->client->isForceRelogin() == true) {
            $addy .= '&force_verify=true';
        }

        if ($state)
            $addy .= '&state='.$state;

        $url =  sprintf('%s/oauth2/authorize/?response_type=code&client_id=%s&redirect_uri=%s&scope=%s%s',
            $this->client->getApiUrl(),
            $this->client->getClientId(),
            $this->client->getRedirectUri(),
            urlencode($scopes),
            $addy
        );
        return $url;
    }
}
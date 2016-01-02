<?php
namespace Redbox\Twitch\Resource;
use Redbox\Twitch;

class Auth extends ResourceAbstract {

    public function requestAccessToken($code = '', $state = '')
    {

        $body = array(
            'client_id'     => $this->getClient()->getClientId(),
            'client_secret' => $this->getClient()->getClientSecret(),
            'grant_type'    => 'authorization_code',
            'redirect_uri'  => $this->getClient()->getRedirectUri(),
            'code'          => $code,
            'state'         => $state,
        );

        $response = $this->call('requestAccessToken', array(), $body);

        $accesstoken = new Twitch\AccessToken;
        $accesstoken->setAccessToken($response->access_token);
        $accesstoken->setRefreshToken($response->refresh_token);
        $accesstoken->setScope($response->scope);
        return $accesstoken;
    }
}
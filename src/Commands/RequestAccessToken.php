<?php
namespace Redbox\Twitch\Commands;
use Redbox\Twitch\AccessToken;
use Redbox\Twitch\Client;
use Redbox\Twitch\Error;

use Redbox\Twitch\Transport\TransportInterface;
use Redbox\Twitch\Transport\HttpRequest;

class RequestAccessToken implements CommandInterface
{
    /**
     * @var string
     */
    protected $code;
    /**
     * @var string
     */
    protected $state;

    public function __construct($code = '', $state = '')
    {
        $this->code  = $code;
        $this->state = $state;
    }

    public function send(Client $client)
    {
        $request = new HttpRequest(
            "/oauth2/token",
            HttpRequest::REQUEST_METHOD_POST,
            array(),
            array(
                'client_id'     => $client->getClientId(),
                'client_secret' => $client->getClientSecret(),
                'grant_type'    => 'authorization_code',
                'redirect_uri'  => $client->getRedirectUri(),
                'code'          => $this->code,
                'state'         => $this->state,
            )
        );

        $response = $client->getTransport()->sendRequest($request);

        if (isset($response->error) == true) {
            $error = new Error;
            $error->setError($response->error);
            $error->setStatus($response->status);
            $error->setMessage($response->message);
            return $error;
        } else {
            $accesstoken = new AccessToken;
            $accesstoken->setAccessToken($response->access_token);
            $accesstoken->setRefreshToken($response->refresh_token);
            $accesstoken->setScope($response->scope);
            return $accesstoken;
        }
    }
}
<?php
namespace Redbox\Twitch\Commands;
use Redbox\Twitch\Client;
use Redbox\Twitch\Token;


class GetToken implements CommandInterface
{
    public function setRules()
    {
        // TODO: Implement setRules() method.
    }

    public function send(Client $client)
    {
        $response = $client->getTransport()->sendRequest(
            "/"
        );

        $token = new Token;

        if (is_object($response) == true) {
            if (isset($response->token) == true) {

                $token->setValid($response->token->valid);

                if ($token->isValid() == true and isset($response->authorization) == true) {
                    // TODO add authorization information to the token.
                   /// $token->setUserName($response->token->user_name);
                }
            }
        }

        return $token;
    }
}
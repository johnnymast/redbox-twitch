<?php
namespace Redbox\Twitch\Resource;
use Redbox\Twitch;

class Root extends ResourceAbstract {

    public function getRoot($args = array())
    {
        $response = $this->call('get', $args);

        $root = new Twitch\Root;

        if (is_object($response) === true) {
            if (isset($response->token) === true) {

                $root->setValid($response->token->valid);

                if ($root->isValid() === true && isset($response->token->authorization) === true) {
                    $root->setUserName($response->token->user_name);
                    $authorization = new Twitch\Authorization;
                    $authorization->setScopes($response->token->authorization->scopes);
                    $authorization->setCreatedAt($response->token->authorization->created_at);
                    $authorization->setUpdatedAt($response->token->authorization->created_at);
                    $root->setAuthorization($authorization);
                }
            }
        }
        return $root;
    }
}
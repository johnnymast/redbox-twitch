<?php
namespace Redbox\Twitch\Resource;
use Redbox\Twitch;

class Users extends ResourceAbstract
{
    public function getUserByUsername($args = [])
    {
        $response = $this->call('getUserByUsername', $args);

        if (is_object($response) === true) {
            if (isset($response->_id)) {
                $user = new Twitch\User;
                $user->setDisplayName($response->display_name);
                $user->setCreatedAt($response->created_at);
                $user->setUpdatedAt($response->updated_at);
                $user->setType($response->type);
                $user->setName($response->name);
                $user->setLogo($response->logo);
                $user->setBio($response->bio);
                $user->setId($response->_id);
                return $user;
            }
        }
        return false;
    }

    public function getUser($args = [])
    {
        $response = $this->call('getUser', $args);

        if (is_object($response) === true) {
            if (isset($response->_id)) {
                $user = new Twitch\User;
                $user->setDisplayName($response->display_name);
                $user->setNotifications($response->notifications);
                $user->setCreatedAt($response->created_at);
                $user->setUpdatedAt($response->updated_at);
                $user->setType($response->type);
                $user->setName($response->name);
                $user->setLogo($response->logo);
                $user->setBio($response->bio);
                $user->setId($response->_id);
                return $user;
            }
        }
        return false;
    }

}
<?php
require '../vendor/autoload.php';
require 'config.php';

use Redbox\Twitch;
use Redbox\Twitch\Scope;

try {

    $channel_id = 'ign';
    if (isset($_GET['id']) === true) {
        $channel_id = htmlentities($_GET['id']);
    }

    $twitch = new Redbox\Twitch\Client();

    if (isset($_SESSION['access_token']) === true) {
        $twitch->setAccessToken($_SESSION['access_token']);
        $twitch->setScope( $_SESSION['scope']);
    }

    $channel = $twitch->channels->getChannelByName(array(
        'channel' => $channel_id,
    ));

    print '<pre>';
    print_r($channel);

} catch (Exception $e)
{
    print '<pre>';
    print_r($e);
}

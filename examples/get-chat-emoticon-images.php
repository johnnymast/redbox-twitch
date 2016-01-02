<?php
require '../vendor/autoload.php';
require 'config.php';

use Redbox\Twitch;

try {

    $channel_id = 'ign';
    if (isset($_GET['id']) === true) {
        $channel_id = htmlentities($_GET['id']);
    }

    $twitch = new Redbox\Twitch\Client;
    $emoticons = $twitch->chat->getEmoticonSets();

    echo '<pre>';
    print_r($emoticons);


} catch (Exception $e) {
    print '<pre>';
    print_r($e);
}
<?php
require '../vendor/autoload.php';
require 'config.php';

use Redbox\Twitch;

try {

    $channel_id = 'ign';
    if (isset($_GET['id']) === true) {
        $channel_id = htmlentities($_GET['id']);
    }

    /* Return emoticons for emoticon set 469 */
    $twitch = new Redbox\Twitch\Client;
    $sets = $twitch->chat->getEmoticonSets(array(
        'emotesets' => 469
    ));

    echo '<pre>';
    print_r($sets);


} catch (Exception $e) {
    print '<pre>';
    print_r($e);
}
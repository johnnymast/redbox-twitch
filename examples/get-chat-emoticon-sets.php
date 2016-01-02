<?php
require '../vendor/autoload.php';
require 'config.php';

use Redbox\Twitch;

try {

    $set_id = 469;
    if (isset($_GET['id']) === true) {
        $set_id = htmlentities($_GET['id']);
    }

    /* Return emoticons for emoticon set 469 */
    $twitch = new Redbox\Twitch\Client;
    $sets = $twitch->chat->getEmoticonSets(array(
        'emotesets' => $set_id
    ));

    echo '<pre>';
    print_r($sets);


} catch (Exception $e) {
    print '<pre>';
    print_r($e);
}
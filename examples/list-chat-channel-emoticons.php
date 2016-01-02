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
    $emoticons = $twitch->chat->getChannelEmoticons(array(
        'channel' => $channel_id,
    ));
    ?>
    <style type="text/css">
        .img_wrapper { float: left; padding: 5px; width: 24px; height: 24px; }
    </style>
    <h1>Twitch Chat channel emoticons</h1>
    <?php
    foreach($emoticons->getEmoticons() as $emoticon)
        echo '<div class="img_wrapper"><img src="'.$emoticon->url.'" title="'.$emoticon->regex.'" /></div>';

} catch (Exception $e) {
    print '<pre>';
    print_r($e);
}
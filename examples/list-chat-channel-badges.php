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
    $badges = $twitch->chat->getChannelBadges(array(
        'channel' => $channel_id,
    ));
    $list = $badges->getList();
    ?>
    <style type="text/css">
        .img_wrapper { float: left; padding-right: 5px; width: 80px; text-align: center;}
        .img_wrapper img { padding-right: 5px;}
    </style>
    <h1>Twitch Chat channel badges</h1>

    <?php
    foreach($list as $type => $badge) echo '<div class="img_wrapper"><img src="'.$badge->image.'" title="'.$type.'" /><br />'.$type.'</div>';
} catch (Exception $e) {
    print '<pre>';
    print_r($e);
}
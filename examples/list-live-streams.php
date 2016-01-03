<?php
require '../vendor/autoload.php';
require 'config.php';

use Redbox\Twitch;

/**
 * Please note: if $stream->getOnline() == false no info will be set
 */
try {

    $channel_id = 'ign';
    if (isset($_GET['id']) === true) {
        $channel_id = htmlentities($_GET['id']);
    }

    $twitch = new Redbox\Twitch\Client;
    $streams = $twitch->streams->getStreams(array(
        'game' => 'Dota 2',
    ));
  //  print_r($streams);
    ?>
    <h1>Stream for channel <?php echo $channel_id; ?></h1>
    <ul>
        <?php foreach($streams as $stream):?>
            <li><a href="get-stream-by-channel.php?id=<?php echo $stream->getChannel()->name; ?>"><?php echo $stream->getChannel()->display_name; ?></a> is playing <?php echo $stream->getGame(); ?> with <?php echo $stream->getViewers(); ?> viewers</li>
        <?php endforeach; ?>
    </ul>
    <?php

} catch (Exception $e) {
    print '<pre>';
    print_r($e);
}
<?php
require '../vendor/autoload.php';
require 'config.php';

use Redbox\Twitch;

/**
 * Please note: if $stream->getOnline() == false no info will be set
 */
try {

    // TODO: add pagination ..

    $twitch = new Redbox\Twitch\Client;
    $streams = $twitch->streams->getFeaturedStreams();

    ?>
    <h1>Feathured streams</h1>
    <ul>
        <?php foreach($streams as $stream):?>
            <li><a href="get-stream-by-channel.php?id=<?php echo $stream->getStream()->getChannel()->name; ?>"><?php echo $stream->getStream()->getChannel()->display_name; ?></a> is playing <?php echo $stream->getStream()->getGame(); ?> with <?php echo $stream->getViewers(); ?> viewers</li>
        <?php endforeach; ?>
    </ul>
    <?php

} catch (Exception $e) {
    print '<pre>';
    print_r($e);
}
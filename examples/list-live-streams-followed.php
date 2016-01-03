<?php
require '../vendor/autoload.php';
require 'config.php';

use Redbox\Twitch;

/**
 * Please note: This method requires auth
 */
try {

    // TODO: add pagination ..

    $twitch = new Redbox\Twitch\Client;
    if (isset($_SESSION['access_token']) === true) {
        $twitch->setAccessToken($_SESSION['access_token']);
    }

    $streams = $twitch->streams->getStreamsFollowed(array(
            'stream_type' => 'all'
        )
    );

    ?>
    <h1>Live streams i follow</h1>
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
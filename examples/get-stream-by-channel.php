<?php
require '../vendor/autoload.php';
require 'config.php';

use Redbox\Twitch;

/**
 * Please note: if $stream->getOnline() == false no info will be set
 */
try {

    // TODO pagination

    $channel_name = 'ign';
    if (isset($_GET['id']) === true) {
        $channel_name = htmlentities($_GET['id']);
    }

    $twitch = new Redbox\Twitch\Client;
    $stream = $twitch->streams->getStreamByChannel(array(
        'channel' => $channel_name,
    ));

    ?>
    <h1>Live Stream for channel <?php echo $channel_name; ?></h1>
    <?php
    print '<pre>';
    print_r($stream);

} catch (Exception $e) {
    print '<pre>';
    print_r($e);
}
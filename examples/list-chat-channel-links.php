<?php
require '../vendor/autoload.php';
require 'config.php';

use Redbox\Twitch;

/**
 * Please note: This method requires the user to be authenticated.
 */
try {

    $channel_id = 'ign';
    if (isset($_GET['id']) === true) {
        $channel_id = htmlentities($_GET['id']);
    }

    $twitch = new Redbox\Twitch\Client;
    $links = $twitch->chat->getChannelLinks(array(
        'channel' => $channel_id,
    ));

    ?>
    <h1>Chat channel item list for <?php echo $channel_id; ?></h1>
    <?php
    print '<pre>';
    print_r($links);

} catch (Exception $e) {
    print '<pre>';
    print_r($e);
}
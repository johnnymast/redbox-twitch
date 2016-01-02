<?php
require '../vendor/autoload.php';
require 'config.php';

use Redbox\Twitch;

/**
 * Please note: This method requires the user to be authenticated.
 */
try {

    $channel_id = 'ign';
    if (isset($_GET['id']) == true) {
        $channel_id = htmlentities($_GET['id']);
    }

    $twitch = new Redbox\Twitch\Client;
    $videos = $twitch->videos->listChannelVideos(array(
        'channel' => $channel_id,
    ));

    ?>
    <h1>List of videos from channel <?php echo $channel_id; ?></h1>
    <?php
    echo '<ul>';
    foreach ($videos as $video) {
        echo '<li><a href="get-video-by-id.php?id='.$video->getId().'">'.$video->getTitle().' with '.$video->getViews().' views</a></li>';
    }
    echo '</ul>';

} catch (Redbox\Twitch\Exception\AuthorizationRequiredException $e)
{
    print '<pre>';
    print_r($e);
}
catch (Exception $e) {
    print '<pre>';
    print_r($e);
}
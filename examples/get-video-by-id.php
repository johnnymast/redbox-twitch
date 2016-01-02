<?php
require '../vendor/autoload.php';
require 'config.php';

use Redbox\Twitch;

try {

    $video_id = 'v32560146';
    if (isset($_GET['id']) == true) {
        $video_id = htmlentities($_GET['id']);
    }

    $twitch = new Redbox\Twitch\Client();
    $video  = $twitch->videos->getVideo(array(
        'id' => $video_id
    ));

    echo '<h1>Get video by id</h1>';
    echo '<br />';
    echo '<pre>You requested <strong>'.$video->getTitle().'</strong> with '.$video->getViews().' views </pre>';
    ?>
    <iframe
        src="http://player.twitch.tv/?video=<?php echo $video->getId();?>"
        height="720"
        width="1280"
        frameborder="0"
        scrolling="no"
        allowfullscreen>
    </iframe>

    <?php
} catch (Exception $e) {
    print '<pre>';
    print_r($e);
}
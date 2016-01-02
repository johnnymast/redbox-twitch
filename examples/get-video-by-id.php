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
    echo '<pre>You requested '.$video->getTitle().' with '.$video->getViews().' views </pre>';

} catch (Exception $e) {
    print '<pre>';
    print_r($e);
}
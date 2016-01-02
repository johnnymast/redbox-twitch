<?php
require '../vendor/autoload.php';
require 'config.php';

use Redbox\Twitch;


try {

    $twitch = new Redbox\Twitch\Client();
    $videos = $twitch->videos->listTopVideos();

    // TODO: add pagination ...
    // TODO add support for arguments

    ?>
    <style type="text/css">
        table th { padding: 6px 13px;  border: 1px solid #ddd; font-weight: bold; }
        table td { padding: 6px 13px;  border: 1px solid #ddd;}
        pre { background-color: rgba(0,0,0,0.04); display: inline-block; padding: 6px 13px; }
    </style>

    <h1>Top videos</h1>
    <ol>
        <?php foreach($videos as $video):?>
            <li><a href="get-video-by-id.php?id=<?php echo $video->getId(); ?>"><?php echo $video->getTitle(); ?> with <?php echo $video->getViews(); ?> views</a></li>
        <?php endforeach; ?>
    </ol>

    <?php
} catch (Exception $e) {
    print '<pre>';
    print_r($e);
}

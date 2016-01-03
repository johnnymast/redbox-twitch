<?php
require '../vendor/autoload.php';
require 'config.php';

use Redbox\Twitch;

/**
 * Please note: if $stream->getOnline() == false no info will be set
 */
try {

    // TODO pagination

    $game = 'Dota 2';
    if (isset($_GET['game']) === true) {
        $game = htmlentities($_GET['game']);
    }

    $twitch = new Redbox\Twitch\Client;
    $streams = $twitch->streams->getStreamsSummary(array(
        'game' => $game,
    ));

    ?>
    <h1>Steams for game <?php echo $game; ?></h1>
    <?php
    echo '<strong>In total '.$streams->getChannels().' with '.$streams->getViewers().' viewers are streaming '.$game.'</strong>stro';

} catch (Exception $e) {
    print '<pre>';
    print_r($e);
}
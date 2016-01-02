<?php
require '../vendor/autoload.php';
require 'config.php';

use Redbox\Twitch;

try {

    $twitch = new Redbox\Twitch\Client();
    $games = $twitch->games->listTopGames();


// TODO: add pagination ...

    /**
     * Output the changes since index action.
     */

    echo '<h1>Top games</h1>';
    foreach ($games as $game) {
        echo '<li><img src="'.$game->getBoxSmall().'" /> '.$game->getName().' Is being streamed by '.$game->getChannels()." channels with ".$game->getViewers()." combined viewers</li>";
    }
    echo '</ul>';

} catch (Exception $e) {
    print '<pre>';
    print_r($e);
}

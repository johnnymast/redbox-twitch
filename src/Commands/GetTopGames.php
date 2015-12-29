<?php
namespace Redbox\Twitch\Commands;
use Redbox\Twitch\Client;
use Redbox\Twitch\Game;

class GetTopGames implements CommandInterface
{
    public function setRules()
    {
        // TODO: Implement setRules() method.
    }

    public function send(Client $client)
    {
        $response = $client->getTransport()->sendRequest(
            "/games/top"
        );

        $games = [];

        // Experimental to the bone ...

        if (is_object($response) == true) {
            if (isset($response->top) == true) {
                foreach($response->top as $topgame) {
                    $game = new Game();
                    $game->setName($topgame->game->name);
                    $game->setViewers($topgame->viewers);
                    $game->setChannels($topgame->channels);
                    $game->setBoxLarge($topgame->game->box->large);
                    $game->setBoxMedium($topgame->game->box->medium);
                    $game->setBoxSmall($topgame->game->box->small);
                    $game->setBoxTemplate($topgame->game->box->template);
                    $game->setLogoLarge($topgame->game->logo->large);
                    $game->setLogoMedium($topgame->game->logo->medium);
                    $game->setLogoSmall($topgame->game->logo->small);
                    $game->setLogoTemplate($topgame->game->logo->template);
                    $games[] = $game;
                }
            }
        }
        return $games;
    }

}
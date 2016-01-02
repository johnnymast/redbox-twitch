<?php
namespace Redbox\Twitch\Resource;
use Redbox\Twitch;

class Games extends ResourceAbstract {

    public function listTopGames($args = array())
    {
        $response = $this->call('listTopGames', $args);

        $games = [];

        if (is_object($response) === true && isset($response->top) === true)
        {
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

        return $games;
    }
}
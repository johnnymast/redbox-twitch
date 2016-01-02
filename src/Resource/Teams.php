<?php
namespace Redbox\Twitch\Resource;
use Redbox\Twitch;

class Teams extends ResourceAbstract
{
    public function listTeams($args = [])
    {
        $response = $this->call('listTeams', $args);

        $teams = [];

        if (is_object($response) == true) {
            if (isset($response->teams)) {
                foreach($response->teams as $tm) {
                    $team = new Twitch\Team;
                    $team->setName($tm->name);
                    $team->setInfo($tm->info);
                    $team->setDisplayName($tm->display_name);
                    $team->setCreatedAt($tm->created_at);
                    $team->setUpdatedAt($tm->updated_at);
                    $team->setBackground($tm->background);
                    $team->setLogo($tm->logo);
                    $teams[] = $team;
                }
            }
        }
        return $teams;
    }

    public function getTeamByName($args = [])
    {

        $response = $this->call('getTeamByName', $args);

        $team = new Twitch\Team;
        $team->setName($response->name);
        $team->setInfo($response->info);
        $team->setDisplayName($response->display_name);
        $team->setCreatedAt($response->created_at);
        $team->setUpdatedAt($response->updated_at);
        $team->setBackground($response->background);
        $team->setLogo($response->logo);
        return $team;
    }
}
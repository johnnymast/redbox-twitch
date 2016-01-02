<?php
namespace Redbox\Twitch\Commands;
use Redbox\Twitch\Client;

interface CommandInterface
{
    public function send(Client $client);
}
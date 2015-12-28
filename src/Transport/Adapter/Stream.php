<?php
namespace Redbox\Twitch\Transport\Adapter;
use Redbox\Twitch\Client;

class Stream implements AdapterInterface
{
    public function __construct(Client $client)
    {

    }

    public function verifySupport()
    {
        // TODO: Implement verifySupport() method.
    }

    public function connect()
    {
        // TODO: Implement connect() method.
    }

    public function disconnect()
    {
        // TODO: Implement disconnect() method.
    }

    public function send($address, $method, $body = null)
    {
        // TODO: Implement send() method.
    }

    public function getHttpStatusCode()
    {
        // TODO: Implement getHttpStatusCode() method.
    }

    public function getContentType()
    {
        // TODO: Implement getContentType() method.
    }

}
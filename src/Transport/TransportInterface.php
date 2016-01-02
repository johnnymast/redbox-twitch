<?php
namespace Redbox\Twitch\Transport;

interface TransportInterface
{

    /**
     * @param HttpRequest $request
     * @return mixed
     */
    public function sendRequest(HttpRequest $request);
}
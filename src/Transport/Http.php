<?php
namespace Redbox\Twitch\Transport;
use Redbox\Twitch\Client;
use Redbox\Twitch\Exception;
use Redbox\Twitch\Transport\Adapter;
use Redbox\Twitch\Transport\Adapter\Curl as DefaultAdapter;

class Http implements TransportInterface
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var Adapter\AdapterInterface
     */
    protected $adapter;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /* -- Setters */

    /**
     * Set the Transport adapter we will use to communicate
     * to Twitch.
     *
     * @param Adapter\AdapterInterface $adapter
     */
    public function setAdapter($adapter)
    {
        /**
         * Not a adapter throws a BadFunctionCallException or true
         * if usable.
         */
        if ($adapter->verifySupport() === true) {
            $this->adapter = $adapter;
        }
    }

    /**
     * Returns the Adapter set to communicate to Twitch.
     * If none is set we will try to work with Curl.
     *
     * @return Adapter\AdapterInterface
     */
    public function getAdapter()
    {
        if (!$this->adapter) {
            $this->setAdapter(new DefaultAdapter);
        }
        return $this->adapter;
    }

    /* -- Getters -- */


    public function sendRequest(HttpRequest $request)
    {
        if (!$this->client) {
            throw new Exception\TwitchException('Client was not set');
        }

        $apiurl = rtrim($this->client->getApiUrl(), '/');
        $url = sprintf('%s/%s', $apiurl, $request->getUrl());
        $url = rtrim($url, '/');

        $this->getAdapter()->open();

        $data = $this->getAdapter()->send($url, $request->getRequestMethod(), $request->getRequestHeaders(), $request->getPostBody());
        $status_code = $this->getAdapter()->getHttpStatusCode();

        $data =  json_decode($data);

        $this->getAdapter()->close();

        // TODO we need to return more info
        if ($status_code !== 200) {
            throw new Exception\TwitchException(
                $data->error,
                $data->status
            );
        }
        return $data;
    }
}
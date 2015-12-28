<?php
namespace Redbox\Twitch\Transport\Adapter;
use Redbox\Twitch\Client;

class Curl implements AdapterInterface
{
    /**
     * @var resource
     */

    protected $curl;
    /**
     * @var Client
     */
    protected $client;

    public function __construct(Client $client)
    {
       $this->client = $client;
    }

    /**
     * Verify that we can support the curl extention.
     * If this is not the case we will throw a BadFunctionCallException.
     *
     * @throws BadFunctionCallException
     */
    public function verifySupport()
    {
        if (!extension_loaded('curl')) {
            throw new \BadFunctionCallException('The cURL extension is required.');
        }
    }

    public function connect()
    {
        if ($this->curl) {
            $this->disconnect();
        }
        $this->curl = curl_init();
    }

    public function disconnect()
    {
        if ($this->curl) {
            curl_close($this->curl);
        }
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
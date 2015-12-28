<?php
namespace Redbox\Twitch\Transport\Adapter;
use Redbox\Twitch\Client;

interface AdapterInterface
{

    /**
     * AdapterInterface constructor.
     * @param Client $client
     */
    public function __construct(Client $client);

    /**
     * Since PSR-4 does not allow constructors to throw exceptions
     * we need to get creative. Every Adapter needs to verify that it can
     * be used.
     *
     * @return mixed
     */
    public function verifySupport();

    /**
     * @return mixed
     */
    public function connect();

    /**
     * @return mixed
     */
    public function disconnect();

    /**
     * @param $address
     * @param $method
     * @param null $body
     * @return mixed
     */
    public function send($address, $method, $body = null);

    /**
     * @return mixed
     */
    public function getHttpStatusCode();

    /**
     * @return mixed
     */
    public function getContentType();
}


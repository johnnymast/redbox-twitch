<?php
namespace Redbox\Twitch\Transport\Adapter;
use Redbox\Twitch\Client;

interface AdapterInterface
{

    /**
     * Since PSR-4 does not allow constructors to throw exceptions
     * we need to get creative. Every Adapter needs to verify that it can
     * be used.
     *
     * @throws BadFunctionCallException
     * @return bool
     */
    public function verifySupport();

    /**
     * @return mixed
     */
    public function open();

    /**
     * @return mixed
     */
    public function close();

    /**
     * @param $address
     * @param $method
     * @param null $body
     * @return mixed
     */
    public function send($address, $method, $headers = null, $body = null);

    /**
     * @return mixed
     */
    public function getHttpStatusCode();

    /**
     * @return mixed
     */
    public function getContentType();
}


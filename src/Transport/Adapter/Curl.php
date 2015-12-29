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
     * Verify that we can support the curl extention.
     * If this is not the case we will throw a BadFunctionCallException.
     *
     * @throws BadFunctionCallException
     * @return bool
     */
    public function verifySupport()
    {
        if (!extension_loaded('curl')) {
            throw new \BadFunctionCallException('The cURL extension is required.');
        }
        return true;
    }

    /**
     * Initialize curl and close the connection if
     * needed.
     */
    public function open()
    {
        if (is_resource($this->curl)) {
            $this->close();
        }
        $this->curl = curl_init();
    }

    /**
     * Close the curl connection
     */
    public function close()
    {
        if ($this->curl) {
            curl_close($this->curl);
        }
    }

    /**
     * Send the request to the server.
     *
     * @param $address
     * @param $method
     * @param null $body
     * @return mixed
     */
    public function send($address, $method, $body = null)
    {
        // Set connection options
        curl_setopt($this->curl, CURLOPT_URL, $address);
        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($this->curl, CURLOPT_HEADER, false);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        if (strlen($body)) {
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, $body);
        }
        return curl_exec($this->curl);
    }

    /**
     * Return the HTTP status code
     *
     * @return mixed
     */
    public function getHttpStatusCode()
    {
        return curl_getinfo($this->curl, CURLINFO_HTTP_CODE);
    }

    /**
     * Return the content-type header set by the server.
     *
     * @return mixed
     */
    public function getContentType()
    {
        return curl_getinfo($this->curl, CURLINFO_CONTENT_TYPE);
    }
}
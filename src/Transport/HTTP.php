<?php
namespace Redbox\Twitch\Transport;
use Redbox\Twitch\Transport\Adapter\Curl as DefaultAdapter;
use Redbox\Twitch\Transport\Adapter;
use Redbox\Twitch;

class Http implements TransportInterface
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * @var AdapterInterface
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
        if ($adapter->verifySupport() == true) {
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


    public function sendRequest($path, $method = self::METHOD_GET, \stdClass $data = null) {

    }
}
<?php
namespace Redbox\Twitch\Resource;
use Redbox\Twitch\Exception;
use Redbox\Twitch\Client;
use Redbox\Twitch\Transport\HttpRequest;
use Redbox\Twitch;

class ResourceAbstract
{
    /**
     * @var array
     */
    private $methods;

    /**
     * @var Client
     */
    private $client;

    /**
     * @var string
     */
    private $resource_name;

    /**
     * @var array
     */
    private $url_parts = array();



    public function __construct(Client $client = null, $resource_name = "", $declaration = [])
    {
        $this->client        = $client;
        $this->resource_name = $resource_name;
        $this->methods       = isset($declaration['methods']) ? $declaration['methods'] : [];

        // If this line gives errros .. Comment it out because somewhere in the resource it self is an error.
    //    $client->registerResource($this->resource_name, $this);
        // Todo validate resources
    }

    private function validate_arguments($method_name = '', $args = array())
    {
        if (isset($this->methods[$method_name]) === true) {
            $method = $this->methods[$method_name];
            if (isset($method['parameters']) === true and is_array($method['parameters']) == true) {
                $parameters = $method['parameters'];
                foreach ($parameters as $name => $options) {
                    switch ($options['type']) {
                        case 'integer':
                            // todo implment default value as seen in team

                            // Required
                            if (isset($options['required']) === true and $options['required'] === true and isset($args[$name]) == false)
                                throw new Exception\RuntimeException($this->resource_name . ' requires parameter ' . $name . ' to be given for method ' . $method);

                            // Min
                            if (isset($options['min']) === true and (isset($args[$name]) === true and $args[$name] < $options['min']))
                                throw new Exception\RuntimeException($this->resource_name . ' requires parameter ' . $name . ' to have a minimum value of ' . $options['min'] . ' for method ' . $method);

                            // Min
                            if (isset($options['max']) === true and (isset($args[$name]) === true and $args[$name] > $options['max']))
                                throw new Exception\RuntimeException($this->resource_name . ' requires parameter ' . $name . ' to have a maximum value of ' . $options['min'] . ' for method ' . $method);

                            break;
                        case 'string':

                            // Required
                            if (isset($options['required']) === true and $options['required'] === true and isset($args[$name]) === false)
                                throw new Exception\RuntimeException($this->resource_name . ' requires parameter ' . $name . ' to be given for method ' . $method);

                            // Url Part
                            if (isset($options['url_part']) === true and $options['url_part'] === true and isset($args[$name]) === false) {
                                throw new Exception\RuntimeException($this->resource_name . ' requires parameter ' . $name . ' to be given for method ' . $method);
                            } else if (isset($options['url_part']) === true and $options['url_part'] == true and isset($args[$name]) === true) {
                                $this->url_parts[$method_name][':' . $name] = array('name' => $name, 'value' => $args[$name]);
                            }
                            break;
                    }
                }
            }
        }
        return true;
    }

    public function call($method, $arguments = array(), $body = array())
    {
        if ($this->validate_arguments($method, $arguments) == true)
        {

            $headers = array();
            $headers['Accept']    = 'application/vnd.twitchtv.v3+json';
            $headers['Client-ID'] = $this->client->getClientId();

            if (isset($this->methods[$method]['requiresAuth']) == true) {
                if ($this->methods[$method]['requiresAuth'] == true && !$this->client->getAccessToken()) {
                    throw new Exception\AuthorizationRequiredException('Method: '.$method.' requires authorization. Did you forget to use setAccessToken() ?');
                }
            }

            if ($this->client->getAccessToken())
                $headers['Authorization'] = 'OAuth ' . $this->client->getAccessToken();


            if (isset($this->url_parts[$method]) == true and is_array($this->url_parts[$method]) == true) {
                if (count($this->url_parts[$method]) > 0) {
                    foreach ($this->url_parts[$method] as $key => $url_part) {
                        $this->methods[$method]['path'] = str_replace($key, $url_part['value'], $this->methods[$method]['path']);
                        unset($arguments[$url_part['name']]);
                    }
                }
            }

            $url = '/'.$this->methods[$method]['path'];

            $count = 0;
            while ($value = current($arguments)) {
                $url .= (($count > 0) ? '&' : '?').key($arguments).'='.$value;
                next($arguments);
                $count++;
            }

            $request = new HttpRequest(
                $url,
                $this->methods[$method]['httpMethod'],
                $headers,
                $body
            );

            $response = $this->client->getTransport()->sendRequest(
                $request
            );

            return $response;
        }
    }

    public function getClient() {
        return $this->client;
    }

    public function getResourceName() {
        return $this->resource_name;
    }

    public function getMethods() {
        return $this->methods;
    }

}
<?php
namespace Redbox\Twitch\Resource;
use Redbox\Twitch;

class Ingests extends ResourceAbstract {

    public function get($args = array())
    {
        $response = $this->call('get', $args);

        $ingests = [];

        if (is_object($response) == true) {
            if (isset($response->ingests) == true) {
                foreach($response->ingests as $ing) {
                    $ingest = new Twitch\Ingest;
                    $ingest->setName($ing->name);
                    $ingest->setAvailability($ing->availability);
                    $ingest->setDefault($ing->default);
                    $ingest->setUrlTemplate($ing->url_template);
                    $ingests[] = $ingest;
                }
            }
        }
        return $ingests;
    }
}
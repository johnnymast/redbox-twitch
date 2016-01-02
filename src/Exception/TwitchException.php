<?php
namespace Redbox\Twitch\Exception;

class TwitchException extends \Exception {
    protected $response;

    public function setRepsonse($response) {
        $this->response = $response;
    }

    public function getRepsonse() {
        return $this->response;
    }

}
<?php
namespace Redbox\Twitch;

class AccessToken
{
    /**
     * @var string
     */
    protected $access_token;
    /**
     * @var string
     */
    protected $refresh_token;
    /**
     * @var array
     */
    protected $scope;

    /**
     * @return string
     */
    public function getAccessToken()
    {
        return $this->access_token;
    }

    /**
     * @param string $access_token
     */
    public function setAccessToken($access_token)
    {
        $this->access_token = $access_token;
    }

    /**
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->refresh_token;
    }

    /**
     * @param string $refresh_token
     */
    public function setRefreshToken($refresh_token)
    {
        $this->refresh_token = $refresh_token;
    }

    /**
     * @return array
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * @param array $scope
     */
    public function setScope($scope)
    {
        $this->scope = $scope;
    }
}
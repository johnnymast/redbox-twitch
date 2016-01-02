<?php
namespace Redbox\Twitch;

class ChatChannelBadges
{
    /**
     * @var array
     */
    protected $subscriber;

    /**
     * @var array
     */
    protected $broadcaster;

    /**
     * @var array
     */
    protected $global_mod;

    /**
     * @var array
     */
    protected $staff;

    /**
     * @var array
     */
    protected $turbo;

    /**
     * @var array
     */
    protected $admin;

    /**
     * @var array
     */
    protected $mod;

    /**
     * @return array
     */
    public function getList()
    {
        return array(
            'subscriber'  => $this->getSubscriber(),
            'broadcaster' => $this->getBroadcaster(),
            'global_mod'  => $this->getGlobalMod(),
            'staff'       => $this->getStaff(),
            'turbo'       => $this->getTurbo(),
            'admin'       => $this->getAdmin(),
        );
    }
    /**
     * @return array
     */
    public function getSubscriber()
    {
        return $this->subscriber;
    }

    /**
     * @param array $subscriber
     */
    public function setSubscriber($subscriber)
    {
        $this->subscriber = $subscriber;
    }

    /**
     * @return array
     */
    public function getBroadcaster()
    {
        return $this->broadcaster;
    }

    /**
     * @param array $broadcaster
     */
    public function setBroadcaster($broadcaster)
    {
        $this->broadcaster = $broadcaster;
    }

    /**
     * @return array
     */
    public function getGlobalMod()
    {
        return $this->global_mod;
    }

    /**
     * @param array $global_mod
     */
    public function setGlobalMod($global_mod)
    {
        $this->global_mod = $global_mod;
    }

    /**
     * @return array
     */
    public function getStaff()
    {
        return $this->staff;
    }

    /**
     * @param array $staff
     */
    public function setStaff($staff)
    {
        $this->staff = $staff;
    }

    /**
     * @return array
     */
    public function getTurbo()
    {
        return $this->turbo;
    }

    /**
     * @param array $turbo
     */
    public function setTurbo($turbo)
    {
        $this->turbo = $turbo;
    }

    /**
     * @return array
     */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * @param array $admin
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;
    }

    /**
     * @return array
     */
    public function getMod()
    {
        return $this->mod;
    }

    /**
     * @param array $mod
     */
    public function setMod($mod)
    {
        $this->mod = $mod;
    }

}
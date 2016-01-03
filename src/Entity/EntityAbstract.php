<?php
namespace Redbox\Twitch\Entity;

abstract class EntityAbstract
{
    /**
     * Generate magic functions.
     *
     * @param string $name
     * @param array $args
     * @return null
     */
    public function __call($name = '', $args = [])
    {
        $action   = strtolower(substr($name,0, 3));
        $trace    = debug_backtrace();

        switch($action) {
            case 'get':
                $name   = substr($name, 3);
                $param  = lcfirst($name);

                if (property_exists($this, $param) === true){
                    return $this->$param;
                } else {
                    $this->trigger_error($name, $trace);
                }
                break;

            case 'set':
                $name   = substr($name, 3);
                $param = lcfirst($name);

                if (property_exists($this, $param) === true){
                    $this->$param = $args[0];
                } else {
                    $this->trigger_error($name, $trace);
                }
            break;
            default:
                $this->trigger_error($name, $trace);
                break;
        }
    }

    /**
     * @param string $name
     * @param array $trace
     */
    private function trigger_error($name = '', $trace = array()) {
        trigger_error(
            'Call to undefined method: '.$name.
            ' in '.$trace[0]['file'].
            ' on line '.$trace[0]['line'],
            E_USER_ERROR);
    }

}
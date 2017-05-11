<?php

/**
 * Created by PhpStorm.
 * User: PushPrime
 * Date: 5/9/2017
 * Time: 2:25 PM
 */

namespace PushPrime\Target;

/**
 * For direct targeting parameters.
 * Class Direct
 * @package PushPrime\Target
 */
class Direct extends Base
{
    function __construct($consition, $value)
    {
        $this->target = "direct";
        parent::__construct($this->target, $consition, $value);
    }

    public function getPayload()
    {
        $payload = array();

        if(!is_array($this->value)){
            $this->value = array($this->value);
        }

        $payload['target_user_condition'] = $this->condition;
        $payload['target_user_value'] = implode(",", $this->value);

        return $payload;
    }
}
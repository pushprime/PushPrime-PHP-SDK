<?php

/**
 * Created by PhpStorm.
 * User: PushPrime
 * Date: 5/9/2017
 * Time: 2:26 PM
 */

namespace PushPrime\Target;

/**
 * For custom targeting parameters.
 * Class Custom
 * @package PushPrime\Target
 */
class Custom extends Base
{
    public function getPayload(){
        $payload = array();

        if(!is_array($this->value)){
            $this->value = array($this->value);
        }

        $payload['custom_target_type'] = $this->target;
        $payload['custom_target_condition'] = $this->condition;
        $payload['custom_target_value'] = implode(",", $this->value);

        return $payload;
    }
}
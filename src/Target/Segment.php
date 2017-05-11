<?php

/**
 * Created by PhpStorm.
 * User: PushPrime
 * Date: 5/9/2017
 * Time: 2:25 PM
 */

namespace PushPrime\Target;

/**
 * For targeting one or more segments.
 * Class Segment
 * @package PushPrime\Target
 */
class Segment extends Base
{
    function __construct($condition, $value)
    {
        $this->target = "segment";
        parent::__construct($this->target, $condition, $value);
    }

    public function getPayload()
    {
        $payload = array();

        if(!is_array($this->value)){
            $this->value = array($this->value);
        }

        $payload['target_segment_condition'] = $this->condition;
        $payload['target_segment_value'] = implode(",", $this->value);

        return $payload;
    }
}
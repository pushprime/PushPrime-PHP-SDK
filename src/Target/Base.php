<?php

/**
 * Created by PhpStorm.
 * User: PushPrime
 * Date: 5/9/2017
 * Time: 2:26 PM
 */

namespace PushPrime\Target;

class Base {

    public $target;

    public $condition;

    public $value;

    function __construct($target, $consition, $value)
    {
        $this->target = $target;
        $this->condition = $consition;
        $this->value = $value;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: PushPrime
 * Date: 11/05/2017
 * Time: 2:50 PM
 */

namespace PushPrime\Target;

/**
 * Class TargetCondition
 * @package PushPrime\Target
 */
class TargetCondition{
    /**
     * Values is equal to or in the list
     */
    const EQUAL = 0;

    /**
     * Value is not equal to or is not in the list
     */
    const NOT_EQUAL = 1;
}
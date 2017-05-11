<?php
/**
 * Created by PhpStorm.
 * User: PushPrime
 * Date: 5/9/2017
 * Time: 4:48 PM
 */

namespace PushPrime\Models;


class IOSActionButton extends ActionButtonBase
{
    function __construct($title)
    {
        $this->title = $title;
    }
}
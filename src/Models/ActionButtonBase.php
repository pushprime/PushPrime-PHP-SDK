<?php
/**
 * Created by PhpStorm.
 * User: PushPrime
 * Date: 5/9/2017
 * Time: 4:46 PM
 */

namespace PushPrime\Models;


abstract class ActionButtonBase
{
    /**
     * @var Title of action button
     */
    public $title;

    /**
     * @return Get title of the button
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param Title $title
     * @return ActionButtonBase
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

}
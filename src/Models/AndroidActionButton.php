<?php
/**
 * Created by PhpStorm.
 * User: PushPrime
 * Date: 5/9/2017
 * Time: 4:48 PM
 */

namespace PushPrime\Models;

class AndroidActionButton extends ActionButtonBase
{

    /**
     * @var Icon to show with the button in Notification center
     */
    public $icon;

    /**
     * @var Activity to launch when the button is clicked
     */
    public $activity;

    /**
     * @return Icon
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param Icon $icon
     * @return AndroidActionButton
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * @return Activity
     */
    public function getActivity()
    {
        return $this->activity;
    }

    /**
     * @param Activity $activity
     * @return AndroidActionButton
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;
        return $this;
    }

    function __construct($title, $icon = null, $activity = null)
    {
        $this->title = $title;
        $this->icon = $icon;
        $this->activity = $activity;
    }
}
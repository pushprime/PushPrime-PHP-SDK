<?php
/**
 * Created by PhpStorm.
 * User: PushPrime
 * Date: 11/05/2017
 * Time: 12:35 PM
 */

namespace PushPrime\Models;


/**
 * Class AndroidOptions
 * @package PushPrime\Models
 */
class AndroidOptions{
    /**
     * @var Icon file name to be shown in notification center, this file should already exist in a drawable folder
     */
    public $icon;

    /**
     * @var Activity to launch when notification is clicked
     */
    public $activityToLaunch;

    /**
     * @var Image URL to be shown with notification
     */
    public $thumbnailImage;

    /**
     * @var Array containing action buttons. See {@link PushPrime\Models\AndroidActionButton}
     */
    public $actionButtons;

    /**
     * @var Sound file name which will be played when notification is received. Sound file should already exist in the application bundle.
     */
    public $soundFile;

    /**
     * @param Icon $icon
     * @return AndroidOptions
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * @param Activity $activityToLaunch
     * @return AndroidOptions
     */
    public function setActivityToLaunch($activityToLaunch)
    {
        $this->activityToLaunch = $activityToLaunch;
        return $this;
    }

    /**
     * @param Image $thumbnailImage
     * @return AndroidOptions
     */
    public function setThumbnailImage($thumbnailImage)
    {
        $this->thumbnailImage = $thumbnailImage;
        return $this;
    }

    /**
     * @param Sound $soundFile
     * @return AndroidOptions
     */
    public function setSoundFile($soundFile)
    {
        $this->soundFile = $soundFile;
        return $this;
    }

    /**
     * @param Array $actionButtons
     * @return AndroidOptions
     */
    public function setActionButtons($actionButtons)
    {
        $this->actionButtons = $actionButtons;
        return $this;
    }

    function __construct($icon, $activityToLaunch, $thumbnailImage, $soundFile, $actionButtons)
    {
        $this->icon = $icon;
        $this->activityToLaunch = $activityToLaunch;
        $this->thumbnailImage = $thumbnailImage;
        $this->soundFile = $soundFile;
        $this->actionButtons = $actionButtons;
    }

    public function getPayload(){
        $payload = array();

        $payload['android_devices'] = "1";

        if(null != $this->icon){
            $payload['android_icon'] = $this->icon;
        }

        if(null != $this->activityToLaunch){
            $payload['android_activity'] = $this->activityToLaunch;
        }

        if(null != $this->thumbnailImage){
            $payload['android_thumbnail'] = $this->thumbnailImage;
        }

        if(null != $this->soundFile){
            $payload['android_sound'] = $this->soundFile;
        }

        if(null != $this->actionButtons){
            if(!is_array($this->actionButtons)){
                $this->actionButtons = array($this->actionButtons);
            }

            $button = $this->actionButtons[0];
            $payload['android_button_one_icon'] = $button->getIcon();
            $payload['android_button_one_title'] = $button->getTitle();
            $payload['android_button_one_activity'] = $button->getActivity();

            if(count($this->actionButtons) > 1){
                $button = $this->actionButtons[1];
                $payload['android_button_two_icon'] = $button->getIcon();
                $payload['android_button_two_title'] = $button->getTitle();
                $payload['android_button_two_activity'] = $button->getActivity();
            }
        }

        return $payload;
    }
}
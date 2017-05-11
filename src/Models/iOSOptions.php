<?php
/**
 * Created by PhpStorm.
 * User: PushPrime
 * Date: 11/05/2017
 * Time: 12:36 PM
 */

namespace PushPrime\Models;


/**
 * Class iOSOptions
 * @package PushPrime\Models
 */
class iOSOptions{
    /**
     * @var Sound file name which will be played when notification is received. This should contain the complete file name (including extension). The sound file should already exist in the application bundle
     */
    public $soundFile;

    /**
     * @var Image URL to be shown with notification
     */
    public $thumbnailImage;

    /**
     * @var iOS 8 Action Category name to be associated with Push Notification.
     */
    public $actionCategory;

    /**
     * @var Array containing action buttons. See {@link PushPrime\Models\IOSActionButton}
     */
    public $actionButtons;

    /**
     * @param Sound $soundFile
     * @return iOSOptions
     */
    public function setSoundFile($soundFile)
    {
        $this->soundFile = $soundFile;
        return $this;
    }

    /**
     * @param Image $thumbnailImage
     * @return iOSOptions
     */
    public function setThumbnailImage($thumbnailImage)
    {
        $this->thumbnailImage = $thumbnailImage;
        return $this;
    }

    /**
     * @param iOS $actionCategory
     * @return iOSOptions
     */
    public function setActionCategory($actionCategory)
    {
        $this->actionCategory = $actionCategory;
        return $this;
    }

    /**
     * @param Array $actionButtons
     * @return iOSOptions
     */
    public function setActionButtons($actionButtons)
    {
        $this->actionButtons = $actionButtons;
        return $this;
    }


    function __construct($soundFile, $thumbnailImage, $actionCategory, $actionButtons)
    {
        $this->soundFile = $soundFile;
        $this->thumbnailImage = $thumbnailImage;
        $this->actionCategory = $actionCategory;
        $this->actionButtons = $actionButtons;
    }

    public function getPayload(){
        $payload = array();

        $payload['ios_devices'] = "1";

        if(null != $this->soundFile){
            $payload['ios_sound'] = $this->soundFile;
        }

        if(null != $this->thumbnailImage){
            $payload['ios_thumbnail'] = $this->thumbnailImage;
        }

        if(null != $this->actionCategory){
            $payload['ios_category'] = $this->actionCategory;
        }

        if(null != $this->actionButtons){
            if(!is_array($this->actionButtons)){
                $this->actionButtons = array($this->actionButtons);
            }

            $button = $this->actionButtons[0];
            $payload['ios_button_one_title'] = $button->getTitle();

            if(count($this->actionButtons) > 1){
                $button = $this->actionButtons[1];
                $payload['ios_button_two_title'] = $button->getTitle();
            }
        }

        return $payload;
    }
}
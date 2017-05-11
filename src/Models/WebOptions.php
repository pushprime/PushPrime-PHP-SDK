<?php
/**
 * Created by PhpStorm.
 * User: PushPrime
 * Date: 11/05/2017
 * Time: 12:34 PM
 */

namespace PushPrime\Models;


/**
 * Class WebOptions
 * @package PushPrime\Models
 */
class WebOptions{
    /**
     * @var Url to open when this notification is clicked
     */
    public $url;

    /**
     * @var Icon to show with this notification
     */
    public $icon;

    /**
     * @var ChromeActionButton buttons to show on Google Chrome {@link PushPrime\Models\ChromeActionButton}
     */
    public $chromeActionButtons;

    /**
     * @var Thumbnail Image to show with the notification (Google Chrome only)
     */
    public $chromeThumbnailImage;

    /**
     * @param Url $url
     * @return WebOptions
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @param Icon $icon
     * @return WebOptions
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * @param ChromeActionButton $chromeActionButtons
     * @return WebOptions
     */
    public function setChromeActionButtons($chromeActionButtons)
    {
        $this->chromeActionButtons = $chromeActionButtons;
        return $this;
    }

    /**
     * @param Thumbnail $chromeThumbnailImage
     * @return WebOptions
     */
    public function setChromeThumbnailImage($chromeThumbnailImage)
    {
        $this->chromeThumbnailImage = $chromeThumbnailImage;
        return $this;
    }


    function __construct($url, $icon, $chromeActionButtons = null, $chromeThumbnail = null)
    {
        $this->url = $url;
        $this->icon = $icon;
        $this->chromeActionButtons = $chromeActionButtons;
        $this->chromeThumbnailImage = $chromeThumbnail;
    }

    public function getPayload(){
        $payload = array();

        if(null != $this->url){
            $payload['notification_url'] = $this->url;
        }

        if(null != $this->icon){
            $payload['notification_icon'] = $this->icon;
        }

        if(null != $this->chromeActionButtons){
            if(!is_array($this->chromeActionButtons)){
                $this->chromeActionButtons = array($this->chromeActionButtons);
            }

            $button = $this->chromeActionButtons[0];
            $payload['button_one_title'] = $button->getTitle();
            $payload['button_one_url'] = $button->getUrl();

            if(count($this->chromeActionButtons) > 1){
                $button = $this->chromeActionButtons[1];
                $payload['button_two_title'] = $button->getTitle();
                $payload['button_two_url'] = $button->getUrl();
            }
        }

        return $payload;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: PushPrime
 * Date: 5/9/2017
 * Time: 2:28 PM
 */

namespace PushPrime\Models;

/**
 * Base class for all kinds of notifications, this only contains basic parameters. In order to add platform specific properties, please use the Option classes (WebOptions, AndroidOptions and iOSOptions)
 * Class Notification
 * @package PushPrime\Models
 */
class Notification
{
    /**
     * @var Title of the notification
     */
    public $title;

    /**
     * @var Message/body of the notification
     */
    public $message;

    /**
     * @var Badge count to show on app icon (native notifications only)
     */
    public $appBadgeCount = 0;

    /**
     * @var Alert type when notification is received with app in foreground (native notifications only)
     */
    public $inAppAlert;

    /**
     * @var Custom Data to be sent with the notification (native notifications only)
     */
    public $customData;

    /**
     * @var Criteria to be used for targeting. This can either be a single target object or an array of targets. {@link PushPrime\Target}
     */
    public $criteria;

    /**
     * @var Notification Options to be used, array or single object
     */
    public $options;

    public function setTitle($title){
        $this->title = $title;
        return $this;
    }

    public function setMessage($message){
        $this->message = $message;
        return $this;
    }

    public function setBadgeCount($count){
        $this->appBadgeCount = $count;
        return $this;
    }

    public function setInAppAlert($type){
        $this->inAppAlert = $type;
        return $this;
    }

    public function setCustomData($data){
        $this->customData = $data;
        return $this;
    }

    public function setTarget($criteria){
        $this->criteria = $criteria;
        return $this;
    }

    public function setOptions($option){
        $this->options = $option;
        return $this;
    }

    public function getPayload(){
        $payload = array();

        if(null != $this->title){
            $payload['notification_title'] = $this->title;
        }

        if(null != $this->message){
            $payload['notification_description'] = $this->message;
        }

        $payload['notification_badge'] = $this->appBadgeCount;
        $payload['in_app_alert'] = $this->inAppAlert;

        if(null != $this->options){
            if(!is_array($this->options)){
                $this->options = array($this->options);
            }

            foreach ($this->options as $option){
                $payload = array_merge($payload, $option->getPayload());
            }
        }

        if(null != $this->criteria){
            if(!is_array($this->criteria)){
                $this->criteria = array($this->criteria);
            }

            foreach ($this->criteria as $critera){
                $payload = array_merge($payload, $critera->getPayload());
            }
        }

        return $payload;
    }
}
<?php

/**
 * Created by PhpStorm.
 * User: PushPrime
 * Date: 5/9/2017
 * Time: 2:16 PM
 */

namespace PushPrime;

use PushPrime\Models\Notification;
use PushPrime\Util\Request;

/**
 * Base class, can be used to perform several tasks of the pushprime api.
 * Class PushPrime
 * @package PushPrime
 */
class PushPrime
{
    /**
     * @var Request PushPrime API Request handler
     */
    private $request;

    function __construct($apiKey){
        $this->request = new Request($apiKey);
    }

    /**
     * @param Notification notification object to be sent
     */
    public function sendNotification($notification){
        $this->request->post("send", $notification->getPayload());
    }

    /**
     * @return mixed Returns a JSON Array of segments
     */
    public function getSegments(){
        $segments = $this->request->get("getsegments");
        return json_decode($segments);
    }
}
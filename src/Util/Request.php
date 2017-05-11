<?php
/**
 * Created by PhpStorm.
 * User: PushPrime
 * Date: 5/9/2017
 * Time: 3:46 PM
 */

namespace PushPrime\Util;

/**
 * Handles communication with PushPrime API
 * Class Request
 * @package PushPrime\Util
 */
class Request {

    private $apiKey;

    private $apiBase = "https://pushprime.com/api/";

    function __construct($apiKey){
        $this->apiKey = $apiKey;
    }

    /**
     * Sends a post request to PushPrime Servers.
     * @param $url Url to send the reques to.
     * @param $data Data to be posted.
     */
    function post($url, $data){
        $fields_string = "";
        foreach ($data as $key => $value) {
            $fields_string .= $key . '=' . urlencode($value) . '&';
        }
        rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->apiBase.$url);
        curl_setopt($ch, CURLOPT_POST, count($data));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch,CURLOPT_HTTPHEADER, array('token: '.$this->apiKey));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
    }

    /**
     * Sends a get request to PushPrime Servers.
     * @param $url Url to send the request to.
     * @return mixed Content of the GET request.
     */
    function get($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->apiBase.$url);
        curl_setopt($ch,CURLOPT_HTTPHEADER, array('token: '.$this->apiKey));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

}
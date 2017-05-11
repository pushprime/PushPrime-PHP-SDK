<?php
/**
 * Created by PhpStorm.
 * User: PushPrime
 * Date: 5/9/2017
 * Time: 4:47 PM
 */

namespace PushPrime\Models;


class ChromeActionButton extends ActionButtonBase
{
    /**
     * @var Url to open when user clicks the button
     */
    public $url;

    /**
     * @return Url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param Url $url
     * @return ChromeActionButton
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    function __construct($title, $url)
    {
        $this->title = $title;
        $this->url = $url;
    }
}
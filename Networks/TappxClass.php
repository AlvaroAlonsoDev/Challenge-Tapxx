<?php

require_once(__DIR__ . "/BaseClass.php");

class TappxClass extends BaseClass
{

    // Class properties
    private $m_url;
    private $m_app_key;
    private $m_request_content;

    // Constructor method that sets the URL, app key, and request content
    public function __construct($p_app_key, $p_request_content_object)
    {
        $this->m_url = "http://test-ssp.tappx.net/ssp/req.php";
        $this->m_app_key = $p_app_key;
        $this->m_request_content = $p_request_content_object;
    }

    // Method that sends a request to Tappx server using the SendRequest() method from BaseClass
    public function Run()
    {
        $res = $this->SendRequest($this->m_url, $this->m_request_content, $this->m_app_key);

        return $res;
    }
}
<?php

class OmniApiCurl
{

    protected $curl;

    public function getHandle()
    {
        return $this->curl;
    }

    public function getVersion($age = CURLVERSION_NOW)
    {
        return curl_version($age);
    }

    public function setOption($option, $value)
    {
        curl_setopt($this->curl, $option, $value);
        return $this;
    }

    public function execute()
    {
        return curl_exec($this->curl);
    }

    public function getInfo($option = null)
    {
        return curl_getinfo($this->curl);
    }

    public function getErrorCode()
    {
        return curl_errno($this->curl);
    }

    public function getError()
    {
        return curl_error($this->curl);
    }

    public function __construct()
    {
        if (!function_exists('curl_init')) {
            throw new Exception('cURL PHP extension is not installed.');
        }
        $this->curl = curl_init();
    }

    public function __clone()
    {
        $this->curl = curl_copy_handle($this->curl);
    }

    public function __destruct()
    {
        curl_close($this->curl);
    }

}
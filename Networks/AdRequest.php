<?php

class AdRequest
{
    // Properties for ad request
    public $id;
    public $at;
    public $allimps;
    public $test;
    public $tmax;
    public $imp;
    public $user;
    public $app;
    public $device;
    public $bcat;

    // Constructor method to create ad request object from JSON string
    public function __construct($request)
    {
        $request = json_decode($request);  // Decode JSON string into object
        $this->id = $request->id;
        $this->at = $request->at;
        $this->allimps = $request->allimps;
        $this->test = $request->test;
        $this->tmax = $request->tmax;
        $this->imp = $request->imp;
        $this->user = $request->user;
        $this->app = $request->app;
        $this->device = $request->device;
        $this->bcat = $request->bcat;
    }

    // Method to URL encode a string value
    public function urlEncode($value)
    {
        return urlencode($value);
    }

    // Getter methods for ad request properties
    public function getId()
    {
        return $this->id;
    }

    public function getAt()
    {
        return $this->at;
    }

    public function getAllimps()
    {
        return $this->allimps;
    }

    public function getTest()
    {
        return $this->test;
    }

    public function getTmax()
    {
        return $this->tmax;
    }

    public function getImp()
    {
        return $this->imp;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getApp()
    {
        return $this->app;
    }

    public function getDevice()
    {
        return $this->device;
    }

    public function getBcat()
    {
        return $this->bcat;
    }

    // Getter methods for properties of the "device" object
    public function getDeviceLmt()
    {
        return $this->device->lmt;
    }

    public function getDeviceGeoCountry()
    {
        return $this->device->geo->country;
    }

    public function getDeviceGeoCity()
    {
        return $this->device->geo->city;
    }

    public function getDeviceGeoZip()
    {
        return $this->device->geo->zip;
    }

    public function getDeviceGeoLat()
    {
        return $this->device->geo->lat;
    }

    public function getDeviceGeoLon()
    {
        return $this->device->geo->lon;
    }

    public function getDeviceGeoType()
    {
        return $this->device->geo->type;
    }

    public function getDeviceUa()
    {
        return $this->device->ua;
    }

    public function getDeviceIp()
    {
        return $this->device->ip;
    }

    public function getDeviceMake()
    {
        return $this->device->make;
    }

    public function getDeviceModel()
    {
        return $this->device->model;
    }

    public function getDeviceOs()
    {
        return $this->device->os;
    }

    public function getDeviceOsv()
    {
        return $this->device->osv;
    }

    public function getDeviceJs()
    {
        return $this->device->js;
    }

    public function getDeviceCarrier()
    {
        return $this->device->carrier;
    }

    public function getDeviceLanguage()
    {
        return $this->device->language;
    }

    public function getDeviceConnectionType()
    {
        return $this->device->connectiontype;
    }

    public function getDeviceDpidsha1()
    {
        return $this->device->dpidsha1;
    }

    public function getDeviceDpidmd5()
    {
        return $this->device->dpidmd5;
    }

    public function getDeviceIfa()
    {
        return $this->device->ifa;
    }
}
<?php
  namespace Nucleo;
  
  class Config{
    public static $url = "127.0.0.1";
    public static $domain = "127.0.0.1";
    public static $title = "PxN Libs";
    public static $apk = "API-48994-4977-5664-78SA-B4521";
    public static $sqlprefix = "pxn";
    public static $cachedir;
    public static $dir = "C:/xampp_r/htdocs";
    public static $cookie_time = 86400;
    public static $template = "PxN";
    public static $currency = "USD";
    public function __construct(){
      self::$cachedir = dirname(__file__)."/../../cache";
    }
  }

  $Config = new Config;
  $config_load = true;
<?php

abstract class Twocheckout
{
    public static $user;
    public static $pass;
    public static $format = "json";
    public static $apiBaseUrl = "https://www.2checkout.com/api/";
    public static $error;
    const VERSION = '0.0.1';

    function setCredentials($user, $pass)
    {
        self::$user = $user;
        self::$pass = $pass;
    }
}

require(dirname(__FILE__) . '/Twocheckout/Api/Account.php');
require(dirname(__FILE__) . '/Twocheckout/Api/Payment.php');
require(dirname(__FILE__) . '/Twocheckout/Api/Api.php');
require(dirname(__FILE__) . '/Twocheckout/Api/Sale.php');
require(dirname(__FILE__) . '/Twocheckout/Api/Product.php');
require(dirname(__FILE__) . '/Twocheckout/Api/Coupon.php');
require(dirname(__FILE__) . '/Twocheckout/Api/Option.php');
require(dirname(__FILE__) . '/Twocheckout/Api/Util.php');
require(dirname(__FILE__) . '/Twocheckout/Return.php');
require(dirname(__FILE__) . '/Twocheckout/Ins.php');
require(dirname(__FILE__) . '/Twocheckout/Charge.php');

?>
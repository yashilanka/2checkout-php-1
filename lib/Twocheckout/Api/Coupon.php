<?php

class Twocheckout_Coupon extends Twocheckout
{

    public static function create($params=array(), $format='json')
    {
        $request = new Twocheckout_Api_Requester();
        $urlSuffix = 'products/create_coupon';
        if(!is_array($params)) {
            return array('Error' => 'Value passed in was not an array of at least one key/value pair.');
        } else {
            $result = $request->do_call($urlSuffix, $params);
            return Twocheckout_Util::return_resp($result, $format);
        }
    }

    public static function retrieve($params=array(), $format='json')
    {
        $request = new Twocheckout_Api_Requester();
        $urlSuffix = 'products/detail_coupon';
        if(!is_array($params)) {
            return array('Error' => 'Value passed in was not an array of at least one key/value pair.');
        } else {
            $result = $request->do_call($urlSuffix, $params);
            return Twocheckout_Util::return_resp($result, $format);
        }
    }

    public static function all($params=array(), $format='json')
    {
        $request = new Twocheckout_Api_Requester();
        $urlSuffix = 'products/list_coupons';
        if(!is_array($params)) {
            return array('Error' => 'Value passed in was not an array of at least one key/value pair.');
        } else {
            $result = $request->do_call($urlSuffix, $params);
            return Twocheckout_Util::return_resp($result, $format);
        }
    }

    public static function update($params=array(), $format='json')
    {
        $request = new Twocheckout_Api_Requester();
        $urlSuffix = 'products/update_coupon';
        if(!is_array($params)) {
            return array('Error' => 'Value passed in was not an array of at least one key/value pair.');
        } else {
            $result = $request->do_call($urlSuffix, $params);
            return Twocheckout_Util::return_resp($result, $format);
        }
    }

    public static function delete($params=array(), $format='json')
    {
        $request = new Twocheckout_Api_Requester();
        $urlSuffix = 'products/delete_coupon';
        if(!is_array($params)) {
            return array('Error' => 'Value passed in was not an array of at least one key/value pair.');
        } else {
            $result = $request->do_call($urlSuffix, $params);
            return Twocheckout_Util::return_resp($result, $format);
        }
    }

}
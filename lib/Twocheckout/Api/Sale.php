<?php

class Twocheckout_Sale extends Twocheckout
{

    public static function retrieve($params=array(), $format='json')
    {
        $request = new Twocheckout_Api_Requester();
        $urlSuffix = 'sales/detail_sale';
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
		$urlSuffix ='sales/list_sales';
		if(!is_array($params)) {
			return array('Error' => 'Value passed in was not an array of at least one key/value pair.');
		} else {
            $result = $request->do_call($urlSuffix, $params);
			return Twocheckout_Util::return_resp($result, $format);
		}
	}

    public static function refund($params=array(), $format='json') {
        $request = new Twocheckout_Api_Requester();
        if(!is_array($params)) {
            return array('Error' => 'Value passed in was not an array of at least one key/value pair.');
        } elseif(array_key_exists("lineitem_id",$params)) {
            $urlSuffix ='sales/refund_lineitem';
            $result = $request->do_call($urlSuffix, $params);
            return Twocheckout_Util::return_resp($result, $format);
        } elseif(array_key_exists("invoice_id",$params) || array_key_exists("sale_id",$params)) {
            $urlSuffix ='sales/refund_invoice';
            $result = $request->do_call($urlSuffix, $params);
            return Twocheckout_Util::return_resp($result, $format);
        } else {
            return array('Error' => 'You must pass a sale_id, invoice_id or lineitem_id to use this method.');
        }
    }

    public static function stop($params=array(), $format='json') {
        $request = new Twocheckout_Api_Requester();
        $urlSuffix ='sales/stop_lineitem_recurring';
        if(!is_array($params)) {
            return array('Error' => 'Value passed in was not an array of at least one key/value pair.');
        } elseif(array_key_exists("lineitem_id",$params)) {
            $result = $request->do_call($urlSuffix, $params);
            return Twocheckout_Util::return_resp($result, $format);
        } elseif(array_key_exists("sale_id",$params)) {
            $result = Twocheckout_Sale::retrieve($params, 'array');
            $array = Twocheckout_Util::return_resp($result, 'array');
            $lineitemData = Twocheckout_Util::get_recurring_lineitems($result);
            if (isset($lineitemData[0])) {
                $i = 0;
                $stoppedLineitems = array();
                foreach( $lineitemData as $value )
                {
                    $params = array('lineitem_id' => $value);
                    $result = $request->do_call($urlSuffix, $params);
                    $result = json_decode($result, true);
                    if ($result['response_code'] == "OK") {
                        $stoppedLineitems[$i] = $value;
                    }
                    $i++;
                }
                $response =  array('Lineitem(s) Stopped Successfully' => $stoppedLineitems);
                return $response;
            } else {
                return array('Error: ' => 'No recurring lineitems to stop.');
            }
        } else {
            return array('Error' => 'You must pass a sale_id or lineitem_id to use this method.');
        }
    }

    public static function active($params=array(), $format='json') {
        $request = new Twocheckout_Api_Requester();
        if(!is_array($params)) {
            return array('Error' => 'Value passed in was not an array of at least one key/value pair.');
        } elseif(array_key_exists("sale_id",$params)) {
            $result = Twocheckout_Sale::retrieve($params);
            $array = Twocheckout_Util::return_resp($result, 'array');
            $lineitemData = Twocheckout_Util::get_recurring_lineitems($array);
            if (isset($lineitemData[0])) {
                $response =  $lineitemData;
                return $response;
            } else {
                return array('Response: ' => 'No recurring lineitems');
            }
        } else {
            return array('Error' => 'You must pass a sale_id to use this method.');
        }
    }

    public static function comment($params=array(), $format='json') {
        $request = new Twocheckout_Api_Requester();
        $urlSuffix ='sales/create_comment';
        if(!is_array($params)) {
            return array('Error' => 'Value passed in was not an array of at least one key/value pair.');
        } else {
            $result = $request->do_call($urlSuffix, $params);
            return Twocheckout_Util::return_resp($result, $format);
        }
    }

    public static function ship($params=array(), $format='json') {
        $request = new Twocheckout_Api_Requester();
        $urlSuffix ='sales/mark_shipped';
        if(!is_array($params)) {
            return array('Error' => 'Value passed in was not an array of at least one key/value pair.');
        } else {
            $result = $request->do_call($urlSuffix, $params);
            return Twocheckout_Util::return_resp($result, $format);
        }
    }

    public static function reauth($params=array(), $format='json') {
        $request = new Twocheckout_Api_Requester();
        $urlSuffix ='sales/reauth';
        if(!is_array($params)) {
            return array('Error' => 'Value passed in was not an array of at least one key/value pair.');
        } else {
            $result = $request->do_call($urlSuffix, $params);
            return Twocheckout_Util::return_resp($result, $format);
        }
    }

}
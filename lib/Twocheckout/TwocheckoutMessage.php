<?php

class Twocheckout_Message
{
    public static function message($code, $message)
    {
        $response = array();
        $response['code'] = $code;
        $response['message'] = $message;
        $response = json_encode($response);
        return $response;
    }
}
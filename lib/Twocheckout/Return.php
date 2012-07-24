<?php

class Twocheckout_Return extends Twocheckout
{

    public static function passback($sid, $secretWord, $demo='N')
    {
        $passback = array();
        foreach ($_REQUEST as $k => $v) {
            $passback[$k] = $v;
        }
        $hashSecretWord = $secretWord;
        $hashSid = $sid;
        $hashTotal = $passback['total'];
        if ($demo == 'demo') {
            $hashOrder = 1;
        } else {
            $hashOrder = $passback['order_number'];
        }
        $StringToHash = strtoupper(md5($hashSecretWord . $hashSid . $hashOrder . $hashTotal));
        if ($StringToHash != $passback['key']) {
            return array('Error' => "Hash Mismatch");
        } else {
            return $passback;
        }
    }

}
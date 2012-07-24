<?php

class Twocheckout_Ins extends Twocheckout
{

    public function message($sid, $secretWord)
    {
        $insMessage = array();
        foreach ($_POST as $k => $v) {
            $insMessage[$k] = $v;
        }

        $hashSecretWord = $secretWord;
        $hashSid = $sid;
        $hashOrder = $insMessage['sale_id'];
        $hashInvoice = $insMessage['invoice_id'];
        $StringToHash = strtoupper(md5($hashOrder . $hashSid . $hashInvoice . $hashSecretWord));

        if ($StringToHash != $insMessage['md5_hash']) {
            return array('Error' => "Hash Mismatch");
        } else {
            return $insMessage;
        }
    }

}

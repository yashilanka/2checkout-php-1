<?php

class Twocheckout_Api_Requester
{
    public $apiBaseUrl;
    private $user;
    private $pass;

	function __construct() {
            $this->user = Twocheckout::$user;
            $this->pass = Twocheckout::$pass;
            $this->apiBaseUrl = Twocheckout::$apiBaseUrl;
        if (!$this->user || !$this->pass)
            return array('Error' => 'You must set your API username and password');
    }

	function do_call($urlSuffix, $data=array())
    {

		if(!is_array($data)) {
			$resp = $this->return_resp(array('Error' => 'Value passed in was not an array of at least one key/value pair.'));
		} else {
			$url = $this->apiBaseUrl . $urlSuffix;
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept: application/json"));
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_POST, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_PROTOCOLS, CURLPROTO_HTTPS);
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			curl_setopt($ch, CURLOPT_USERPWD, "{$this->user}:{$this->pass}");
			if(count($data) > 0) {
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			}
			$resp = curl_exec($ch);
			curl_close($ch);
		}
		return $resp;
	}

}
?>

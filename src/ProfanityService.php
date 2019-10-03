<?php

namespace profanityblocker\profanityblocker;

use profanityblocker\profanityblocker\MakeException;


class ProfanityService
{
    private $ApiKey;
    private $LinkFilter;
    private $EmailFilter;
    private $PhoneFilter;
    
    public function __construct($Key, $Link, $Phone, $Email)
    {
	$this->ApiKey = $Key;
	$this->LinkFilter = $Link;
	$this->EmailFilter = $Phone;
	$this->PhoneFilter = $Email;
    }

    public function ParseText($text)
    {
	$data = array(
            "type" => "json",
            "link" => $this->LinkFilter,
            "phone" => $this->PhoneFilter,
            "email" => $this->EmailFilter,
            "key" => $this->ApiKey,
            "text" => $text
	);

	$ch = \curl_init();
	curl_setopt($ch, CURLOPT_URL,"http://service.profanity-blocker.co.uk/restServer.php");
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$server_output = json_decode(curl_exec($ch), true);
	curl_close ($ch);
        if(array_key_exists("errorCode", $server_output)){
           throw MakeException($server_output["errorCode"]);
	   return;
	}
        return $server_output['text_parsed'];
    }
}

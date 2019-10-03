<?php

namespace profanityblocker\profanityblocker;

global $ErrCode2Msg;
$ErrCode2Msg = array(
    0 => "There was an error contacting the ProfanityBlocker service. Please try again later.",
    104 => "There was an error with your licence for ProfanityBlocker. Please check your licence is valid and  active and try again.",
    102 => "There was an error with your account. Please try again later.",
    999 => "You have sent too many requests than you have paid for in your package, you can either upgrade your package or wait.");

function MakeException($code){
	global $ErrCode2Msg;
	$Error = new \Exception($ErrCode2Msg[$code]);
	return $Error;
}

?>

<?php

require '../vendor/autoload.php';
use profanityblocker\profanityblocker\ProfanityService;

$s = new ProfanityService("LICENCEKEY", false, false, false);
echo $s->ParseText("Test");

?>

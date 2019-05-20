<?php

session_start();

$woord = array ("boten", "balen", "beter", "boren", "broek", "brand", "beeld", "brief", "bloed", "broer", "blond", "boter", "beleg", "bazin", "bezem", "baard", "bloem", "maand", "media", "meter", "motor", "markt", "molen"
);
 
$n = rand(0, count($woord));    // pick a random number

$_SESSION["teradenwoord"] = $woord[$n];
$_SESSION["beurt"] = 0;

?>
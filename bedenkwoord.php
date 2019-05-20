<?php

session_start();

$woord = array ("boten", "balen", "beter", "boren", "broek", "brand", "beeld", "brief", "bloed", "broer", "blond", "boter", "beleg", "bazin", "bezem", "baard", "bloem", "maand", "media", "meter", "motor", "markt", "molen", "fiets", "friet", "forel", "feest", "fruit", "fauna", "freak", "forum", "fusie", "steek", "schep", "spijs", "stoep", "shirt", "sport", "spalk", "sjaal", "storm", "staat", "steun", "serie", "schat", "snoep", "sfeer", "speer", "scene", "speld", "smaak", "super", "stand", "skier", "sluis", "steel", "snaar", "spuit", "tegel", "taart", "tafel", "trouw", "teken", "taken", "tenen", "titel", "woord", "wagen", "wonen", "waren", "zadel", "zweet", "zenuw", "zweer"
);
 
$n = rand(0, count($woord));    // pick a random number

$_SESSION["teradenwoord"] = $woord[$n];
$_SESSION["beurt"] = 0;

?>
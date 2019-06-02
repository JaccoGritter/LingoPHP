<?php

session_start();

$myfile = fopen("woordenlijst5.txt", "r") or die("Unable to open file!");
$woordenlijst = fread($myfile, filesize("woordenlijst5.txt"));
fclose($myfile);

$woordenArray = explode("\n", $woordenlijst); 

$n = rand(0, count($woordenArray));    // pick a random number

$_SESSION["teradenwoord"] = $woordenArray[$n];
$_SESSION["beurt"] = 0;

?>
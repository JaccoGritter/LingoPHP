
<?php 
    // put the teRadenWoord in an array for easier comparison with geraden woord
    $teRadenWoordArray = str_split("hotel");

    // feedback will be the string to be sent back and represents check results
    // 0 = character not in word
    // 1 = character in word but not on right place
    // 2 = character in word and on right place
    $feedback = "00000";
    $feedbackArray = str_split($feedback);

    // get $q from calling page (= geraden woord)
    $q = $_REQUEST["q"];

    // make sure all letters are lowercase
    $q = strtolower($q);

    //put letters of $q in an array named $qarray
    $qarray = str_split($q);

    // check if teradenwoord contains letters
    for ($i = 0; $i < 5; $i++) {
        for ($j = 0; $j < 5; $j++) {
            if ($qarray[$i] == $teRadenWoordArray[$j]) $feedbackArray[$i] = "1"; 
        }
    }

    // check if teradenwoord contains letters on right position
    for ($i = 0; $i < 5; $i++) {
        for ($i = 0; $i < 5; $i++) { 
            if ($qarray[$i] == $teRadenWoordArray[$i]) $feedbackArray[$i] = "2";
        }
    }
    
    $feedback = join("", $feedbackArray); 
    echo $feedback;

?>


 